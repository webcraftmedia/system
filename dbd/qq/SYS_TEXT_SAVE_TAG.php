<?php
namespace SYSTEM\DBD;
class SYS_TEXT_SAVE_TAG extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT IGNORE `system_text_tag` (`id`, `tag`)
 VALUES (?, ?);';
    }
}