<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_CACHE_CLEAR extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'DELETE FROM system.cache;';
    }
    public static function mysql(){return
'DELETE FROM system_cache;';
    }
}