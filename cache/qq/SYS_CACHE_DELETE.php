<?php
namespace SYSTEM\SQL;
class SYS_CACHE_DELETE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return           
'DELETE FROM system.cache'.
' WHERE "CacheID" = $1 AND'.
' "Ident" = $2;';
    }
}