<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_CRON_ADD extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'INSERT INTO '.\SYSTEM\DBD\system_cron::NAME_PG.' (class, min, hour, day, day_week, month) VALUES ($1, $2, $3, $4, $5, $6);';
    }
    public static function mysql(){return 
'INSERT INTO '.\SYSTEM\DBD\system_cron::NAME_MYS.' (class, min, hour, day, day_week, month) VALUES (?, ?, ?, ?, ?, ?)'.
' ON DUPLICATE KEY UPDATE `min`=VALUES(`min`),`hour`=VALUES(`hour`),`day`=VALUES(`day`),`day_week`=VALUES(`day_week`),`month`=VALUES(`month`);';
    }
}