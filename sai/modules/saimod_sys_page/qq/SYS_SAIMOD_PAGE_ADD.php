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
 * QQ to add a system_page entry
 */
class SYS_SAIMOD_PAGE_ADD extends \SYSTEM\DB\QP {
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
'INSERT INTO '.\SYSTEM\SQL\system_page::NAME_PG.' (ID, group, type, parentID, parentValue, name, verify) VALUES ($1, $2, $3, $4, $5, $6, $7);';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return 
'INSERT INTO '.\SYSTEM\SQL\system_page::NAME_MYS.' (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (?, ?, ?, ?, ?, ?, ?);';
    }
}