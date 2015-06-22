<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_SECURITY_USER extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT id,username,email,joindate,locale, EXTRACT(EPOCH FROM last_active) as last_active ,account_flag FROM system.user WHERE username = $1 LIMIT 1;';
    }
    public static function mysql(){return 
'SELECT id,username,email,joindate,locale,last_active,account_flag FROM system_user WHERE username = ? LIMIT 1;';
    }
}

