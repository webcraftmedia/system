<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\SQL
 */
namespace SYSTEM\SQL;

/**
 * QQ to get all system_user entrys with filter
 */
class SYS_SAIMOD_SECURITY_USERS extends \SYSTEM\DB\QP {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return static::class;}
    
    /**
     * Get QQs PostgreSQL Query String
     * 
     * @return string Returns PostgreSQL Query String
     */
    public static function pgsql(){return 
'SELECT id,username,email,joindate,locale, EXTRACT(EPOCH FROM last_active) as last_active, email_confirmed'.
' FROM system.user'.
' WHERE username LIKE $1 OR email LIKE $2'.
' ORDER BY last_active DESC;';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return 
'SELECT id,username,email,joindate,locale,unix_timestamp(last_active)as last_active, email_confirmed'.
' FROM system_user'.
' WHERE username LIKE ? OR email LIKE ?'.
' ORDER BY last_active DESC;';
    }
}