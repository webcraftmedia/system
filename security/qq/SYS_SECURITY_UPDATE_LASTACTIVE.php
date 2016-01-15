<?php
namespace SYSTEM\SQL;
class SYS_SECURITY_UPDATE_LASTACTIVE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'UPDATE '.\SYSTEM\SQL\system_user::NAME_PG.
' SET '.\SYSTEM\SQL\system_user::FIELD_LAST_ACTIVE.' = NOW()'.
' WHERE '.\SYSTEM\SQL\system_user::FIELD_ID.' = $1;';
    }
    public static function mysql(){return
'UPDATE '.\SYSTEM\SQL\system_user::NAME_MYS.
' SET '.\SYSTEM\SQL\system_user::FIELD_LAST_ACTIVE.' = NOW()'.
' WHERE '.\SYSTEM\SQL\system_user::FIELD_ID.' = ?;';
    }
}