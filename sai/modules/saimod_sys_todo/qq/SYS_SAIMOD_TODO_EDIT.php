<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_EDIT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'UPDATE '.\SYSTEM\SQL\system_todo::NAME_PG.' SET '.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.'= $1'.
' WHERE "'.\SYSTEM\SQL\system_todo::FIELD_ID.'"= $2;';
    }
    public static function mysql(){return
'UPDATE '.\SYSTEM\SQL\system_todo::NAME_MYS.' SET '.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.'= ?, '
         .\SYSTEM\SQL\system_todo::FIELD_MESSAGE_HASH.'= SHA1(?)'.
' WHERE '.\SYSTEM\SQL\system_todo::FIELD_ID.'= ?;';
    }
}