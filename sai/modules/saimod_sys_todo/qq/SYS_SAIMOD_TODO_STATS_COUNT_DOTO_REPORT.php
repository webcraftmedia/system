<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_STATS_COUNT_DOTO_REPORT extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT COUNT(*) as count FROM system.todo WHERE state = 1 AND type = 2';
    }
    public static function mysql(){return
'SELECT COUNT(*) as `count` FROM system_todo WHERE state = 1 AND `type` = 2';
    }
}