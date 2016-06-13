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
class SYS_SAIMOD_LOG_UNIQUE_BASIC extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return           
'SELECT to_char(to_timestamp(extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int - (extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int % $1)), \'YYYY/MM/DD HH24:MI:SS\') as day,'
    .'count(*) as count,'                                                                                
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_USER.') as user_unique,'                                        
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_IP.') as ip_unique,'                                                                     
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_SERVER_NAME.') as server_name_unique'
.' FROM '.\SYSTEM\SQL\system_log::NAME_PG
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
    public static function mysql(){return 
'SELECT DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.') - MOD(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.'),?)),"%Y/%m/%d %H:%i:%s") as day,'
    .'count(*) as count,'
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_USER.') as user_unique,'                                        
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_IP.') as ip_unique,'                                                                     
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_SERVER_NAME.') as server_name_unique'
.' FROM '.\SYSTEM\SQL\system_log::NAME_MYS
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
}