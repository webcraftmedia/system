<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_SECURITY_USER_COUNT_FILTER extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return 
'SELECT count(*) as count FROM system_user'.
' LEFT JOIN system_user_to_rights ON system_user.ID = system_user_to_rights.userID'.
' WHERE (username LIKE ? OR email LIKE ?) AND rightID = ?;';
    }
}