function init_saimod_sys_api() {
    $("#sai_mod_api_table").tablesorter();
    $('#tabs_api a').click(function (e) {
        $('#tabs_api li').each(function(){
            $(this).removeClass('active');});
        $(this).parent().addClass('active');
    });
    api_menu();
}

function init_saimod_sys_api_new(){
    $('#addcall').click(function() {
        $.ajax({    url: './sai.php',
                    data: { sai_mod: '.SYSTEM.SAI.saimod_sys_api',
                            action: 'addcall',
                            ID: $('#new_call_id').val(),
                            group: $('#new_call_group').val(),
                            type: $('#new_call_type').val(),
                            parentID: $('#new_call_parentid').val(),
                            parentValue : $('#new_call_parentvalue').val(),
                            name: $('#new_call_name').val(),
                            verify: $('#new_call_verify').val()},
                    type: 'GET',
                    success: function(data) {
                        system.load('api;group.'+$('#new_call_group').val());}
        });  
    });
}

function api_menu(){
    $('#tabs_api li').each(function(){
        $(this).removeClass('active');});
    if($('#menu_group_'+system.cur_state().split('.')[1]).length){
        $('#menu_group_'+system.cur_state().split('.')[1]).parent().addClass('active');
    } else {
        $('#menu_all').parent().addClass('active');}
}
function init_saimod_sys_api_list(){
    $("#sai_mod_api_table").tablesorter();
    api_menu();}
function init_saimod_sys_api_delete(){
    $("#sai_mod_api_table").tablesorter();
    $('#del_api_del').click(function() {
        $.ajax({    url: './sai.php',
                    data: { sai_mod: '.SYSTEM.SAI.saimod_sys_api',
                            action: 'deletecall',
                            ID: $(this).attr('api_id'),
                            group: $(this).attr('api_group')},
                    type: 'GET',
                    success: function(data) {
                        console.log("api call deleted");
                        $('#api_deletedialog').html('<p>Api call deleted!</p>');
                        $('#del_api_del').hide();
                    }
                });
    });
}