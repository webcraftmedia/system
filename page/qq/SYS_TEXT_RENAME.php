<?php
namespace SYSTEM\SQL;
class SYS_TEXT_RENAME extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'UPDATE system_text SET id = ? WHERE id = ?;';
    }
}