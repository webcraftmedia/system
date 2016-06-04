<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_SECURITY_USERS extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT id,username,email,joindate,locale, EXTRACT(EPOCH FROM last_active) as last_active, email_confirmed'.
' FROM system.user'.
' WHERE username LIKE $1 OR email LIKE $2'.
' ORDER BY last_active DESC;';
    }
    public static function mysql(){return 
'SELECT id,username,email,joindate,locale,unix_timestamp(last_active)as last_active, email_confirmed'.
' FROM system_user'.
' WHERE username LIKE ? OR email LIKE ?'.
' ORDER BY last_active DESC;';
    }
}