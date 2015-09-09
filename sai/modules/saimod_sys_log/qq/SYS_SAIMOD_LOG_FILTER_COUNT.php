<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_LOG_FILTER_COUNT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_log::NAME_PG.
' WHERE '.\SYSTEM\SQL\system_log::FIELD_CLASS.
' LIKE $1;';
    }
    public static function mysql(){return
'SELECT COUNT(*) as count'.
' FROM '.\SYSTEM\SQL\system_log::NAME_MYS.
' WHERE '.\SYSTEM\SQL\system_log::FIELD_CLASS.' LIKE ?'.
' AND ('.\SYSTEM\SQL\system_log::FIELD_MESSAGE.' LIKE ? OR '.\SYSTEM\SQL\system_log::FIELD_FILE.' LIKE ? OR '.\SYSTEM\SQL\system_log::FIELD_IP.' LIKE ?);';
    }
}