<?php
namespace SYSTEM\DBD;
class SYS_TEXT_GET_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT id,text FROM system_text WHERE id = ? and lang = ?;';
    }
}