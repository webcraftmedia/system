<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_ASSIGN extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.
' ('.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.','.\SYSTEM\SQL\system_todo_assign::FIELD_USER.','.\SYSTEM\SQL\system_todo_assign::FIELD_TIME.')'.
' VALUES(?,?, NOW());';
    }
}