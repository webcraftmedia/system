<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_STATS_USERS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT *, state_closed/(state_open+state_closed) as best '.
'FROM ('.
    'SELECT username,'.
    ' sum(case when state = 0 then 1 else 0 end) state_open, '.
    ' sum(case when state = 1 then 1 else 0 end) state_closed, '.
    ' COUNT(*) as count '.
    'FROM system.todo_assign '.
    'LEFT JOIN system.todo ON system.todo_assign.todo = system.todo."ID" '.
    'LEFT JOIN system.user ON system.todo_assign.user = system.user.id '.
    'GROUP BY system.user.username '.
    'ORDER BY count DESC'.
') a '.
'ORDER BY best DESC;';
    }
    public static function mysql(){return
'SELECT *, state_closed/(state_open+state_closed) as best '.
'FROM ('.
    'SELECT username,'.
    ' sum(case when state = 0 then 1 else 0 end) state_open, '.
    ' sum(case when state = 1 then 1 else 0 end) state_closed, '.
    ' COUNT(*) as count '.
    'FROM system_todo_assign '.
    'LEFT JOIN system_todo ON system_todo_assign.todo = system_todo.id '.
    'LEFT JOIN system_user ON system_todo_assign.user = system_user.id '.
    'GROUP BY system_todo_assign.user '.
    'ORDER BY count DESC'.
') a '.
'ORDER BY best DESC;';
    }
}