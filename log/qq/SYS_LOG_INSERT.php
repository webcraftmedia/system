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
 * QQ to insert a new log entry
 */
class SYS_LOG_INSERT extends \SYSTEM\DB\QP {
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
'INSERT INTO '.\SYSTEM\SQL\system_log::NAME_PG.
'("'.\SYSTEM\SQL\system_log::FIELD_CLASS.'","'.\SYSTEM\SQL\system_log::FIELD_MESSAGE.'","'.
    \SYSTEM\SQL\system_log::FIELD_CODE.'","'.\SYSTEM\SQL\system_log::FIELD_FILE.'","'.
    \SYSTEM\SQL\system_log::FIELD_LINE.'","'.\SYSTEM\SQL\system_log::FIELD_TRACE.'","'.
    \SYSTEM\SQL\system_log::FIELD_IP.'","'.\SYSTEM\SQL\system_log::FIELD_QUERYTIME.'","'.
    \SYSTEM\SQL\system_log::FIELD_SERVER_NAME.'","'.\SYSTEM\SQL\system_log::FIELD_SERVER_PORT.'","'.
    \SYSTEM\SQL\system_log::FIELD_REQUEST_URI.'","'.\SYSTEM\SQL\system_log::FIELD_POST.'","'.
    \SYSTEM\SQL\system_log::FIELD_HTTP_REFERER.'","'.\SYSTEM\SQL\system_log::FIELD_HTTP_USER_AGENT.'","'.
    \SYSTEM\SQL\system_log::FIELD_USER.'","'.\SYSTEM\SQL\system_log::FIELD_THROWN.'")'.
'VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16);';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
'INSERT INTO '.\SYSTEM\SQL\system_log::NAME_MYS.
'('.\SYSTEM\SQL\system_log::FIELD_CLASS.','.\SYSTEM\SQL\system_log::FIELD_MESSAGE.','.
    \SYSTEM\SQL\system_log::FIELD_CODE.','.\SYSTEM\SQL\system_log::FIELD_FILE.','.
    \SYSTEM\SQL\system_log::FIELD_LINE.','.\SYSTEM\SQL\system_log::FIELD_TRACE.','.
    \SYSTEM\SQL\system_log::FIELD_IP.','.\SYSTEM\SQL\system_log::FIELD_QUERYTIME.','.
    \SYSTEM\SQL\system_log::FIELD_TIME.','.\SYSTEM\SQL\system_log::FIELD_SERVER_NAME.','.
    \SYSTEM\SQL\system_log::FIELD_SERVER_PORT.','.\SYSTEM\SQL\system_log::FIELD_REQUEST_URI.','.
    \SYSTEM\SQL\system_log::FIELD_POST.','.\SYSTEM\SQL\system_log::FIELD_HTTP_REFERER.','.
    \SYSTEM\SQL\system_log::FIELD_HTTP_USER_AGENT.','.\SYSTEM\SQL\system_log::FIELD_USER.','.
    \SYSTEM\SQL\system_log::FIELD_THROWN.')'.
'VALUES(?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?);';
    }
}