<?php

namespace SYSTEM\DB;

abstract class ConnectionAbstr {
    //Connects to Database with given DBInfos
    abstract public function __construct(DBInfo $dbinfo);
    //Close Connection to Database
    abstract public function __destruct();
    //Close Connection to Database
    abstract public function close();
    //Query Database with prepared Statement with $stmtName = name of the stament(pg only) $stmt = string and $values = array()
    abstract public function prepare($stmtName, $stmt, $values);
    //Query Database with normal Statement with $query = SQLString
    abstract public function query($query);
    abstract public function commit();
    abstract public function trans();
    //Convert Prepared Values to SQL Type identifiers
    protected static function getPrepareValueType($value){
        if(is_double($value)){
            return 'd';}
        if(is_integer($value)){
            return 'i';}
        if(is_string($value)){
            return 's';}
        //blob
        return 'b';
    }
}
