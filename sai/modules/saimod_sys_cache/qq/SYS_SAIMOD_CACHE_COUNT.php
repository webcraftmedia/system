<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_CACHE_COUNT extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT COUNT(*) as "count" FROM system.cache';
    }
    public static function mysql(){return
'SELECT COUNT(*) as count FROM system_cache';
    }
}