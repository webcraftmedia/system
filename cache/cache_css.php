<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\CACHE
 */
namespace SYSTEM\CACHE;

/**
 * CSS Cache Class provided by System for caching CSS in the Database.
 */
class cache_css {
    /** int Cache ID for CSS cache */
    const CACHE_CSS = 10;
    
    /**
     * Put Data into the Cache
     *
     * @param sha1 $ident String Identifier for the cached Content
     * @param int $data Data to cache
     * @return mixed Returns the cached Cache Content or NULL
     */
    public static function put($ident,$data){
        return \SYSTEM\CACHE\cache::put(self::CACHE_CSS, $ident, 'CSS', $data);}
        
    /**
     * Get Data from Cache
     *
     * @param sha1 $ident String Identifier for the cached Content
     * @param bool $header Send Header
     * @return mixed Returns the requested Cache Content or NULL
     */
    public static function get($ident,$header = false){
        return \SYSTEM\CACHE\cache::get(self::CACHE_CSS, $ident,$header);}
    
    /**
     * Calculate Ident for a list of Files
     *
     * @param array $files List of Files to be cached into one Cacheentry
     * @return sha1 Returns the requested Ident
     */
    public static function ident($files){
        $ident = '';
        foreach($files as $f){
            if(!file_exists($f->SERVERPATH())){
                throw new \SYSTEM\LOG\ERROR('Could not find file: '.$f->SERVERPATH());}
            $ident .= $f->SERVERPATH().';'.filemtime($f->SERVERPATH()).';';}
        return sha1($ident);
    }
    
    /**
     * Minify CSS and calculate URL from it
     *
     * @param array $files List of Files to be cached into one Cacheentry
     * @return url Returns the requested Cache-URL
     */
    public static function minify($files){
        $ident = self::ident($files);
        if(!\SYSTEM\CACHE\cache_css::get($ident)){
            \LIB\lib_minify::php();
            \LIB\lib_scssphp::php();
            $minifier = new \MatthiasMullie\Minify\CSS();
            $sccs     = new \ScssPhp\ScssPhp\Compiler();
            foreach($files as $f){
                // Determin CSS/SCSS based on file extension
                $path = $f->SERVERPATH();
                $tmp = explode(".", $path); //rediculus
                if(strtolower(end($tmp)) == 'scss'){
                    // Compile SCSS
                    $minifier->add($sccs->compileString(file_get_contents($path))->getCss());
                } else {
                    // Normal CSS
                    $minifier->add($path);
                }
            }
            \SYSTEM\CACHE\cache_css::put($ident, $minifier->minify());}
        return './cache/'.self::CACHE_CSS.'/'.$ident;
    }
}