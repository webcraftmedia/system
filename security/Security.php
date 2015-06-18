<?php
namespace SYSTEM\SECURITY;

class Security {
    const FAIL = false;
    const OK = true;   
    
    public static function create($username, $password, $email, $locale, $advancedResult=false, $checkAvailable = true){
        self::startSession();
        // check availability of username (in non-compatibility mode, otherwise it is already checked in DasenseAccount)
        if($checkAvailable && !self::available($username)){
            return self::FAIL;}                        
        $result = \SYSTEM\DBD\SYS_SECURITY_CREATE::QI(array( $username , $password, $email, $locale, 1 ));
        if(!$result || !self::login($username, $password, $locale)){            
                return self::FAIL;}                 
        return ($advancedResult ? \SYSTEM\DBD\SYS_SECURITY_LOGIN_SHA1::Q1(array($username, $username, $password)) : self::OK);
    }
     
    public static function changePassword($username, $password_sha_old, $password_sha_new){        
        $row = \SYSTEM\DBD\SYS_SECURITY_LOGIN_SHA1::Q1(array($username, $username, $password_sha_old));                        
        if(!$row){
            return self::FAIL;} // old password wrong                  
        $userID = $row['id'];        
        $result = \SYSTEM\DBD\SYS_SECURITY_UPDATE_PW::QI(array($password_sha_new, $userID));        
        return $result ? self::OK : self::FAIL;
    }
             
    public static function login($username, $password_sha, $password_md5, $locale=NULL, $advancedResult=false, $password_sha_new=NULL){
        self::startSession();        
        $_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)] = NULL;
                
        //Database check
        if(isset($password_md5)){      
            $row = \SYSTEM\DBD\SYS_SECURITY_LOGIN_MD5::Q1(array($username, $username, $password_sha, $password_md5));
        }else{
            $row = \SYSTEM\DBD\SYS_SECURITY_LOGIN_SHA1::Q1(array($username, $username, $password_sha));}                    
                    
        if(!$row){
            new \SYSTEM\LOG\WARNING("Login Failed, User was not found in db");                        
            return self::FAIL;}
            
        //todo: move to da-sense    
        // set password_sha if it is empty or if it length is < 40 -> SHA1 Androidappbugfix
        if( !$row[\SYSTEM\DBD\system_user::FIELD_PASSWORD_SHA] ||
            strlen($row[\SYSTEM\DBD\system_user::FIELD_PASSWORD_SHA]) < 40){
            
            if($password_sha_new != NULL){
                $pw = $password_sha_new;
            }else{
                $pw = $password_sha;
            }            
            \SYSTEM\DBD\SYS_SECURITY_UPDATE_PW::QQ(array($pw,$row[\SYSTEM\DBD\system_user::FIELD_ID]));            
            $row[\SYSTEM\DBD\system_user::FIELD_PASSWORD_SHA] = $pw;
        }            
        // set session variables
        $_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)] =
                            new User(   $row[\SYSTEM\DBD\system_user::FIELD_ID],
                                        $row[\SYSTEM\DBD\system_user::FIELD_USERNAME],
                                        $row[\SYSTEM\DBD\system_user::FIELD_EMAIL],
                                        $row[\SYSTEM\DBD\system_user::FIELD_JOINDATE],
                                        time(),
                                        getenv('REMOTE_ADDR'),
                                        0,
                                        NULL,
                                        $row[\SYSTEM\DBD\system_user::FIELD_LOCALE],
                                        \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL));        
        if(isset($locale)){
            \SYSTEM\locale::set($locale);}                
        \SYSTEM\DBD\SYS_SECURITY_UPDATE_LASTACTIVE::QI(array($row[\SYSTEM\DBD\system_user::FIELD_ID]));
        return ($advancedResult ? $row : self::OK);
    }       
        

    public static function getUser(){
        if(!self::isLoggedIn()){
            return NULL;}
        return $_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)];}

    // Determine if username exists
    public static function available($username){        
        $res = \SYSTEM\DBD\SYS_SECURITY_AVAILABLE::Q1(array($username));
        if(!$res){
            throw new \SYSTEM\LOG\ERRROR("Cannot determine the availability of username!");}        
        if($res['count'] != 0){
            return self::FAIL;}
        return self::OK;
    }

    //checks for a right for a logged in user
    public static function check($rightid){
        //Not logged in? Go away.
        //If you think you need rights for your guests ur doing smth wrong ;-)
        $user = null;
        if(!($user = self::getUser())){
            return false;}
        $res = \SYSTEM\DBD\SYS_SECURITY_CHECK::Q1(array($user->id, $rightid));
        if(!$res){
            throw new \SYSTEM\LOG\ERROR("Cannot determine if you have the required rights!");}        
        if($res['count'] == 0){
            return false;}
        return true;
    }

    //Session
    public static function logout(){
        self::startSession();
        session_destroy();
        return self::OK;}
        
    public static function save($key,$value){
        self::startSession();
        $_SESSION['values'][$key] = $value;}
        
    public static function load($key){
        self::startSession();
        if(!isset($_SESSION['values'][$key])){
            return NULL;}
        return $_SESSION['values'][$key];}
        
    public static function isLoggedIn(){
        self::startSession();
        return (isset($_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)]) &&
                $_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)] instanceof User);}
        
    protected static function startSession(){
        if(!isset($_SESSION) && !headers_sent()){
            \session_start();}
        //respect locale from db if not set(right place here?)
        if( isset($_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)]) &&
            $_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)] instanceof User){
                $_SESSION['values'][\SYSTEM\locale::SESSION_KEY] = $_SESSION[\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)]->locale;}
    }    
}