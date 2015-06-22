<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_SECURITY_RIGHT_INSERT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'INSERT INTO system.rights ("ID", name, description)'.
' VALUES($1, $2, $3);';
    }
    public static function mysql(){return 
'INSERT IGNORE INTO system_rights (ID, name, description)'.
' VALUES(?, ?, ?);';
    }
}