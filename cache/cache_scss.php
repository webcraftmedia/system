<?php
namespace SYSTEM\CACHE;
class cache_scss {
    const CACHE_SCSS = 1;
    public static function put($file,$data){
        return \SYSTEM\CACHE\cache::put(self::CACHE_SCSS, self::ident($file), 'css', $data);}
    public static function get($file,$header = false){
        return \SYSTEM\CACHE\cache::get(self::CACHE_SCSS,  self::ident($file),$header);}
    public static function ident($file){
        return sha1($file.';'.filemtime($file));
    }
    public static function url($file){
        if(!\SYSTEM\CACHE\cache_scss::get($file->SERVERPATH())){
            \LIB\lib_scssphp::php();
            \SYSTEM\CACHE\cache_scss::put($file->SERVERPATH(), (new \Leafo\ScssPhp\Compiler())->compile(file_get_contents($file->SERVERPATH())));}
        return './api.php?call=cache&id='.self::CACHE_SCSS.'&ident='.self::ident($file->SERVERPATH());
    }
}