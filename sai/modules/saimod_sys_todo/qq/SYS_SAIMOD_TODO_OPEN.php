<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_OPEN extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'UPDATE '.\SYSTEM\SQL\system_todo::NAME_PG.' SET '.\SYSTEM\SQL\system_todo::FIELD_STATE.'='.\SYSTEM\SQL\system_todo::FIELD_STATE_OPEN.
' WHERE "'.\SYSTEM\SQL\system_todo::FIELD_ID.'"= $1;';
    }
    public static function pqsql(){return
'UPDATE '.\SYSTEM\SQL\system_todo::NAME_MYS.' SET '.\SYSTEM\SQL\system_todo::FIELD_STATE.'='.\SYSTEM\SQL\system_todo::FIELD_STATE_OPEN.
' WHERE '.\SYSTEM\SQL\system_todo::FIELD_ID.'= ?;';
    }
}