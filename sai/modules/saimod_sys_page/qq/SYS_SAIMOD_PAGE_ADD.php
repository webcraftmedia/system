<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_PAGE_ADD extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return           
'INSERT INTO '.\SYSTEM\DBD\system_page::NAME_PG.' (ID, group, type, parentID, parentValue, name, verify) VALUES ($1, $2, $3, $4, $5, $6, $7);';
    }
    public static function mysql(){return 
'INSERT INTO '.\SYSTEM\DBD\system_page::NAME_MYS.' (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (?, ?, ?, ?, ?, ?, ?);';
    }
}