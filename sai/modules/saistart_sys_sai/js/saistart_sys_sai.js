function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function init_saistart_sys_sai() {
    // Set all Panels the same height
    $(".inner-page").height(Math.max.apply(null, $(".inner-page").map(function(){return $(this).height();}).get()));
    //jqBootstrapValidation
    $("#login_form input").not("[type=submit]").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {},
        submitSuccess: function($form, event){            
            system.account_login($('#bt_login_user').val(),$('#bt_login_password').val(),function(data){
                if(data.status){
                    $('.help-block').html("Login successfull.</br>");
                    var redirect = getParameterByName('redirect');
                    if(redirect){
                        location.href = location.protocol + '//' + location.host + location.pathname+'#!'+JSON.parse(redirect);
                        //system.load();
                    } else {
                        location.reload(true);
                    }
                } else {
                    $('.help-block').html("Login not successfull.</br> User & Password combination wrong.");
                }
            });
            event.preventDefault();
        }
    });       
    
    $("#logout_form input").not("[type=submit]").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {},
        submitSuccess: function($form, event){            
            system.account_logout(function (data) {
                if(data.status){
                    $('.help-block').html("Logout successfull.</br>");
                    location.reload(true);
                } else {
                    $('.help-block').html("Logout not successfull.</br>")
                }
            });
            event.preventDefault();
        }
    });

};

function init_saistart_sys_sai_todo(){
    $('#btn_search_todo').click(function(){
        system.load($(this).attr('state')+$('#input_search_todo').val(),true);
    });
}

function init_saistart_sys_sai_log(){
    $('#btn_search_log').click(function(){
        system.load($(this).attr('state')+$('#input_search_log').val(),true);
    });
}