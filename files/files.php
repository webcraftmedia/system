<?php
namespace SYSTEM\FILES;

class files {
    private static $folders = array(); //only strings!   array(catname => path)

    public static function registerFolder($path, $cat) {
        self::$folders[$cat] = $path;}

    public static function get($cat = null, $id = null, $returnasjson = false) {
        if (!$cat) {
            return $returnasjson ? \SYSTEM\LOG\JsonResult::toString(self::$folders) : self::$folders;}
            
        if (!array_key_exists($cat, self::$folders)) {
            throw new \SYSTEM\LOG\ERROR("No matching Cat '" . $cat . "' found.");}

        $folder = self::getFolder(self::$folders[$cat]);
        if ($id == null) {
            return $returnasjson ? \SYSTEM\LOG\JsonResult::toString($folder) : $folder;}

        if (!in_array($id, $folder)) {
            throw new \SYSTEM\LOG\ERROR("No matching ID '" . $id . "' found.");}

        $ext = pathinfo(self::$folders[$cat].$id);
        $ext = strtoupper(array_key_exists('extension', $ext) ? $ext['extension'] : '');
        if(\SYSTEM\HEADER::available($ext)){
            call_user_func('\SYSTEM\HEADER::'.$ext);
        }else{
            \SYSTEM\HEADER::FILE($id);}
            
        //Allow Caching for all files
        header('Cache-Control: public;');
        
        if(!self::file_get_contents_chunked(self::$folders[$cat].$id,4096,function($chunk,&$handle,$iteration){echo $chunk;})){
            throw new \SYSTEM\LOG\ERROR("Could not transfere File.");}
        return;
    }

    public static function put($cat, $id, $contents) {
        if (!array_key_exists($cat, self::$folders)) {
            throw new \SYSTEM\LOG\ERROR("No matching Cat '" . $cat . "' found.");}        
        return move_uploaded_file($contents, self::$folders[$cat].$id);        
    }
    
    public static function delete($cat, $id) {        
        if (!array_key_exists($cat, self::$folders)) {
            throw new \SYSTEM\LOG\ERROR("No matching Cat '" . $cat . "' found.");}
        if(!file_exists(self::$folders[$cat].$id)){
            return false;}
        return unlink(self::$folders[$cat].$id); 
    }
    
    public static function rename($cat, $id, $newid) {        
        if (!array_key_exists($cat, self::$folders)) {
            throw new \SYSTEM\LOG\ERROR("No matching Cat '" . $cat . "' found.");}
        if(!file_exists(self::$folders[$cat].$id)){
            return false;}
        $ext = pathinfo(self::$folders[$cat].$id);
        return rename(self::$folders[$cat].$id, self::$folders[$cat].$newid.'.'.$ext['extension']); 
    }

    private static function getFolder($folder) {
        $files = array();
        foreach (glob($folder.'*') as $file) {
            $files[] = basename($file);}
        return $files;
    }

    public static function getURL($cat, $id = null) {
        return \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL) . 'api.php?call=files&cat=' . $cat . '&id=' . $id;}
   
    private static function file_get_contents_chunked($file,$chunk_size,$callback)
    {
        $handle = fopen($file, "r");
        $i = 0;
        while (!feof($handle))
        {
            call_user_func_array($callback,array(fread($handle,$chunk_size),&$handle,$i));
            $i++;
        }
        fclose($handle);
        return true;
    }
}