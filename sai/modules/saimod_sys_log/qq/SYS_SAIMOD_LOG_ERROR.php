<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_LOG_ERROR extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return             
'SELECT * FROM '.\SYSTEM\SQL\system_log::NAME_PG.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_PG.
' ON '.\SYSTEM\SQL\system_log::NAME_PG.'.'.\SYSTEM\SQL\system_log::FIELD_USER.
' = '.\SYSTEM\SQL\system_user::NAME_PG.'.'.\SYSTEM\SQL\system_user::FIELD_ID.
' WHERE '.\SYSTEM\SQL\system_log::NAME_PG.'."'.\SYSTEM\SQL\system_log::FIELD_ID.'" = $1;';
    }
    public static function mysql(){return 
'SELECT * FROM '.\SYSTEM\SQL\system_log::NAME_MYS.
' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.
' ON '.\SYSTEM\SQL\system_log::NAME_MYS.'.'.\SYSTEM\SQL\system_log::FIELD_USER.
' = '.\SYSTEM\SQL\system_user::NAME_MYS.'.'.\SYSTEM\SQL\system_user::FIELD_ID.
' WHERE '.\SYSTEM\SQL\system_log::NAME_MYS.'.'.\SYSTEM\SQL\system_log::FIELD_ID.' = ?;';
    }
}