<?php
namespace SYSTEM\SQL;
class DATA_SYSTEM_PAGE extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_pgsql(){
        return array(   \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/data/system_page.sql'));
    }
    public static function files_mysql(){
        return array(   \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/data/system_page.sql'));
    }    
}