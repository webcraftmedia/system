<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_PRIORITY extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'UPDATE '.\SYSTEM\SQL\system_todo::NAME_MYS.' SET '.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.' = '.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.' + ?'.
' WHERE '.\SYSTEM\SQL\system_todo::FIELD_ID.'= ?;';
    }
}

