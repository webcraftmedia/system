<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_PAGE_SINGLE_SELECT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT * FROM '.\SYSTEM\SQL\system_page::NAME_PG.'  WHERE ID = $1 AND group = $2;';
    }
    public static function mysql(){return 
'SELECT * FROM '.\SYSTEM\SQL\system_page::NAME_MYS.' WHERE ID = ? AND `group` = ?;';
    }
}
