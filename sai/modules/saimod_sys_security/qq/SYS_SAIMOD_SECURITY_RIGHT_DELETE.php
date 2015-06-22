<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_SECURITY_RIGHT_DELETE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'DELETE FROM system.rights'.
' WHERE "ID" = $1;';
    }
    public static function mysql(){return 
'DELETE FROM system_rights'.
' WHERE ID = ?;';
    }
}