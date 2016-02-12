<?php
namespace SYSTEM\SQL;
class SYS_TEXT_GET_TAGS extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT * FROM system.text_tag'.
' WHERE id = $1 LIMIT $2;';
    }
    public static function mysql(){return
'SELECT * FROM system_text_tag'.
' WHERE id = ? LIMIT ?;';
    }
}