<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_CRON_CHANGE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return           
'UPDATE '.\SYSTEM\DBD\system_cron::NAME_PG.' SET status = $1 WHERE class = $2;';
    }
    public static function mysql(){return 
'UPDATE '.\SYSTEM\DBD\system_cron::NAME_MYS.' SET status = ? WHERE `class` = ?;';
    }
}
