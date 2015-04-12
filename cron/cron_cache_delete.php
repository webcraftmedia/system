<?php
namespace SYSTEM\CRON;
class cron_cache_delete extends \SYSTEM\CRON\cronjob{
    public static function run(){
        if(!\SYSTEM\DBD\SYS_CACHE_DELETE_ALL::QI()){
            return cronstatus::CRON_STATUS_FAIL;}
        return cronstatus::CRON_STATUS_SUCCESFULLY;
    }
}