<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_SECURITY_USER_COUNT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return             
'SELECT count(*) as count FROM system.user WHERE username LIKE $1 OR email LIKE $1;';
    }
    public static function mysql(){return 
'SELECT count(*) as count FROM system_user WHERE username LIKE ? OR email LIKE ?;';
    }
}