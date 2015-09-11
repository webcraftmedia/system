<?php
namespace SYSTEM\SQL;

class SYS_SECURITY_CHECK extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_user_to_rights::NAME_PG.
' WHERE "'.\SYSTEM\SQL\system_user_to_rights::FIELD_USERID.'" = $1'.
' AND "'.\SYSTEM\SQL\system_user_to_rights::FIELD_RIGHTID.'" = $2;';
    }
    public static function mysql(){return
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_user_to_rights::NAME_MYS.
' WHERE '.\SYSTEM\SQL\system_user_to_rights::FIELD_USERID.' = ?'.
' AND '.\SYSTEM\SQL\system_user_to_rights::FIELD_RIGHTID.' = ?;';
    }
}