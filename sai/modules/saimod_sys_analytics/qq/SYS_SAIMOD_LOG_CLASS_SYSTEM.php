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
 * QQ to get analytics data from system_log - class system
 */
class SYS_SAIMOD_LOG_CLASS_SYSTEM extends \SYSTEM\DB\QP {
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
'SELECT to_char(to_timestamp(extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int - (extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int % $1)), \'YYYY/MM/DD HH24:MI:SS\') as day,'
    .'count(*) as count,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\COUNTER\' then 1 else 0 end) class_SYSTEM_LOG_COUNTER,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\INFO\' then 1 else 0 end) class_SYSTEM_LOG_INFO,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\DEPRECATED\' then 1 else 0 end) class_SYSTEM_LOG_DEPRECATED,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\WARNING\' then 1 else 0 end) class_SYSTEM_LOG_WARNING,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\ERROR\' then 1 else 0 end) class_SYSTEM_LOG_ERROR,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\ERROR_EXCEPTION\' then 1 else 0 end) class_SYSTEM_LOG_ERROR_EXCEPTION,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'SYSTEM\LOG\SHUTDOWN_EXCEPTION\' then 1 else 0 end) class_SYSTEM_LOG_SHUTDOWN_EXCEPTION'
.' FROM '.\SYSTEM\SQL\system_log::NAME_PG
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return 
'SELECT DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.') - MOD(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.'),?)),"%Y/%m/%d %H:%i:%s") as day,'
    .'count(*) as count,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\COUNTER" then 1 else 0 end) class_SYSTEM_LOG_COUNTER,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\INFO" then 1 else 0 end) class_SYSTEM_LOG_INFO,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\DEPRECATED" then 1 else 0 end) class_SYSTEM_LOG_DEPRECATED,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\WARNING" then 1 else 0 end) class_SYSTEM_LOG_WARNING,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\ERROR" then 1 else 0 end) class_SYSTEM_LOG_ERROR,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\ERROR_EXCEPTION" then 1 else 0 end) class_SYSTEM_LOG_ERROR_EXCEPTION,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = "SYSTEM\\\\LOG\\\\SHUTDOWN_EXCEPTION" then 1 else 0 end) class_SYSTEM_LOG_SHUTDOWN_EXCEPTION'
.' FROM '.\SYSTEM\SQL\system_log::NAME_MYS
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
}