<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_ASSIGNEES extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
' SELECT assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.' as todo_id,'.
    ' assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as assignee,'.
    ' assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.' as assignee_id'.
' FROM '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' as assign'.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as assignee ON assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.'=assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.
' WHERE assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.' = ?'.
' ORDER BY case when assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ? then 1 else 2 end'.
' LIMIT 10';
    }
}