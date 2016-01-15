<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TEXT_TAGS extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT "tag", COUNT(*) as "count" FROM system.text_tag GROUP BY "tag" ORDER BY "tag" ASC;';
    }
    public static function mysql(){return 
'SELECT `tag`, COUNT(*) as `count` FROM system_text_tag GROUP BY `tag` ORDER BY `tag` ASC;';
    }
}