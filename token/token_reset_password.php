<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\TOKEN
 */
namespace SYSTEM\TOKEN;

/**
 * Reset Password Token handler Class provided by System to provide a reset-password mechanism.
 */
class token_reset_password implements token_handler{
    /**
     * Generate the Token
     *
     * @return string Returns token string.
     */
    public static function token(){
        return sha1(time().rand(0, 2000));}
        
    /**
     * Expiredate when the Token expires (1h)
     *
     * @return int Returns unixtimestamp when the token expires.
     */
    public static function expire(){
        return time() + (60 * 60 * 1);}
        
    /**
     * Token confirm processing for the token_handler.
     * Changes the password of an account if successful
     *
     * @param array Token data from db
     * @return bool Returns true or false.
     */
    public static function confirm($token_data){
        $data = \json_decode($token_data['data'],true);
        return \SYSTEM\SQL\SYS_SECURITY_RESET_PASSWORD::QI(array($data['pw_sha1'],$data['user'])) ? true : false;}
    
    /**
     * Callback text_fail on fail
     *
     * @param array $token_data Token Data
     * @return string Returns token fail string.
     */
    public static function text_fail($token_data) {
        return 'Could NOT reset your Password. Token is expired or invalid.';}

    /**
     * Callback text_success on success
     *
     * @param array $token_data Token Data
     * @return string Returns token success string.
     */
    public static function text_success($token_data) {
        return 'Changed your Password successfully.';}
}