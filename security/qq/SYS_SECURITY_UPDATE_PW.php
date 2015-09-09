<?php
namespace SYSTEM\SQL;
class SYS_SECURITY_UPDATE_PW extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'UPDATE '.\SYSTEM\SQL\system_user::NAME_PG.
' SET '.\SYSTEM\SQL\system_user::FIELD_PASSWORD_SHA.' = $1'.
' WHERE '.\SYSTEM\SQL\system_user::FIELD_ID.' = $2;';
    }
    public static function mysql(){return
'UPDATE '.\SYSTEM\SQL\system_user::NAME_MYS.
' SET '.\SYSTEM\SQL\system_user::FIELD_PASSWORD_SHA.' = ?'.
' WHERE '.\SYSTEM\SQL\system_user::FIELD_ID.' = ?;';
    }
}