<?php
namespace SYSTEM\SQL;
class SYS_TEXT_GET_ID_TAGS extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT tag FROM system_text_tag WHERE id = ?';
    }
}