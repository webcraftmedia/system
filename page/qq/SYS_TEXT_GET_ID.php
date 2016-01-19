<?php
namespace SYSTEM\SQL;
class SYS_TEXT_GET_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'SELECT id,text FROM system.text WHERE id = $1 and lang = $2;';
    }
    public static function mysql(){return
'SELECT id,text FROM system_text WHERE id = ? and lang = ?;';
    }
}