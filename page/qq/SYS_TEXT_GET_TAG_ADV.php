<?php
namespace SYSTEM\SQL;
class SYS_TEXT_GET_TAG_ADV extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT system_text.*, system_text_tag.*, a.username as author_name, ae.username as author_edit_name FROM system_text'.
' LEFT JOIN system_text_tag ON system_text.id = system_text_tag.id'.
' LEFT JOIN system_user AS a ON system_text.author = a.id'.
' LEFT JOIN system_user AS ae ON system_text.author_edit = ae.id'.
' WHERE tag = ? and lang = ? ORDER BY time_create DESC;';
    }
}