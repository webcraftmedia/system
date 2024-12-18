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
 * QQ to add a system_cron entry
 */
class SYS_SAIMOD_CRON_ADD extends \SYSTEM\DB\QP {
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
'INSERT INTO '.\SYSTEM\SQL\system_cron::NAME_PG.' (class, min, hour, day, day_week, month) VALUES ($1, $2, $3, $4, $5, $6);';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return 
'INSERT INTO '.\SYSTEM\SQL\system_cron::NAME_MYS.' (class, min, hour, day, day_week, month) VALUES (?, ?, ?, ?, ?, ?)'.
' ON DUPLICATE KEY UPDATE `min`=VALUES(`min`),`hour`=VALUES(`hour`),`day`=VALUES(`day`),`day_week`=VALUES(`day_week`),`month`=VALUES(`month`);';
    }
}