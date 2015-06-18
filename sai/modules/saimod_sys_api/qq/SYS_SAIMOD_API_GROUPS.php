<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_API_GROUPS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT "group", count(*) as "count" FROM system.api GROUP BY "group" ORDER BY "group" ASC;';
    }
    public static function mysql(){return
'SELECT `group`, count(*) as `count` FROM system_api GROUP BY `group` ORDER BY `group` ASC;';
    }
}
