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
 * QQ to count all system_log entrys of a user
 */
class SYS_SAIMOD_SECURITY_USER_LOG_COUNT extends \SYSTEM\DB\QP {
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
'SELECT COUNT(*) as count FROM '.\SYSTEM\SQL\system_log::NAME_PG.
' WHERE "'.\SYSTEM\SQL\system_log::FIELD_USER.'"'.
' = $1;';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return 
'SELECT COUNT(*) as count'.
' FROM '.\SYSTEM\SQL\system_log::NAME_MYS.
' WHERE '.\SYSTEM\SQL\system_log::FIELD_USER.
' = ?;';
    }
}

