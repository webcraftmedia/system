<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_SECURITY_USER_LOG_COUNT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_log::NAME_PG.
' WHERE "'.\SYSTEM\SQL\system_log::FIELD_USER.'"'.
' = $1;';
    }
    public static function mysql(){return 
'SELECT COUNT(*) as count'.
' FROM '.\SYSTEM\SQL\system_log::NAME_MYS.
' WHERE '.\SYSTEM\SQL\system_log::FIELD_USER.
' = ?;';
    }
}

