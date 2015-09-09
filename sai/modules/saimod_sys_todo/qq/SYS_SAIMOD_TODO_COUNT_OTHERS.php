<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_COUNT_OTHERS extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT COUNT(*) as count FROM ('.
' SELECT todo.id'.
' FROM '.\SYSTEM\SQL\system_todo::NAME_MYS.' as todo'.
' LEFT JOIN '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' as assign ON todo.'.\SYSTEM\SQL\system_todo::FIELD_ID.'=assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as creator ON todo.'.\SYSTEM\SQL\system_todo::FIELD_USER.'=creator.'.\SYSTEM\SQL\system_user::FIELD_ID.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as assignee ON assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.'=assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.
' WHERE '.\SYSTEM\SQL\system_todo::FIELD_STATE.'=?'.
' AND NOT assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ?'.
' AND (todo.'.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.' LIKE ? OR creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE ? OR  assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE ?)'.
' GROUP BY todo.id'.
') as a;';
    }
}