<?php
namespace SYSTEM\SQL;
class SYS_CRON_LAST_VISIT extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT last_run FROM '.\SYSTEM\SQL\system_cron::NAME_PG.' ORDER BY last_run DESC LIMIT 1;';
    }
    public static function mysql(){return
'SELECT last_run FROM '.\SYSTEM\SQL\system_cron::NAME_MYS.' ORDER BY last_run DESC LIMIT 1';
    }
}