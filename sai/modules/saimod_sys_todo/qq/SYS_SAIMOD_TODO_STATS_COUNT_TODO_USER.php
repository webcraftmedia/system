<?php
namespace SYSTEM\DBD;

class SYS_SAIMOD_TODO_STATS_COUNT_TODO_USER extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'SELECT COUNT(*) as `count` FROM system_todo WHERE state = 0 AND `type` = 1',
//mys
'SELECT COUNT(*) as `count` FROM system_todo WHERE state = 0 AND `type` = 1'
);}}