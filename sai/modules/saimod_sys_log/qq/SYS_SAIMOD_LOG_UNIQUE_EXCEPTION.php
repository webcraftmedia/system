<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_LOG_UNIQUE_EXCEPTION extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return            
'SELECT to_char(to_timestamp(extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int - (extract(epoch from '.\SYSTEM\SQL\system_log::FIELD_TIME.')::int % $1)), \'YYYY/MM/DD HH24:MI:SS\') as day,'
    .'count(*) as count,'
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_FILE.') as file_unique,'
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_LINE.') as line_unique,'                                        
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_CLASS.') as class_unique'
.' FROM '.\SYSTEM\SQL\system_log::NAME_PG
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
    public static function mysql(){return 
'SELECT DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.') - MOD(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_log::FIELD_TIME.'),?)),"%Y/%m/%d %H:%i:%s") as day,'
    .'count(*) as count,'                                        
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_FILE.') as file_unique,'
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_LINE.') as line_unique,'                                        
    .'count(distinct '.\SYSTEM\SQL\system_log::FIELD_CLASS.') as class_unique'
.' FROM '.\SYSTEM\SQL\system_log::NAME_MYS
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
}