<?php
namespace SYSTEM\SAI;

class todo_stats_assign extends todo_stats {
    public static function stats() {
        $count = \SYSTEM\SQL\SYS_SAIMOD_TODO_STATS_COUNT_TODO_NOT_ASSIGNED::Q1()['count'];
        $all = \SYSTEM\SQL\SYS_SAIMOD_TODO_STATS_COUNT_TODO_USER::Q1()['count'];
        return new \SYSTEM\SAI\todo_stats_data('Assigned ToDos',$all-$count,$all);}
}
