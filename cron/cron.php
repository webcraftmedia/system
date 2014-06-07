<?php
namespace SYSTEM\CRON;

class cron {    
    private static function check($cron){
        if( !\class_exists($cron) ||
            !\is_array($parents = \class_parents($cron)) ||
            !\array_search('SYSTEM\CRON\cronjob', $parents)){
            return false;}
        return true;}
    
    public static function run(){
        $crons = \SYSTEM\DBD\SYS_CRON_LIST::QQ();
        while($cron = $crons->next()){
            //check module
            if(!self::check($cron[\SYSTEM\DBD\system_cron::FIELD_CLASS])){
                self::status($cron[\SYSTEM\DBD\system_cron::FIELD_CLASS], \SYSTEM\CRON\cronstatus::CRON_STATUS_FAIL_CLASS);
                continue;}
            //time to execute?
            if(!\SYSTEM\CRON\crontime::check_now(   time($cron[\SYSTEM\DBD\system_cron::FIELD_LAST_RUN]),
                                                    $cron[\SYSTEM\DBD\system_cron::FIELD_MIN],
                                                    $cron[\SYSTEM\DBD\system_cron::FIELD_HOUR],
                                                    $cron[\SYSTEM\DBD\system_cron::FIELD_DAY],
                                                    $cron[\SYSTEM\DBD\system_cron::FIELD_DAY_WEEK],
                                                    $cron[\SYSTEM\DBD\system_cron::FIELD_MONTH])){
                                                    continue;}
            //Status is ok?
            if($cron[\SYSTEM\DBD\system_cron::FIELD_STATUS] != \SYSTEM\CRON\cronstatus::CRON_STATUS_SUCCESFULLY){
                new \SYSTEM\LOG\CRON('Cron for Class '.$cron[\SYSTEM\DBD\system_cron::FIELD_CLASS].' could not execute cuz Status aint good: '. \SYSTEM\CRON\cronstatus::decode($cron[\SYSTEM\DBD\system_cron::FIELD_STATUS]));
                continue;}
            //set running
            self::status($cron[\SYSTEM\DBD\system_cron::FIELD_CLASS], \SYSTEM\CRON\cronstatus::CRON_STATUS_RUNNING);
            self::status($cron[\SYSTEM\DBD\system_cron::FIELD_CLASS], call_user_func(array($cron[\SYSTEM\DBD\system_cron::FIELD_CLASS],'run')));
        }
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    private static function status($class, $status){
        new \SYSTEM\LOG\CRON('Cron Status for Class '.$class.' updated to: '. \SYSTEM\CRON\cronstatus::decode($status));
        return \SYSTEM\DBD\SYS_CRON_UPD::QI(array($status,time(),$class));}
}