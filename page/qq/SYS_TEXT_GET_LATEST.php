<?php
namespace SYSTEM\SQL;
class SYS_TEXT_GET_LATEST extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT system_text.id,text FROM system_text
 LEFT JOIN system_text_tag ON system_text.id = system_text_tag.id
 WHERE tag = ? ORDER BY time_create DESC LIMIT ?;';
    }
}