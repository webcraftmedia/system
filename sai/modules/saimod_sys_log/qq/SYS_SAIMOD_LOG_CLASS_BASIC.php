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
 * QQ to get analytics data from system_log - class basic
 */
class SYS_SAIMOD_LOG_CLASS_BASIC extends \SYSTEM\DB\QP {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class();}
    public static function pgsql(){return          
'SELECT to_char(to_timestamp(extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int - (extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int % $1)), \'YYYY/MM/DD HH24:MI:SS\') as day,'
    .'count(*) as count,'                                                                                
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'ERROR\' then 1 else 0 end) class_ERROR,'                                        
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'WARNING\' then 1 else 0 end) class_WARNING,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'INFO\' then 1 else 0 end) class_INFO,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'DEPRECATED\' then 1 else 0 end) class_DEPRECATED,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'AppError\' then 1 else 0 end) class_AppError'
.' FROM '.\SYSTEM\SQL\system_log::NAME_PG
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
    public static function mysql(){return 
'SELECT DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.') - MOD(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.'),?)),"%Y/%m/%d %H:%i:%s") as day,'
    .'count(*) as count,'                                                                                
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'ERROR\' then 1 else 0 end) class_ERROR,'                                        
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'WARNING\' then 1 else 0 end) class_WARNING,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'INFO\' then 1 else 0 end) class_INFO,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'DEPRECATED\' then 1 else 0 end) class_DEPRECATED,'
    .'sum(case when '.\SYSTEM\SQL\system_log::FIELD_CLASS.' = \'AppError\' then 1 else 0 end) class_AppError'
.' FROM '.\SYSTEM\SQL\system_log::NAME_MYS
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
}