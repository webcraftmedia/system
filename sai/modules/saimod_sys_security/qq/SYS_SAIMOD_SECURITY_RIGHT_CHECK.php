<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_SECURITY_RIGHT_CHECK extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return            
'SELECT * FROM system.rights'.
' WHERE "ID" = $1;';
    }
    public static function mysql(){return 
'SELECT * FROM system_rights'.
' WHERE ID = ?;';
    }
}

