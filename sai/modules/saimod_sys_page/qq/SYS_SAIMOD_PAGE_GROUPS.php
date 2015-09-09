<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_PAGE_GROUPS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return             
'SELECT "group", count(*) as "count" FROM system.page GROUP BY "group" ORDER BY "group" ASC;';
    }
    public static function mysql(){return 
'SELECT `group`, count(*) as `count` FROM system_page GROUP BY `group` ORDER BY `group` ASC;';
    }
}
