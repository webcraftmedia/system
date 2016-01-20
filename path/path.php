<?php
namespace SYSTEM;
class PATH {
    private $basepath = NULL;
    private $path = NULL;
    private $subpath = NULL;
    public function __construct(\SYSTEM\PATH $basepath, $path, $subpath = '') {
        $this->basepath = $basepath;
        $this->path = $path;
        $this->subpath = $subpath;
    }
    public function SERVERPATH(){
        return $this->basepath->SERVERPATH().$this->path.$this->subpath;}
    function WEBPATH($mask = true){
        if($mask){
            $path = $this->basepath->SERVERPATH().$this->path.$this->subpath;
            \SYSTEM\CACHE\cache_filemask::put($path);
            return './api.php?call=cache&id='.\SYSTEM\CACHE\cache_filemask::CACHE_FILEMASK.'&ident='.\SYSTEM\CACHE\cache_filemask::ident($path);
        } else {
            return $this->basepath->WEBPATH($mask).$this->path.$this->subpath;
        }
    }
}

class PROOT extends PATH {
    public function __construct($subpath = '') {
        $this->subpath = $subpath;}
    public function SERVERPATH(){
        return \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH).$this->subpath;}
    function WEBPATH($mask = true){
        if($mask){
            $path = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).$this->subpath;
            \SYSTEM\CACHE\cache_filemask::put($path);
            return  './api.php?call=cache&id='.\SYSTEM\CACHE\cache_filemask::CACHE_FILEMASK.'&ident='.\SYSTEM\CACHE\cache_filemask::ident($path);
        } else {
            return \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL).$this->subpath;
        }
    }
}

class PSYSTEM extends PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \SYSTEM\PROOT(), \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL), $subpath);}
}

class PSAI extends PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \SYSTEM\PSYSTEM(), 'sai/', $subpath);}
}

class PLIB extends PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \SYSTEM\PSYSTEM(), 'lib/', $subpath);}
}

class PSQL extends PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \SYSTEM\PSYSTEM(), 'sql/', $subpath);}
}