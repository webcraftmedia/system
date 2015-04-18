<?php

namespace SYSTEM;

class time {    
    private static $start_time;    
    
    public static function start(){
        self::$start_time = microtime(true);}
        
    public static function getStartTime(){
        return self::$start_time;}
        
    public static function time_ago_string($time){
        $etime = time() - $time;
        if ($etime < 1){
            return '0 ${time_ago_second}';}

        $a = array( 12 * 30 * 24 * 60 * 60  =>  '${time_ago_year}',
                    30 * 24 * 60 * 60       =>  '${time_ago_month}',
                    24 * 60 * 60            =>  '${time_ago_day}',
                    60 * 60                 =>  '${time_ago_hour}',
                    60                      =>  '${time_ago_minute}',
                    1                       =>  '${time_ago_second}');

        foreach ($a as $secs => $str){
            $d = $etime / $secs;
            if ($d >= 1){
                $r = round($d);
                return $r . ' ' . $str;}
        }
    }    
}