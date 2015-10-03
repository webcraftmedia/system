<?php
namespace SYSTEM\DB;

class QQ {                       
    public static function QQ($dbinfo = null){
        if(!$dbinfo){
            $dbinfo = \SYSTEM\system::getSystemDBInfo();}
        $con = new \SYSTEM\DB\Connection($dbinfo);
        
        try{
            if($dbinfo instanceof \SYSTEM\DB\DBInfoPG){
                return $con->query(static::pgsql());
            } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoMYS){
                return $con->query(static::mysql());
            } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoAMQP){
                return $con->query(static::amqp());
            } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoSQLite){
                return $con->query(static::sqlite());
            }
        } catch (\Exception $e){
            throw new \Exception(static::get_class().' failed causing: '.$e->getMessage(),$e->getCode(),$e);}
        
        throw new \Exception('Could not understand Database Settings. Check ur Database Settings');
    }
    
    public static function QA($dbinfo = null){
        $res = self::QQ($dbinfo);
        $result = array();
        while($row = $res->next()){
            $result[] = $row;}
        return $result;
    }
    
    public static function Q1($dbinfo = null){
        return self::QQ($dbinfo)->next();}
    public static function QI($dbinfo = null){
        return self::QQ($dbinfo);}
}