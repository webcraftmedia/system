<?php
namespace SYSTEM\SQL;
class DATA_SYSTEM_API extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_pgsql(){
        return array(   (new \SYSTEM\PSQL('/qt/pgsql/data/system_api.sql'))->SERVERPATH(),
                        (new \SYSTEM\PSQL('/qt/pgsql/data/system_api_default.sql'))->SERVERPATH(),
                        (new \SYSTEM\PSQL('/qt/pgsql/data/system_sai_api.sql'))->SERVERPATH());
    }
    public static function files_mysql(){
        return array(   (new \SYSTEM\PSQL('/qt/mysql/data/system_api.sql'))->SERVERPATH(),
                        (new \SYSTEM\PSQL('/qt/mysql/data/system_api_default.sql'))->SERVERPATH(),
                        (new \SYSTEM\PSQL('/qt/mysql/data/system_sai_api.sql'))->SERVERPATH());
    }    
}