<?php
namespace SYSTEM\SQL;
class SCHEMA_SYSTEM extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_pgsql(){
        return array(   \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_api.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_cache.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_cron.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_log.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_page.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_rights.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_text.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_text_tag.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_todo.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_todo_assign.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_user.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/pgsql/schema/system_user_to_rights.sql'));
    } 
    public static function files_mysql(){
        return array(   \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_api.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_cache.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_cron.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_log.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_page.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_rights.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_text.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_text_tag.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_todo.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_todo_assign.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_user.sql'),
                        \SYSTEM\SERVERPATH(new \SYSTEM\PSQL(),'/qt/mysql/schema/system_user_to_rights.sql'));
    }    
}