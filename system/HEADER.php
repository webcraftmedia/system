<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM
 */
namespace SYSTEM;

/**
 * HEADER Class provided by System Send HTML Headers
 */
class HEADER {
    private static function checkHeader(){
        $file = null;
        $line = null;
        if(headers_sent($file, $line)){
            new \SYSTEM\LOG\WARNING('Header already sent @ '.$file.' line '.$line);
            return false;}
        return true;
    }
    
    public static function JSON(){
        if(self::checkHeader()){
            header('Access-Control-Allow-Origin: *');//allow cross domain calls
            header('content-type: application/json');}}
    public static function PNG(){
        if(self::checkHeader()){
            header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60))); // 1 hour
            header('content-type:image/png;');}}
    public static function JPG(){
        if(self::checkHeader()){
            header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60))); // 1 hour
            header('content-type:image/jpeg;');}}
    public static function JPEG(){
        if(self::checkHeader()){
            header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60))); // 1 hour
            header('content-type:image/jpeg;');}}
    public static function GIF(){
        if(self::checkHeader()){
            header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60))); // 1 hour
            header('content-type:image/gif;');}}
    public static function JS(){
        if(self::checkHeader()){
            header('content-type:application/javascript;');}}
    public static function CSS(){
        if(self::checkHeader()){
            header('content-type:text/css;');}}
    public static function LESS(){
        if(self::checkHeader()){
            header('content-type:text/css;');}}
            
    public static function FILE($filename){
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$filename."\"");}
    
    public static function available($datatype){
        $datatype = strtoupper($datatype);
        return \method_exists('\SYSTEM\HEADER', $datatype);}
}