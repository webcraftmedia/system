<?php
namespace SYSTEM\CRON;
class crontime {
    public static function next($base_time,$min,$hour,$day,$day_week,$month){
        list( $now_min, $now_hour, $now_day, $now_month, $now_day_week ) = preg_split( "/ /", date("i H d n N", $base_time ) );
        list( $next_min, $next_hour, $next_day, $next_month, $next_year) = preg_split( "/ /", date("i H d n Y", $base_time ) );
        if($month){
            if(($month + $now_month)> 12){ $next_year += 1;}
                $next_month = ($now_month+$month)%12;}
        if($day){
            if($day + $now_day>= 31){ $next_month += 1;}
                $next_day = ($now_day+$day)%31;}
        if($hour){
            if(($hour + $now_hour)>= 24){ $next_day += 1;}
                $next_hour = ($now_hour+$hour)%24;}
        if($min){
            if(($min + $now_min)> 60){ $next_hour += 1;}
                $next_min = ($now_min+$min)%60;}
        if($day_week){
            $day_week = $day_week % 6; // 7 and 0 both mean Sunday
            $now_day_week = $now_day_week % 6; // 7 and 0 both mean Sunday
            $next_day += abs($day_week - $now_day_week);}
        //new \SYSTEM\LOG\INFO(print_r(array($base_time,$min,$hour,$day,$day_week,$month),true));
        //new \SYSTEM\LOG\INFO(print_r(array($now_min, $now_hour, $now_day, $now_month, $now_day_week),true));
        //new \SYSTEM\LOG\INFO(print_r(array($next_hour, $next_min, 0, $next_month, $next_day, $next_year),true));
        return mktime($next_hour, $next_min, 0, $next_month, $next_day, $next_year);
    }
    public static function last($base_time,$min,$hour,$day,$day_week,$month){
        list( $now_min, $now_hour, $now_day, $now_month, $now_day_week ) = preg_split( "/ /", date("i H d n N", $base_time ) );
        list( $last_min, $last_hour, $last_day, $last_month, $last_year) = preg_split( "/ /", date("i H d n Y", $base_time ) );
        if($month){
            if(($now_month - $month)< 12){ $last_year -= 1;}
                $last_month = ($now_month-$month)%12;}
        if($day){
            if(($now_day - $day)>= 31){ $last_month -= 1;}
                $last_day = ($now_day-$day)%31;}
        if($hour){
            if(($now_hour - $hour)> 24){ $last_day -= 1;}
                $last_hour = ($now_hour-$hour)%24;}
        if($min){
            if(($now_min - $min)> 60){ $last_hour -= 1;}
                $last_min = ($now_min-$min)%60;}
        if($day_week){
            $day_week = $day_week % 6; // 7 and 0 both mean Sunday
            $now_day_week = $now_day_week % 6; // 7 and 0 both mean Sunday
            $last_day -= abs($day_week - $now_day_week);}
        return mktime($last_hour, $last_min, 0, $last_month, $last_day, $last_year);
    }
    public static function check($base_time,$last_run,$min,$hour,$day,$day_week,$month){
        //new \SYSTEM\LOG\INFO('next:'.self::next($last_run, $min, $hour, $day, $day_week, $month).' bt:'.$base_time.' last:'.$last_run.' dif:'.(self::next($last_run, $min, $hour, $day, $day_week, $month) - time($base_time)).' run:'.(self::next($last_run, $min, $hour, $day, $day_week, $month) <= time($base_time) ? 'run' : 'not run'));
        return self::next($last_run, $min, $hour, $day, $day_week, $month) <= $base_time ? true : false;}
    public static function next_now($min,$hour,$day,$day_week,$month){
        return self::next(time(),$min,$hour,$day,$day_week,$month);}
    public static function last_now($min,$hour,$day,$day_week,$month){
        return self::last(time(),$min,$hour,$day,$day_week,$month);}
    public static function check_now($last_run,$min,$hour,$day,$day_week,$month){
        return self::check(time(),$last_run,$min,$hour,$day,$day_week,$month);}
}