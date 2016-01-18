<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_STATS_COUNT_TODO_NOT_ASSIGNED extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT COUNT(*) as count FROM system.todo'.
' LEFT JOIN system.todo_assign ON system.todo."ID" = system.todo_assign.todo'.
' WHERE state = 0 AND type = 1 AND system.todo_assign.user IS NULL;';
    }
    public static function mysql(){return
'SELECT COUNT(*) as `count` FROM system_todo'.
' LEFT JOIN system_todo_assign ON system_todo.id = system_todo_assign.todo'.
' WHERE state = 0 AND `type` = 1 AND system_todo_assign.user IS NULL;';
    }
}