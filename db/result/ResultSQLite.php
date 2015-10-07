<?php

namespace SYSTEM\DB;

class ResultSQLite extends \SYSTEM\DB\Result{

    private $res = NULL;
    private $stmt = NULL;
    private $current = NULL;    

    //Result from mysql_query
    public function __construct($res,$stmt){
        $this->res = $res;
        $this->stmt = $stmt;}

    public function __destruct(){
        $this->close();}

    public function close(){
        /*if($this->stmt){
            $this->stmt->close();}*/
    }
       
    public function count(){
        throw new Exception("Problem SQLite");
        return mysqli_num_rows($this->res);}
    /*
     * if ($res->numColumns() && $res->columnType(0) != SQLITE3_NULL) { 
    // have rows 
} else { 
    // zero rows 
} 
     */

    public function affectedRows(){
        throw new Exception("Problem SQLite");
        return mysqli_affected_rows($this->res);}

    public function next($object = false, $result_type = SQLITE3_ASSOC){        
        if($object){
            throw new Exception("Problem SQLite");
        } else {
            $this->current = $this->res->fetchArray($result_type);
        }
        return $this->current;
    }
    
    /*
     * function fetchObject($sqlite3result, $objectType = NULL) { 
    $array = $sqlite3result->fetchArray(); 

    if(is_null($objectType)) { 
        $object = new stdClass(); 
    } else { 
        // does not call this class' constructor 
        $object = unserialize(sprintf('O:%d:"%s":0:{}', strlen($objectType), $objectType)); 
    } 
    
    $reflector = new ReflectionObject($object); 
    for($i = 0; $i < $sqlite3result->numColumns(); $i++) { 
        $name = $sqlite3result->columnName($i); 
        $value = $array[$name]; 
        
        try { 
            $attribute = $reflector->getProperty($name); 
            
            $attribute->setAccessible(TRUE); 
            $attribute->setValue($object, $value); 
        } catch (ReflectionException $e) { 
            $object->$name = $value; 
        } 
    } 
    
    return $object; 
} 
     */

    public function seek($row_number){
        throw new Exception("Problem SQLite");
        return mysqli_data_seek($this->res,$row_number);}
}