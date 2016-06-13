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
class SYS_SAIMOD_TODO_EXCEPTION_INSERT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'INSERT INTO '.\SYSTEM\SQL\system_todo::NAME_PG.
'('.\SYSTEM\SQL\system_todo::FIELD_CLASS.','.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.','.
    \SYSTEM\SQL\system_todo::FIELD_CODE.','.\SYSTEM\SQL\system_todo::FIELD_FILE.','.
    \SYSTEM\SQL\system_todo::FIELD_LINE.','.\SYSTEM\SQL\system_todo::FIELD_TRACE.','.
    \SYSTEM\SQL\system_todo::FIELD_IP.','.\SYSTEM\SQL\system_todo::FIELD_QUERYTIME.','.
    \SYSTEM\SQL\system_todo::FIELD_TIME.','.\SYSTEM\SQL\system_todo::FIELD_SERVER_NAME.','.
    \SYSTEM\SQL\system_todo::FIELD_SERVER_PORT.','.\SYSTEM\SQL\system_todo::FIELD_REQUEST_URI.','.
    \SYSTEM\SQL\system_todo::FIELD_POST.','.\SYSTEM\SQL\system_todo::FIELD_HTTP_REFERER.','.
    \SYSTEM\SQL\system_todo::FIELD_HTTP_USER_AGENT.',"'.\SYSTEM\SQL\system_todo::FIELD_USER.'",'.
    \SYSTEM\SQL\system_todo::FIELD_THROWN.','.\SYSTEM\SQL\system_todo::FIELD_MESSAGE_HASH.','.
    \SYSTEM\SQL\system_todo::FIELD_TYPE.')'.
'VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, encode(digest($18, \'sha1\'), \'hex\'),$19)';
    }
    public static function mysql(){return
'INSERT INTO '.\SYSTEM\SQL\system_todo::NAME_MYS.
'('.\SYSTEM\SQL\system_todo::FIELD_CLASS.','.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.','.
    \SYSTEM\SQL\system_todo::FIELD_CODE.','.\SYSTEM\SQL\system_todo::FIELD_FILE.','.
    \SYSTEM\SQL\system_todo::FIELD_LINE.','.\SYSTEM\SQL\system_todo::FIELD_TRACE.','.
    \SYSTEM\SQL\system_todo::FIELD_IP.','.\SYSTEM\SQL\system_todo::FIELD_QUERYTIME.','.
    \SYSTEM\SQL\system_todo::FIELD_TIME.','.\SYSTEM\SQL\system_todo::FIELD_SERVER_NAME.','.
    \SYSTEM\SQL\system_todo::FIELD_SERVER_PORT.','.\SYSTEM\SQL\system_todo::FIELD_REQUEST_URI.','.
    \SYSTEM\SQL\system_todo::FIELD_POST.','.\SYSTEM\SQL\system_todo::FIELD_HTTP_REFERER.','.
    \SYSTEM\SQL\system_todo::FIELD_HTTP_USER_AGENT.','.\SYSTEM\SQL\system_todo::FIELD_USER.','.
    \SYSTEM\SQL\system_todo::FIELD_THROWN.','.\SYSTEM\SQL\system_todo::FIELD_MESSAGE_HASH.','.
    \SYSTEM\SQL\system_todo::FIELD_TYPE.')'.
'VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SHA1(?),?)'.
'ON DUPLICATE KEY '.
' UPDATE '. \SYSTEM\SQL\system_todo::FIELD_COUNT.'='.\SYSTEM\SQL\system_todo::FIELD_COUNT.'+1, '.
            \SYSTEM\SQL\system_todo::FIELD_TIME.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_TIME.'), '.
            \SYSTEM\SQL\system_todo::FIELD_STATE.'='.\SYSTEM\SQL\system_todo::FIELD_STATE_OPEN.', '.
            \SYSTEM\SQL\system_todo::FIELD_CODE.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_CODE.'), '.
            \SYSTEM\SQL\system_todo::FIELD_TRACE.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_TRACE.'), '.
            \SYSTEM\SQL\system_todo::FIELD_IP.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_IP.'), '.
            \SYSTEM\SQL\system_todo::FIELD_QUERYTIME.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_QUERYTIME.'), '.
            \SYSTEM\SQL\system_todo::FIELD_TIME.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_TIME.'), '.
            \SYSTEM\SQL\system_todo::FIELD_SERVER_NAME.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_SERVER_NAME.'), '.
            \SYSTEM\SQL\system_todo::FIELD_SERVER_PORT.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_SERVER_PORT.'), '.
            \SYSTEM\SQL\system_todo::FIELD_REQUEST_URI.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_REQUEST_URI.'), '.
            \SYSTEM\SQL\system_todo::FIELD_POST.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_POST.'), '.
            \SYSTEM\SQL\system_todo::FIELD_HTTP_REFERER.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_HTTP_REFERER.'), '.
            \SYSTEM\SQL\system_todo::FIELD_HTTP_USER_AGENT.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_HTTP_USER_AGENT.'), '.
            \SYSTEM\SQL\system_todo::FIELD_USER.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_USER.'), '.
            \SYSTEM\SQL\system_todo::FIELD_THROWN.'=VALUES('.\SYSTEM\SQL\system_todo::FIELD_THROWN.');';
    }
}