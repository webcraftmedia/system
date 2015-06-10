<?php
namespace SYSTEM\DBD;

class SYS_SAIMOD_TODO_COUNT_TYPE extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'todo',
//mys
'SELECT COUNT(*) as count FROM ('.
' SELECT todo.id'.
' FROM '.\SYSTEM\DBD\system_todo::NAME_MYS.' as todo'.
' LEFT JOIN '.\SYSTEM\DBD\system_todo_assign::NAME_MYS.' as assign ON todo.'.\SYSTEM\DBD\system_todo::FIELD_ID.'=assign.'.\SYSTEM\DBD\system_todo_assign::FIELD_TODO.
' LEFT JOIN '.\SYSTEM\DBD\system_user::NAME_MYS.' as creator ON todo.'.\SYSTEM\DBD\system_todo::FIELD_USER.'=creator.'.\SYSTEM\DBD\system_user::FIELD_ID.
' LEFT JOIN '.\SYSTEM\DBD\system_user::NAME_MYS.' as assignee ON assign.'.\SYSTEM\DBD\system_todo_assign::FIELD_USER.'=assignee.'.\SYSTEM\DBD\system_user::FIELD_ID.
' WHERE '.\SYSTEM\DBD\system_todo::FIELD_STATE.'=?'.
' AND todo.'.\SYSTEM\DBD\system_todo::FIELD_TYPE.' = ?'.
' AND (todo.'.\SYSTEM\DBD\system_todo::FIELD_MESSAGE.' LIKE ? OR creator.'.\SYSTEM\DBD\system_user::FIELD_USERNAME.' LIKE ? OR  assignee.'.\SYSTEM\DBD\system_user::FIELD_USERNAME.' LIKE ?)'.
' GROUP BY todo.id'.
') as a;'
);}}