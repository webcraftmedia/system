<?php
namespace SYSTEM\SQL;
class SYS_SECURITY_CREATE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return           
'INSERT INTO '.\SYSTEM\SQL\system_user::NAME_PG.
' ('.\SYSTEM\SQL\system_user::FIELD_USERNAME.','.\SYSTEM\SQL\system_user::FIELD_PASSWORD_SHA.','
    .\SYSTEM\SQL\system_user::FIELD_EMAIL.','.\SYSTEM\SQL\system_user::FIELD_LOCALE.','.\SYSTEM\SQL\system_user::FIELD_ACCOUNT_FLAG.')'.
' VALUES ($1, $2, $3, $4, $5);';
    }
    public static function mysql(){return
'INSERT INTO '.\SYSTEM\SQL\system_user::NAME_MYS.
' ('.\SYSTEM\SQL\system_user::FIELD_USERNAME.','.\SYSTEM\SQL\system_user::FIELD_PASSWORD_SHA.','
    .\SYSTEM\SQL\system_user::FIELD_EMAIL.','.\SYSTEM\SQL\system_user::FIELD_LOCALE.','.\SYSTEM\SQL\system_user::FIELD_ACCOUNT_FLAG.')'.
' VALUES (?, ?, ?, ?, ?);';
    }
}