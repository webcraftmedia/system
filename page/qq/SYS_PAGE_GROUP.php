<?php
namespace SYSTEM\SQL;
class SYS_PAGE_GROUP extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_page::NAME_PG
.' WHERE "'.\SYSTEM\SQL\system_page::FIELD_GROUP.'" = $1'
.' AND "'.\SYSTEM\SQL\system_page::FIELD_STATE.'" = $2'
.' ORDER BY "'.\SYSTEM\SQL\system_page::FIELD_ID.'" ASC;';
    }
    public static function mysql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_page::NAME_MYS
.' WHERE `'.\SYSTEM\SQL\system_page::FIELD_GROUP.'` = ?'
.' AND `'.\SYSTEM\SQL\system_page::FIELD_STATE.'` = ?'
.' ORDER BY '.\SYSTEM\SQL\system_page::FIELD_ID.' ASC;';
    }
}