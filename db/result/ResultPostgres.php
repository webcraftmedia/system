<?php

namespace SYSTEM\DB;

class ResultPostgres extends \SYSTEM\DB\Result{

    private $res = NULL;
    private $current = NULL;
    private $connection = NULL;

    //Result from mysql_query
    public function __construct($res,$connection){
        $this->res = $res;
        $this->connection = $connection;}

    public function __destruct(){
        $this->close();}

    public function close(){
        pg_free_result($this->res);}

    public function count(){
        return pg_num_rows($this->res);}

    public function affectedRows(){
        return pg_affected_rows($this->res);}

    public function next($object = false){        
        if($object){
            $this->current = pg_fetch_object($this->res);
        } else {
            $this->current = pg_fetch_assoc($this->res);
        }
        return $this->current;
    }

    public function seek($row_number){
        return pg_data_seek($this->res,$row_number);}
}