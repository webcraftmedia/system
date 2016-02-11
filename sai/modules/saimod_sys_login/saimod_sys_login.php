<?php
namespace SYSTEM\SAI;
class saimod_sys_login extends \SYSTEM\SAI\SaiModule {
    public static function sai_mod__SYSTEM_SAI_saimod_sys_login(){              
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_LOGIN);
        $vars['login'] = 'Login';
        $vars['logout'] = 'Logout';
        $vars['loginUsername'] = 'Username';
        $vars['loginPassword'] = 'Password';
        $vars['login_username_too_short'] = 'Username to short.';
        $vars['login_password_too_short'] = 'Password to short.';
        $vars['isadmin']  = \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI) ? "yes" : "no";
        
        if(\SYSTEM\SECURITY\Security::isLoggedIn()){
            return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_login/tpl/logout.tpl'))->SERVERPATH(), $vars);        
        } else {
            return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_login/tpl/login.tpl'))->SERVERPATH(), $vars);}
    }

    public static function sai_mod__SYSTEM_SAI_saimod_sys_login_action_logout(){
        return \SYSTEM\SECURITY\Security::logout();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_login_action_login($username,$password_sha,$password_md5){
        return \SYSTEM\SECURITY\Security::login($username, $password_sha, $password_md5);}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_login_action_register($username,$password,$email, $locale = 'deDE'){
        return \SYSTEM\SECURITY\Security::create($username, $password, $email, $locale);}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_login_action_userinfo(){
        $user = \SYSTEM\SECURITY\Security::getUser();
        if(!$user){
            return;}
        return json_encode(array(   'username' => $user->username,
                                    'email' => $user->email,
                                    'joindate' => $user->creationDate,
                                    'locale' => $user->locale,
                                    'last_active' => $user->lastLoginDate));        
    }        
        
    public static function sai_mod__SYSTEM_SAI_saimod_sys_login_action_registerform(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_LOGIN);
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_login/tpl/register.tpl'))->SERVERPATH(), $vars);}

    public static function html_li_menu(){return '<li class="sai_divider_left"><a id="menu_login" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_login}" href="#!login">'.(\SYSTEM\SECURITY\Security::isLoggedIn() ? '<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>').'</a></li>';}
    public static function right_public(){return true;}    
    public static function right_right(){return true;}
    
    //public static function css(){}
    public static function js(){
        return array(   \LIB\lib_jqbootstrapvalidation::js(),
                        new \SYSTEM\PSAI('modules/saimod_sys_login/js/sai_sys_login_submit.js'),
                        new \SYSTEM\PSAI('js/crypto/jquery.md5.js'),
                        new \SYSTEM\PSAI('js/crypto/jquery.sha1.js'));
    }
}