<?php
namespace SYSTEM\SQL;
class SYS_LOG_OLDEST extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT  EXTRACT(MONTH FROM time)::INTEGER as month, EXTRACT(YEAR FROM time)::INTEGER as year FROM '.\SYSTEM\SQL\system_log::NAME_PG.' ORDER BY time ASC LIMIT 1';
    }
    public static function mysql(){return
'SELECT MONTH(time) as month, YEAR(time) as year FROM '.\SYSTEM\SQL\system_log::NAME_MYS.' ORDER BY time ASC LIMIT 1';
    }
}