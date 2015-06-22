<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_TEXT_COUNT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return 
'SELECT COUNT(*) as `count`'.
' FROM system_text'.
' LEFT JOIN system_user as a ON system_text.author = a.id'.
' LEFT JOIN system_user as ae ON system_text.author_edit = ae.id'.                
' WHERE (a.username LIKE ? OR ae.username LIKE ? OR text LIKE ?);';
    }
}