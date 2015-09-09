<?php
namespace SYSTEM\DBD;
class SYS_TEXT_GET_ID_ADV extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT system_text.*, a.username as author_name, ae.username as author_edit_name FROM system_text'.
' LEFT JOIN system_user AS a ON system_text.author = a.id'.
' LEFT JOIN system_user AS ae ON system_text.author_edit = ae.id'.
' WHERE system_text.id = ? and lang = ?;';
    }
}