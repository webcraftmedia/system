<?php
namespace SYSTEM\DB;
class Connection extends ConnectionAbstr{
    //The open Connection
    private $connection = NULL;

    //Connects to DB, dependent on DBInfo a connection will be established
    public function __construct(DBInfo $dbinfo = null){
        if(!$dbinfo){
            $dbinfo = \SYSTEM\system::getSystemDBInfo();}

        if($dbinfo instanceof \SYSTEM\DB\DBInfoPG){
            $this->connection = new \SYSTEM\DB\ConnectionPG($dbinfo);
        } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoMYS){
            $this->connection = new \SYSTEM\DB\ConnectionMYS($dbinfo);
        } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoAMQP){
            $this->connection = new \SYSTEM\DB\ConnectionAMQP($dbinfo);
        } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoSQLite){
            $this->connection = new \SYSTEM\DB\ConnectionSQLite($dbinfo);
        } else {
            throw new \Exception('Could not understand Database Settings. Check ur Database Settings');}
    }
    
    //Destruct connection object.
    public function __destruct(){
        unset($this->connection);}

    //Query connected Database with prepared statements, $stmt = sql string with ?; $values = array of values
    public function prepare($stmtName, $stmt, $values){
        return $this->connection->prepare($stmtName, $stmt, $values);}

    //Close Connection
    public function close(){
        return $this->connection->close();}
        
    //Query connected Database
    public function query($query){
        return $this->connection->query($query);}
        
    public function exec($query){
        return $this->connection->exec($query);}
        
    public function trans(){
        return $this->connection->trans();}
    
    public function commit(){
        return $this->connection->commit();}
}