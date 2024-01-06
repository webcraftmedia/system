<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\CRON
 */
namespace SYSTEM\CRON;

/**
 * Conjob Class provided by System to extract Logentries into sqlite files.
 */
class cron_log2sqlite implements \SYSTEM\CRON\cronjob{
    /**
     * Run the Cronjob and extract Data from log, write it to sqlite files
     *
     * @return int Return a Cronstatus for the Cron Class to update the db.
     */
    public static function run(){
        //find oldest value
        $oldest = \SYSTEM\SQL\SYS_LOG_OLDEST::Q1();
        list( $now_month, $now_year ) = preg_split( "/ /", date("m Y"));
        //All fine -> abort
        if( $oldest['year'] >= $now_year &&
            $oldest['month'] >= $now_month){
            return cronstatus::CRON_STATUS_SUCCESFULLY;}
        //create folder if required
        if (!file_exists(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH))) {
            mkdir(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH), 0777, true);}
        $filename = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$oldest['year'].'.'.sprintf('%02d', $oldest['month']).'.db';
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
        set_time_limit(30);
        $res = \SYSTEM\SQL\SYS_LOG_MONTH::QQ(array($oldest['month'],$oldest['year']));
        while($row = $res->next()){
            set_time_limit(30);
            $row['time'] = array_key_exists('time_pg', $row) ? date("Y-m-d H:i:s", $row['time_pg']) : $row['time'];
            if(!$con->exec('INSERT OR IGNORE INTO '.\SYSTEM\SQL\system_log::NAME_MYS.
                            '(`ID`, `class`, `message`, `code`, `file`, `line`, `trace`, `ip`, `querytime`, `time`,'.
                            ' `server_name`, `server_port`, `request_uri`, `post`,'.
                            ' `http_referer`, `http_user_agent`, `user`, `thrown`)'.
                            'VALUES ('.$row['ID'].', \''.\SQLite3::escapeString($row['class'] ?: '').'\', \''.\SQLite3::escapeString($row['message'] ?: '').'\', '.
                                       $row['code'].', \''.\SQLite3::escapeString($row['file'] ?: '').'\', '.$row['line'].', \''.\SQLite3::escapeString($row['trace'] ?: '').'\', \''.
                                       $row['ip'].'\', '.$row['querytime'].', \''.$row['time'].'\', \''.
                                       \SQLite3::escapeString($row['server_name'] ?: '').'\', '.($row['server_port'] ?: 'NULL').', \''.\SQLite3::escapeString($row['request_uri']).'\', \''.\SQLite3::escapeString($row['post'] ?: '').'\', \''.
                                       \SQLite3::escapeString($row['http_referer'] ?: '').'\', \''.\SQLite3::escapeString($row['http_user_agent'] ?: '').'\', '.($row['user'] ?: 'NULL').','.true.');')){
                new \SYSTEM\LOG\ERROR('failed to insert into log archive');
                return cronstatus::CRON_STATUS_FAIL;    
            }
            //Delete single
            if(!\SYSTEM\SQL\SYS_LOG_DEL::QI(array($row['ID']))){
                new \SYSTEM\LOG\ERROR('failed to delete log entries');
                return cronstatus::CRON_STATUS_FAIL;}
        }
        set_time_limit(30);
        if(!$con->exec('end transaction')){
            new \SYSTEM\LOG\ERROR('failed to insert into log archive');
            return cronstatus::CRON_STATUS_FAIL;};
        
        return cronstatus::CRON_STATUS_SUCCESFULLY;
    }
}