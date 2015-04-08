<?php
namespace SYSTEM;

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
            header('content-type:image/png;');}}
    public static function JPG(){
        if(self::checkHeader()){
            header('content-type:image/jpeg;');}}
    public static function JPEG(){
        if(self::checkHeader()){
            header('content-type:image/jpeg;');}}
    public static function GIF(){
        if(self::checkHeader()){
            header('content-type:image/gif;');}}
    public static function JS(){
        if(self::checkHeader()){
            header('content-type:application/javascript;');}}
    public static function CSS(){
        if(self::checkHeader()){
            header('content-type:text/css;');}}
            
    public static function FILE($filename){
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$filename."\"");}
    
    public static function available($datatype){
        $datatype = strtoupper($datatype);
        return \method_exists('\SYSTEM\HEADER', $datatype);}
}