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
 * QQ to get a usernames infos
 */
class SYS_SECURITY_USER_INFO extends \SYSTEM\DB\QP {
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
'SELECT id,username,email,joindate,locale,last_active,email_confirmed FROM '.\SYSTEM\SQL\system_user::NAME_PG.
' WHERE UPPER('.\SYSTEM\SQL\system_user::FIELD_USERNAME.') = UPPER($1) OR UPPER('.\SYSTEM\SQL\system_user::FIELD_EMAIL.') = UPPER($2);';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
'SELECT id,username,email,joindate,locale,last_active,email_confirmed FROM '.\SYSTEM\SQL\system_user::NAME_MYS.
' WHERE UPPER('.\SYSTEM\SQL\system_user::FIELD_USERNAME.') = UPPER(?) OR UPPER('.\SYSTEM\SQL\system_user::FIELD_EMAIL.') = UPPER(?);';
    }
}