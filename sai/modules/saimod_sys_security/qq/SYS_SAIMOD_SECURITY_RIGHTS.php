<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_SECURITY_RIGHTS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT * FROM system.rights ORDER BY "ID" ASC;';
    }
    public static function mysql(){return 
'SELECT * FROM system_rights ORDER BY ID ASC;';
    }
}

