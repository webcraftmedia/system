<?php
namespace SYSTEM\SQL;
class SYS_CRON_UPD extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pqsql(){return          
'UPDATE '.\SYSTEM\SQL\system_cron::NAME_PG.' SET '.\SYSTEM\SQL\system_cron::FIELD_STATUS.' = $1,'.\SYSTEM\SQL\system_cron::FIELD_LAST_RUN.' = to_timestamp($2) WHERE '.\SYSTEM\SQL\system_cron::FIELD_CLASS.' = $3;';
    }
    public static function mysql(){return
'UPDATE '.\SYSTEM\SQL\system_cron::NAME_MYS.' SET '.\SYSTEM\SQL\system_cron::FIELD_STATUS.' = ?,'.\SYSTEM\SQL\system_cron::FIELD_LAST_RUN.' = FROM_UNIXTIME(?)  WHERE '.\SYSTEM\SQL\system_cron::FIELD_CLASS.' = ?;';
    }
}