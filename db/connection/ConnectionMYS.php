<?php

namespace SYSTEM\DB;

class ConnectionMYS extends ConnectionAbstr {
    private $connection = NULL;
    
    public function __construct(DBInfo $dbinfo, $new_link = false, $client_flag = 0){
        $this->connection = @mysqli_connect($dbinfo->m_host, $dbinfo->m_user, $dbinfo->m_password, $new_link, $client_flag);
        if(!$this->connection){
            throw new \Exception('Could not connect to Database. Check ur Database Settings');}
            
        if(!mysqli_select_db($this->connection, $dbinfo->m_database)){
            mysqli_close($this->connection);
            throw new \Exception('Could not select Database. Check ur Database Settings: '.mysqli_error($this->connection));}
            
        \mysqli_set_charset($this->connection, 'utf8');
    }

    public function __destruct(){
        $this->close();}

    public function prepare($stmtName, $stmt, $values){
        $prepStmt = \mysqli_prepare($this->connection, $stmt);
        if(!$prepStmt){
            throw new \Exception('Prepared Statement prepare fail: '. \mysqli_error($this->connection));}

        $types = '';
        $binds = array($prepStmt,null);
        for($i =0; $i < \count($values);$i++){
            $types .= self::getPrepareValueType($values[$i]);
            $binds[] = &$values[$i];}
        $binds[1] = $types;
        \call_user_func_array('mysqli_stmt_bind_param', $binds); //you need 2 append the parameters - thats the right way to do that.

        if(!mysqli_stmt_execute($prepStmt)){
            throw new \SYSTEM\LOG\ERROR("Could not execute prepare statement: ".  \mysqli_stmt_error($prepStmt));}

        return new ResultMysqliPrepare($prepStmt,$this);
    }

    public function close(){
        return mysqli_close($this->connection);}

    public function query($query){
        $result = mysqli_query($this->connection, $query);
        if(!$result){
            throw new \Exception('Could not query Database. Check ur Query Syntax or required Rights: '.mysqli_error($this->connection));}

        if($result === TRUE){
            return TRUE;}

        return new ResultMysqli($result);
    }
}