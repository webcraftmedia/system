<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_LOG_FILTER extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_log::NAME_PG.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_PG.
' ON '.\SYSTEM\SQL\system_log::NAME_PG.'.'.\SYSTEM\SQL\system_log::FIELD_USER.
' = '.\SYSTEM\SQL\system_user::NAME_PG.'.'.\SYSTEM\SQL\system_user::FIELD_ID.
' WHERE '.\SYSTEM\SQL\system_log::FIELD_CLASS.' LIKE $1'.
' AND ('.\SYSTEM\SQL\system_log::FIELD_MESSAGE.' LIKE $2 OR '.\SYSTEM\SQL\system_log::FIELD_FILE.' LIKE $3 OR '.\SYSTEM\SQL\system_log::FIELD_IP.' LIKE $4)'.
' ORDER BY '.\SYSTEM\SQL\system_log::FIELD_TIME.' DESC, '.\SYSTEM\SQL\system_log::NAME_PG.'."'.\SYSTEM\SQL\system_log::FIELD_ID.'" DESC;';
    }
    public static function mysql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_log::NAME_MYS.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.
' ON '.\SYSTEM\SQL\system_log::NAME_MYS.'.'.\SYSTEM\SQL\system_log::FIELD_USER.
' = '.\SYSTEM\SQL\system_user::NAME_MYS.'.'.\SYSTEM\SQL\system_user::FIELD_ID.
' WHERE '.\SYSTEM\SQL\system_log::FIELD_CLASS.' LIKE ?'.
' AND ('.\SYSTEM\SQL\system_log::FIELD_MESSAGE.' LIKE ? OR '.\SYSTEM\SQL\system_log::FIELD_FILE.' LIKE ? OR '.\SYSTEM\SQL\system_log::FIELD_IP.' LIKE ?)'.
' ORDER BY '.\SYSTEM\SQL\system_log::FIELD_TIME.' DESC, '.\SYSTEM\SQL\system_log::NAME_MYS.'.'.\SYSTEM\SQL\system_log::FIELD_ID.' DESC;';
    }
}