<?php

namespace SYSTEM\DB;

class ResultMysqliPrepare extends \SYSTEM\DB\Result{

    private $res = NULL;    
    private $meta = NULL;
    private $binds = array();
    private $connection = NULL;
    
    //Result from mysql_query
    public function __construct($res,$connection){        
        $this->res = $res;
        $this->connection = $connection;

        $this->meta = \mysqli_stmt_result_metadata($this->res);

        if(!$this->meta){
            //occurs on insert
            //throw new \Exception("Could not retrieve meta for prepare statement");}
            return;}
        
        while ($field = $this->meta->fetch_field() ) {
            $this->binds[$field->table.'.'.$field->name] = &$this->binds[$field->table.'.'.$field->name];} //fix for ambiguous fieldnames

        \mysqli_free_result($this->meta);
        
        call_user_func_array(array($this->res, 'bind_result'), $this->binds); //you need 2 append the parameters - thats the right way to do that.
        $this->res->store_result();
    }

    public function  __destruct() {
        $this->close();}

    public function close(){
        mysqli_stmt_free_result($this->res);
        mysqli_stmt_close($this->res);
    }

    public function count(){
        return \mysqli_stmt_num_rows($this->res);}

    public function affectedRows(){
        return \mysqli_stmt_affected_rows($this->res);}

    //$object not used
    //$result_type not used!
    public function next($object = false, $result_type = MYSQL_BOTH){        
        if(\mysqli_stmt_fetch($this->res)){
            foreach( $this->binds as $key=>$value ){
                $row[substr($key, strpos($key, '.')+1)] = $value;} //fix for ambiguous fieldnames
            return $row;}
        return NULL;       
    }

    public function seek($row_number){
        return \mysqli_stmt_data_seek($this->res,$row_number);}
}