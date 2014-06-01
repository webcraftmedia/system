//saving content data
var cData = {group: '',
             lang: '',
             id: ''};
         
function init__SYSTEM_SAI_saimod_sys_locale() {
    if(!cData.lang && !cData.group) {
        cData.group = $('.groups').first().attr('id');
        cData.lang = $('.langli').first().attr('id');
        $('#'+cData.group).addClass('active');
        $('#'+cData.lang).addClass('active');
        saimod_sys_locale_loadcontent(cData.lang, cData.group);
        }    
    $('.groups').click(function(){
        if (cData.group){
            $('#'+cData.group).removeClass('active');}
        if (cData.group && cData.lang && (cData.group !== $(this).attr('id'))){
            cData.group = $(this).attr('id');
            saimod_sys_locale_loadcontent(cData.lang, cData.group);}
        cData.group = $(this).attr('id');
        $(this).addClass('active');
    });
    $('.langli').click(function(){
        if (cData.group && cData.lang){
            $('#'+cData.lang).removeClass('active');}
        cData.lang = $(this).attr('id');
        $(this).addClass('active');
        saimod_sys_locale_loadcontent(cData.lang, cData.group);
    });
    $('#changetext').click(function(){
        saimod_sys_locale_savecontent(cData.id, cData.lang);
    });
    
}

function saimod_sys_locale_savecontent(id, lang){
    tinyMCE.triggerSave();
    newtext = $('#contenttextarea').val();
    
    $.ajax({
        url: SAI_ENDPOINT,
                        data: { sai_mod: '.SYSTEM.SAI.saimod_sys_locale',
                                action: 'edit',
                                id: id,
                                lang: lang,
                                category: cData.group,
                                newtext: newtext},
                            type: 'GET',
                            success: function(data) {
                                if (data.status == false){
                                    $('#modal_success').hide();
                                    $('#modal_fail').show();
                                } else {
                                    $('#modal_fail').hide();                            
                                    $('#modal_success').show();                                
                                    saimod_sys_locale_loadcontent(cData.lang,cData.group);
                                    $('#modal').modal('hide');
                                }
                            }
    });
}

function saimod_sys_locale_loadsinglecontent(id, lang){
    tinymce.init({selector:'textarea'});
    
    $.ajax({
        url: SAI_ENDPOINT,
        data: { sai_mod: '.SYSTEM.SAI.saimod_sys_locale',
                action: 'singleload',
                id: id,
                lang: lang},
            type: 'GET',
            success: function(data) {
                tinyMCE.activeEditor.setContent(data);
                $('#modal_success').hide();
                $('#modal_fail').hide();
                $('#modaltitle').html(id);
                cData.id = id;         
                $('#modal').modal('show');
            }
    });
}

function saimod_sys_locale_loadcontent(id, group){
    $('#tab-content').load(SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_sys_locale&action=load&id='+id+'&group='+group, function(){
        $('.tableentry').click(function(){
            saimod_sys_locale_loadsinglecontent($(this).attr('text_id'), cData.lang);
        });
    });
}
function saimod_sys_locale_add(){
    $('div#content-wrapper').load(SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_sys_locale&action=addmode',function(){
        $('.localeMain').click(function(){
            loadModuleContent('.SYSTEM.SAI.saimod_sys_locale');
        });        
        $('.add').click(function(){            
            $.ajax({   url: SAI_ENDPOINT,
                        data: { sai_mod: '.SYSTEM.SAI.saimod_sys_locale',
                                action: 'add',
                                id: $('#content_new_id').val(),                                
                                category: $('#content_new_cat').val()},
                        type: 'GET',
                        success: function(data) {
                            if (data.status == false){
                                alert("Addition could not be applied.");
                            } else {
                                alert("Addition has been saved.");}
                    }
                });
        });
    });
}

function saimod_sys_locale_delete(buttonID){
    $.getJSON(SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_sys_locale&action=delete&id='+buttonID,
            function(data){if (data.status == false){ alert("false"); } else { alert("true");}});
}

function saimod_sys_locale_edit(buttonID){
    $('div#content-wrapper').load(SAI_ENDPOINT+'sai_mod=.SYSTEM.SAI.saimod_sys_locale&action=editmode&entry='+buttonID, function(){
        $('.localeMain').click(function(){
            loadModuleContent('.SYSTEM.SAI.saimod_sys_locale');
        });
        $('.edit_content').click(function(){
             tinyMCE.triggerSave();
             $.ajax({   url: SAI_ENDPOINT,
                        data: { sai_mod: '.SYSTEM.SAI.saimod_sys_locale',
                                action: 'edit',
                                id: $(this).attr('name'),
                                lang: $(this).attr('lang'),
                                newtext: $('#edit_field_'+$(this).attr('name')+'_'+$(this).attr('lang')).val()},
                        type: 'POST',
                        success: function(data) {
                            if (data.status == false){
                                alert("Changes could not be applied.");
                            } else {
                                alert("Changes has been saved.");}
                    }
                });
        });
    });
}
