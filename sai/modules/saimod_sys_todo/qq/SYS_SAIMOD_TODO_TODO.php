<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_TODO extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT DISTINCT ON ("'.\SYSTEM\SQL\system_todo::FIELD_ID.'") * FROM('.
    ' SELECT todo.*, assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.' as assignee_id, assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as assignee, creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as username'.
    ' FROM '.\SYSTEM\SQL\system_todo::NAME_PG.' as todo'.
    ' LEFT JOIN '.\SYSTEM\SQL\system_todo_assign::NAME_PG.' as assign ON todo."'.\SYSTEM\SQL\system_todo::FIELD_ID.'" = assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_PG.' as creator ON todo.'.\SYSTEM\SQL\system_todo::FIELD_USER.' = creator.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_PG.' as assignee ON assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' WHERE todo."'.\SYSTEM\SQL\system_todo::FIELD_ID.'" = $1'.
    ' ORDER BY case when assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = $2 then 1 else 2 end'.
') as a';
    }
    public static function mysql(){return
'SELECT * FROM('.
    ' SELECT todo.*, assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.' as assignee_id, assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as assignee, creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as username'.
    ' FROM '.\SYSTEM\SQL\system_todo::NAME_MYS.' as todo'.
    ' LEFT JOIN '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' as assign ON todo.'.\SYSTEM\SQL\system_todo::FIELD_ID.' = assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as creator ON todo.'.\SYSTEM\SQL\system_todo::FIELD_USER.' = creator.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as assignee ON assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' WHERE todo.'.\SYSTEM\SQL\system_todo::FIELD_ID.' = ?'.
    ' ORDER BY case when assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ? then 1 else 2 end'.
') as a'.
' GROUP BY '.\SYSTEM\SQL\system_todo::FIELD_ID.';';
    }
}