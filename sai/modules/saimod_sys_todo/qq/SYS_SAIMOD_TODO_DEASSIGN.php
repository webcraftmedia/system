<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_DEASSIGN extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'DELETE FROM '.\SYSTEM\SQL\system_todo_assign::NAME_PG.' WHERE '.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.' = $1 AND "'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.'" = $2;';
    }
    public static function mysql(){return
'DELETE FROM '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' WHERE '.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.' = ? AND '.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ?;';
    }
}