<?php
namespace SYSTEM\SQL;
class SYS_CACHE_CHECK extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return          
'SELECT * FROM system.cache'.
' WHERE cache = $1 AND ident = $2;';
    }
    public static function mysql(){return          
'SELECT * FROM system_cache'.
' WHERE cache = ? AND ident = ?;';
    } 
}