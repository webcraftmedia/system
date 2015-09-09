<?php
namespace SYSTEM\CRON;

class cron {    
    public static function check($class){
        if( !\class_exists($class) ||
            !\is_array($parents = \class_parents($class)) ||
            !\array_search('SYSTEM\CRON\cronjob', $parents)){
            return false;}
        return true;}
    
    public static function run(){
        $crons = \SYSTEM\SQL\SYS_CRON_LIST::QQ();
        while($cron = $crons->next()){
            //check module
            if(!self::check($cron[\SYSTEM\SQL\system_cron::FIELD_CLASS])){
                self::status($cron[\SYSTEM\SQL\system_cron::FIELD_CLASS], \SYSTEM\CRON\cronstatus::CRON_STATUS_FAIL_CLASS);
                continue;}
            //time to execute?
            if(!\SYSTEM\CRON\crontime::check_now(   strtotime($cron[\SYSTEM\SQL\system_cron::FIELD_LAST_RUN]),
                                                    $cron[\SYSTEM\SQL\system_cron::FIELD_MIN],
                                                    $cron[\SYSTEM\SQL\system_cron::FIELD_HOUR],
                                                    $cron[\SYSTEM\SQL\system_cron::FIELD_DAY],
                                                    $cron[\SYSTEM\SQL\system_cron::FIELD_DAY_WEEK],
                                                    $cron[\SYSTEM\SQL\system_cron::FIELD_MONTH])){
                                                    continue;}
            //Status is ok?
            if($cron[\SYSTEM\SQL\system_cron::FIELD_STATUS] != \SYSTEM\CRON\cronstatus::CRON_STATUS_SUCCESFULLY){
                new \SYSTEM\LOG\CRON('Cron for Class '.$cron[\SYSTEM\SQL\system_cron::FIELD_CLASS].' could not execute cuz Status aint good: '. \SYSTEM\CRON\cronstatus::text($cron[\SYSTEM\SQL\system_cron::FIELD_STATUS]));
                continue;}
            //set running
            self::status($cron[\SYSTEM\SQL\system_cron::FIELD_CLASS], \SYSTEM\CRON\cronstatus::CRON_STATUS_RUNNING);
            self::status($cron[\SYSTEM\SQL\system_cron::FIELD_CLASS], call_user_func(array($cron[\SYSTEM\SQL\system_cron::FIELD_CLASS],'run')));
        }
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function next($class){
        $cron = \SYSTEM\SQL\SYS_CRON_GET::Q1(array($class));
        //check module
        if(!self::check($cron[\SYSTEM\SQL\system_cron::FIELD_CLASS])){
            throw new \SYSTEM\LOG\ERROR("Given class is not a cronjob");}
        //time
        return \SYSTEM\CRON\crontime::next( strtotime($cron[\SYSTEM\SQL\system_cron::FIELD_LAST_RUN]),
                                            $cron[\SYSTEM\SQL\system_cron::FIELD_MIN],
                                            $cron[\SYSTEM\SQL\system_cron::FIELD_HOUR],
                                            $cron[\SYSTEM\SQL\system_cron::FIELD_DAY],
                                            $cron[\SYSTEM\SQL\system_cron::FIELD_DAY_WEEK],
                                            $cron[\SYSTEM\SQL\system_cron::FIELD_MONTH]);
    }
    
    private static function status($class, $status){
        //new \SYSTEM\LOG\CRON('Cron Status for Class '.$class.' updated to: '. \SYSTEM\CRON\cronstatus::text($status));
        return \SYSTEM\SQL\SYS_CRON_UPD::QI(array($status,time(),$class));}
    
    public static function last_visit(){
        return \SYSTEM\SQL\SYS_CRON_LAST_VISIT::Q1()['time'];}
}