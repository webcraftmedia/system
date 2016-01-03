<?php

namespace SYSTEM\DB;

class ConnectionPG extends ConnectionAbstr {

    private $connection = NULL;
    //private $dbinfo = NULL;

    public function __construct(DBInfo $dbinfo){
        //$this->dbinfo = $dbinfo;

        $this->connection = pg_connect("host=".$dbinfo->m_host." port=".$dbinfo->m_port." dbname=".$dbinfo->m_database."
                                        user=".$dbinfo->m_user." password=".$dbinfo->m_password."");
        if(!$this->connection){
            throw new \Exception('Could not connect to Database. Check ur Database Settings');}
    }

    public function __destruct(){}

    public function prepare($stmtName, $stmt, $values){        
        $result = pg_query_params($this->connection, 'SELECT name FROM pg_prepared_statements WHERE name = $1', array($stmtName));
        //var_dump($stmt);
        //var_dump($values);
        if (pg_num_rows($result) == 0) {
            $result = \pg_prepare($this->connection, $stmtName, $stmt);
            if(($info = \pg_last_notice($this->connection)) != ''){
                new \SYSTEM\LOG\INFO($info);}
        }
        
        if(!$result)
            throw new \SYSTEM\LOG\ERROR('Prepared Statement prepare fail: '. \pg_last_error($this->connection));

        $result = \pg_execute($this->connection, $stmtName, $values);
        if(($info = \pg_last_notice($this->connection)) != ''){
            new \SYSTEM\LOG\INFO($info);}

        if(!$result)
            throw new \SYSTEM\LOG\ERROR("Could not execute prepare statement: ".  \pg_last_error($this->connection));             

        return new ResultPostgres($result,$this);
    }

    public function close(){
        return pg_close($this->connection);}

    public function query($query){     
        $result = \pg_query($this->connection, $query);
        if(($info = \pg_last_notice($this->connection)) != ''){
            new \SYSTEM\LOG\INFO($info);}
            
        if(!$result){
            throw new \SYSTEM\LOG\ERROR('Could not query Database. Check ur Query Syntax or required Rights: '.pg_last_error($this->connection));}

        if($result === TRUE){
            return TRUE;}

        return new ResultPostgres($result,$this);
    }
    
    public function trans(){
        return $this->connection->trans();}
    
    public function commit(){
        return $this->connection->commit();}

}