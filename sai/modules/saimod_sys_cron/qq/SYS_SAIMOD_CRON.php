<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_CRON extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_cron::NAME_PG.' ORDER BY class;';
    }
    public static function mysql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_cron::NAME_MYS.' ORDER BY class;';
    }
}