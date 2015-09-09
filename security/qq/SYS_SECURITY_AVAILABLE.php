<?php
namespace SYSTEM\SQL;
class SYS_SECURITY_AVAILABLE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_user::NAME_PG.
' WHERE lower('.\SYSTEM\SQL\system_user::FIELD_USERNAME.') like lower($1);';
    }
    public static function mysql(){return
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_user::NAME_MYS.
' WHERE lower('.\SYSTEM\SQL\system_user::FIELD_USERNAME.') like lower(?);';
    }
}