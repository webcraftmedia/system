<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_LOG_TRUNCATE extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return             
'TRUNCATE '.\SYSTEM\SQL\system_log::NAME_PG.';';
    }
    public static function mysql(){return 
'TRUNCATE '.\SYSTEM\SQL\system_log::NAME_MYS.';';
    }
}