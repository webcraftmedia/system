<?php
namespace SYSTEM\SQL;
class SYS_CACHE_DELETE_ALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'DELETE FROM system.cache;';
    }
    public static function mysql(){return
'DELETE FROM system_cache;';
    }
}