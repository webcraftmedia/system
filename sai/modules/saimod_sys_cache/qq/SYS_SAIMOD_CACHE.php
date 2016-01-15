<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_CACHE extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT *, encode(data,\'base64\') FROM system.cache ORDER BY "ID" ASC LIMIT 100;';
    }
    public static function mysql(){return
'SELECT * FROM system_cache ORDER BY ID ASC LIMIT 100;';
    }
}