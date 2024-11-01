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
 * QQ to get all State Data for given group and statename
 */
class SYS_PAGE_GROUP extends \SYSTEM\DB\QP {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class($this);}
    
    /**
     * Get QQs PostgreSQL Query String
     * 
     * @return string Returns PostgreSQL Query String
     */
    public static function pgsql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_page::NAME_PG
.' WHERE "'.\SYSTEM\SQL\system_page::FIELD_GROUP.'" = $1'
.' AND "'.\SYSTEM\SQL\system_page::FIELD_STATE.'" = $2'
.' ORDER BY "'.\SYSTEM\SQL\system_page::FIELD_ID.'" ASC;';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_page::NAME_MYS
.' WHERE `'.\SYSTEM\SQL\system_page::FIELD_GROUP.'` = ?'
.' AND `'.\SYSTEM\SQL\system_page::FIELD_STATE.'` = ?'
.' ORDER BY '.\SYSTEM\SQL\system_page::FIELD_ID.' ASC;';
    }
}