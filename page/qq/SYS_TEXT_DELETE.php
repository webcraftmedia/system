<?php
namespace SYSTEM\DBD;
class SYS_TEXT_DELETE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'DELETE FROM `system_text` WHERE id = ? and lang = ?;';
    }
}