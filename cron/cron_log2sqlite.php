<?php
namespace SYSTEM\CRON;
class cron_log2sqlite extends \SYSTEM\CRON\cronjob{
    public static function run(){
        //find oldest value
        $oldest = \SYSTEM\DBD\SYS_LOG_OLDEST::Q1();
        list( $now_month, $now_year ) = preg_split( "/ /", date("m Y"));
        //All fine -> abort
        if( $oldest['year'] >= $now_year &&
            $oldest['month'] >= $now_month){
            return cronstatus::CRON_STATUS_SUCCESFULLY;}
            
        $filename = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$oldest['year'].'.'.$oldest['month'].'.db';
        //extract whole month to file
        $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite($filename));
        
        //create table
        $con->query('CREATE TABLE IF NOT EXISTS `system_log` ('.
                    ' `ID` INT(10) NOT NULL,'.
                    ' `class` TEXT NOT NULL,'.
                    ' `message` TEXT NOT NULL,'.
                    ' `code` INT(11) NOT NULL,'.
                    ' `file` TEXT NOT NULL,'.
                    ' `line` INT(11) NOT NULL,'.
                    ' `trace` TEXT NOT NULL,'.
                    ' `ip` TEXT NOT NULL,'.
                    ' `querytime` DOUBLE NOT NULL,'.
                    ' `time` DATETIME NOT NULL,'.
                    ' `server_name` CHAR(255) NOT NULL,'.
                    ' `server_port` INT(10) NOT NULL,'.
                    ' `request_uri` CHAR(255) NOT NULL,'.
                    ' `post` TEXT NOT NULL,'.
                    ' `http_referer` CHAR(255) NULL DEFAULT NULL,'.
                    ' `http_user_agent` TEXT NOT NULL,'.
                    ' `user` INT(11) NULL DEFAULT NULL,'.
                    ' `thrown` BIT(1) NOT NULL,'.
                    ' PRIMARY KEY (`ID`)'.');');
        
        //write data as trasaction
        $con->exec('begin transaction');
        $res = \SYSTEM\DBD\SYS_LOG_MONTH::QQ(array($oldest['month'],$oldest['year']));
        $i = 0;
        $j = 0;
        while($row = $res->next()){
            set_time_limit(30);
            $i++; $j++;
            $row['time'] = array_key_exists('time_pg', $row) ? $row['time_pg'] : '\''.$row['time'].'\'';
            if(!$con->exec('INSERT OR IGNORE INTO '.\SYSTEM\DBD\system_log::NAME_MYS.
                            '(`ID`, `class`, `message`, `code`, `file`, `line`, `trace`, `ip`, `querytime`, `time`,'.
                            ' `server_name`, `server_port`, `request_uri`, `post`,'.
                            ' `http_referer`, `http_user_agent`, `user`, `thrown`)'.
                            'VALUES ('.$row['ID'].', \''.\SQLite3::escapeString($row['class']).'\', \''.\SQLite3::escapeString($row['message']).'\', '.
                                       $row['code'].', \''.\SQLite3::escapeString($row['file']).'\', '.$row['line'].', \''.\SQLite3::escapeString($row['trace']).'\', \''.
                                       $row['ip'].'\', '.$row['querytime'].', '.$row['time'].', \''.
                                       \SQLite3::escapeString($row['server_name']).'\', '.($row['server_port'] ? $row['server_port'] : 'NULL').', \''.\SQLite3::escapeString($row['request_uri']).'\', \''.\SQLite3::escapeString($row['post']).'\', \''.
                                       \SQLite3::escapeString($row['http_referer']).'\', \''.\SQLite3::escapeString($row['http_user_agent']).'\', '.($row['user'] ? $row['user'] : 'NULL').','.true.');')){
                new \SYSTEM\LOG\ERROR('failed to insert into log archiev');
                return cronstatus::CRON_STATUS_FAIL;    
            }
            if($j > 5000){
                $j = 0;
                set_time_limit(30);
                if(!$con->exec('end transaction')){
                    new \SYSTEM\LOG\ERROR('failed to insert into log archiev');
                    return cronstatus::CRON_STATUS_FAIL;};
                $con->exec('begin transaction');
            }
        }
        set_time_limit(30);
        if(!$con->exec('end transaction')){
            new \SYSTEM\LOG\ERROR('failed to insert into log archiev');
            return cronstatus::CRON_STATUS_FAIL;};
        set_time_limit(30);
        //delete from database
        if(!\SYSTEM\DBD\SYS_LOG_MONTH_DEL::QI(array($oldest['month'],$oldest['year']))){
            new \SYSTEM\LOG\ERROR('failed to delete log entries');
            return cronstatus::CRON_STATUS_FAIL;}
        
        return cronstatus::CRON_STATUS_SUCCESFULLY;
    }
}