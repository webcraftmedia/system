<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_CRON_SINGLE_SELECT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT * FROM '.\SYSTEM\SQL\system_cron::NAME_PG.'  WHERE class = $1;';
    }
    public static function mysql(){return 
'SELECT * FROM '.\SYSTEM\SQL\system_cron::NAME_MYS.' WHERE class = ?;';
    }
}
