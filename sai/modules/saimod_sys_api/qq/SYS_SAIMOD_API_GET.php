<?php
namespace SYSTEM\DBD;
class SYS_SAIMOD_API_GET extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return          
'SELECT * FROM system_api ORDER BY `group`, `ID` ASC;';
    }
    public static function mysql(){return
'SELECT * FROM system_api ORDER BY `group`, `ID` ASC;';
    }
}
