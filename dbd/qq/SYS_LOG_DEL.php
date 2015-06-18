<?php
namespace SYSTEM\DBD;
class SYS_LOG_DEL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return
'DELETE FROM '.\SYSTEM\DBD\system_log::NAME_PG.' WHERE "ID" = $1;';
    }
    public static function mysql(){return
'DELETE FROM '.\SYSTEM\DBD\system_log::NAME_MYS.' WHERE ID = ?;';
    }
}