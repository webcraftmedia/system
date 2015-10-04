<?php

namespace SYSTEM\DB;

class ConnectionSQLite extends ConnectionAbstr {
    private $connection = NULL;
    
    public function __construct(DBInfo $dbinfo, $new_link = false, $client_flag = 0){
        $error = null;
        $this->connection = new \SQLite3($dbinfo->m_database);
        if(!$this->connection){
            throw new \Exception('Could not connect to Database. Check ur Database Settings: '.$error);}
    }

    public function __destruct(){
        $this->close();}

    public function prepare($stmtName, $stmt, $values){
        $prepStmt = $this->connection->prepare($stmt);
        if(!$prepStmt){
            throw new \SYSTEM\LOG\ERROR('Prepared Statement prepare fail: '. $error);}

        foreach($values as $key=>$val){
            $prepStmt->bindParam($key,$val);}

        if(!($result = $prepStmt->execute())){
            throw new \SYSTEM\LOG\ERROR("Could not execute prepare statement: ".  $error);}

        return new ResultSQLite($result,$prepStmt);
    }

    public function close(){
        return $this->connection->close();}

    public function query($query){
        $result = $this->connection->query($query);
        if(!$result){
            throw new \SYSTEM\LOG\ERROR('Could not query Database. Check ur Query Syntax or required Rights: '.$this->connection->lastErrorMsg());}
        if($result === TRUE){
            return TRUE;}

        return new ResultSQLite($result,null);
    }
    
    public function exec($query){
        return $this->connection->exec($query);
    }
    
    public function commit(){
        throw new \Exception('Could not start Transaction: not implemented');}
    
    public function trans(){
        throw new \Exception('Could not start Transaction: not implemented');}
}