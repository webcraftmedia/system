$(document).ready(function() {
    new SYSTEM('./sai.php',42,'start',sys_hashchange);    
    $('[data-toggle="tooltip"]').tooltip();
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
});

function sys_hashchange(state){
    var state_ = state ? state.split(';')[0].split('(')[0] : state;
    var state_ = state_ ? state_.split('#')[0] : state;
    $('.nav li,#sai_navbar li, #project_navbar li, #menu_start').each(function(){
        $(this).removeClass('active');});
    if($('#menu_'+state_).parent().length){
        $('#menu_'+state_).parent().addClass('active');
    } else {
        $('#menu_start').addClass('active');}
}