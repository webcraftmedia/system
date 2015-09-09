<?php
namespace SYSTEM\SQL;
class SYS_API_TREE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_api::NAME_PG
.' WHERE "'.\SYSTEM\SQL\system_api::FIELD_GROUP.'" = $1'
.' ORDER BY "'.\SYSTEM\SQL\system_api::FIELD_ID.'"';
    }
    public static function mysql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_api::NAME_MYS
.' WHERE `'.\SYSTEM\SQL\system_api::FIELD_GROUP.'` = ?'
.' ORDER BY '.\SYSTEM\SQL\system_api::FIELD_ID;
    }    
}