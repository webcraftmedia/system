<?php
namespace SYSTEM\SQL;
class SYS_LOG_MONTH extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT * FROM '.\SYSTEM\SQL\system_log::NAME_MYS.' WHERE MONTH(time) = ? AND YEAR(time) = ? ORDER BY time DESC LIMIT 10000;';
    }
}