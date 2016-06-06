<?php

namespace SYSTEM\API;

class verify {
    public static function ALL      ($param)    {return true;}
    public static function UINT     ($param)    {return \is_numeric($param) ? ((int)$param > 0 ? true : false) : false;}
    public static function UINT0    ($param)    {return \is_numeric($param) ? ((int)$param >= 0 ? true : false) : false;}
    public static function INT      ($param)    {return \is_numeric($param);}
    public static function TIMEUNIX ($param)    {return \is_numeric($param) ? ((int)$param > 0 ? true : false) : false;}
    public static function DATE     ($param)    {return \strtotime($param);}
    public static function STRING   ($param)    {return \is_string($param);}
    public static function BOOL     ($param)    {return \is_bool($param) || $param == '0' || $param == '1';}
    public static function FLOAT    ($param)    {return \is_float(\floatval($param));}
    public static function JSON     ($param)    {return (self::ARY($param) || \json_decode(\stripslashes($param))) ? true : false;} //ary cuz when sent via direct json, all json is alrdy converted to an array.
    public static function ARY      ($param)    {return \is_array($param);}
    public static function LANG     ($param)    {return \SYSTEM\locale::isLang($param);}
    public static function RESULT   ($param)    {return ($param == 'json' || $param == 'msgpack');}
    public static function EMAIL    ($param)    {return filter_var($param, FILTER_VALIDATE_EMAIL);}
    
};