<?php
namespace SYSTEM\DBD;
class SYS_TEXT_SAVE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO `system_text` (`id`, `lang`, `text`, `author`, `author_edit`, `time_create`, `time_edit`)
 VALUES (?, ?, ?, ?, ?, NOW(), NOW())
 ON DUPLICATE KEY UPDATE text=VALUES(text), author_edit = VALUES(author_edit), time_edit = NOW();';
    }
}