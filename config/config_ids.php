<?php

namespace SYSTEM\CONFIG;

class config_ids {
    
    const SYS_CONFIG_ERRORREPORTING             = 1;    
    const SYS_CONFIG_PATH_BASEURL               = 2;
    const SYS_CONFIG_PATH_BASEPATH              = 3;
    const SYS_CONFIG_PATH_SYSTEMPATHREL         = 4;
    const SYS_CONFIG_DEFAULT_RESULT             = 5;
        const SYS_CONFIG_DEFAULT_RESULT_JSON    = 'json';
        const SYS_CONFIG_DEFAULT_RESULT_MSGPACK = 'msgpack';
        
    const SYS_CONFIG_DB_TYPE                    = 11;
        const SYS_CONFIG_DB_TYPE_MYS            = 'mysql';
        const SYS_CONFIG_DB_TYPE_PG             = 'postgresql';
    const SYS_CONFIG_DB_HOST                    = 12;
    const SYS_CONFIG_DB_PORT                    = 13;
    const SYS_CONFIG_DB_USER                    = 14;
    const SYS_CONFIG_DB_PASSWORD                = 15;
    const SYS_CONFIG_DB_DBNAME                  = 16;    
    
    const SYS_CONFIG_LANGS                      = 21;
    const SYS_CONFIG_DEFAULT_LANG               = 22;
    
    const SYS_CRON_LOG2SQLITE_PATH              = 30;
    
    const SYS_SAI_CONFIG_PROJECT                = 54;
}