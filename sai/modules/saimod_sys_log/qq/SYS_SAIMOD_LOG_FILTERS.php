<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_LOG_FILTERS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT '.\SYSTEM\SQL\system_log::FIELD_CLASS.
' FROM '.\SYSTEM\SQL\system_log::NAME_PG.
' GROUP BY '.\SYSTEM\SQL\system_log::FIELD_CLASS.
' ORDER BY '.\SYSTEM\SQL\system_log::FIELD_CLASS.';';
    }
    public static function mysql(){return
'SELECT '.\SYSTEM\SQL\system_log::FIELD_CLASS.
' FROM '.\SYSTEM\SQL\system_log::NAME_MYS.
' GROUP BY '.\SYSTEM\SQL\system_log::FIELD_CLASS.
' ORDER BY '.\SYSTEM\SQL\system_log::FIELD_CLASS.';';
    }
}