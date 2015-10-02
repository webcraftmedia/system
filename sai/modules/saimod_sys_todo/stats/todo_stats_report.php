<?php
namespace SYSTEM\SAI;

class todo_stats_report extends todo_stats {
    public static function stats() {
        $res = array();
        $res[0] = \SYSTEM\SQL\SYS_SAIMOD_TODO_STATS_COUNT_TODO_REPORT::Q1();
        $res[2] = \SYSTEM\SQL\SYS_SAIMOD_TODO_STATS_COUNT_DOTO_REPORT::Q1();
        $count = floatval($res[2]['count']);
        $all = floatval($res[0]['count']+$res[2]['count']);
        return $all == 0 ? new \SYSTEM\SAI\todo_stats_data('Reports',1,1) : new \SYSTEM\SAI\todo_stats_data('Reports',$count,$all);}
}
