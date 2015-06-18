<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_SECURITY_USER_RIGHT_CHECK extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT COUNT(*) as count FROM system.user_to_rights WHERE "rightID" = $1 AND "userID" = $2 LIMIT 1;';
    }
    public static function mysql(){return 
'SELECT COUNT(*) as count FROM system_user_to_rights WHERE rightID = ? AND userID = ? LIMIT 1;';
    }
}