<?php
namespace SYSTEM\SQL;
class SYS_TEXT_RENAME_TAGS extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'UPDATE system_text_tag SET id = ? WHERE id = ?;';
    }
}