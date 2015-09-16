<?php
namespace SYSTEM;

class autoload {
    
    private static $files = array();       // array(class, namespace, file)
    private static $folders = array();     // array(namespace, folder)   
    private static $func = array();        // array(namespace, func)

    private static function getClassFromFile($file){
        $path_info = \pathinfo($file);
        return $path_info['filename'];}

    private static function getClassNamespaceFromClass($class){
        $path_info = \pathinfo($class);
        $lastslash = \strrpos($class, 92);
        //No Namespace found
        if(!$lastslash){
            return array($class, '');}

        //Namespace found
        return array(   \substr($class, $lastslash +1),
                        \substr($class, 0, $lastslash));
    }

    private static function autoload_($class, $namespace = ''){        
        foreach(self::$files as $file){
            if(strtolower($file[0]) == strtolower($class) &&
               strtolower($file[1]) == strtolower($namespace)){
                require_once $file[2];
                return true;}
        }
        
        foreach(self::$folders as $folder){            
            if(strtolower($folder[0]) == strtolower($namespace) &&               
               is_file($folder[1].'/'.$class.'.php')){                
                require_once $folder[1].'/'.$class.'.php';
                return true;}
        }
        
        foreach(self::$func as $func){            
            if(strtolower($func[0]) == strtolower($namespace) && call_user_func($func[1],$class)){
                return true;}
        }

        return false;
    }

    public static function registerFile($file, $namespace = ''){
        if(!is_file($file)){
            throw new \SYSTEM\LOG\ERROR('File not found on registerFile for Autoload: '.$file);}

        self::$files[] = array(self::getClassFromFile($file), $namespace, $file);
    }

    public static function registerFolder($folder, $namespace = ''){        
        if(!is_dir($folder)){
            throw new \SYSTEM\LOG\ERROR('Folder not found on registerFolder for Autoload: '.$folder);}

        self::$folders[] = array($namespace, $folder);
    }
    
    public static function registerFunc($func, $namespace = ''){        
        /*if(!_exists($func)){
            throw new \SYSTEM\LOG\ERROR('Function not found on registerFunc for Autoload: '.$func);}*/
        self::$func[] = array($namespace, $func);
    }
    
    public static function register_autoload(){
        spl_autoload_register('\SYSTEM\autoload::autoload');}

    public static function autoload($class){        
        $classns = self::getClassNamespaceFromClass($class);
        
        if(!self::autoload_($classns[0],$classns[1]) || (!class_exists($class) && !interface_exists($class))){
            throw new \SYSTEM\LOG\ERROR("Class not found: ".$class);}
        
        return true;
    }
    
    private static function file_extension($filename){
        $path_info = pathinfo($filename);
        return array_key_exists('extension', $path_info) ? strtolower($path_info['extension']) : NULL;
    }
    
    //for docu we need all classes actually declared
    public static function autoload_all(){
        foreach(self::$files as $file){            
            require_once $file[2];}        
        
        foreach(self::$folders as $folder){                
            if ($handle = opendir($folder[1])) {
                while (false !== ($file = readdir($handle))) {
                    if (    $file != "." && $file != ".." && 
                            self::file_extension($file) == 'php' &&
                            !class_exists($folder[0].'\\'.substr($file,0,count($file)-5),false)) {                                                
                        require_once $folder[1].'/'.$file;                        
                    }
                }
            }
            closedir($handle);
        }                    
    }
}