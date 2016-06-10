<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\SQL
 */
namespace SYSTEM\SQL;

/**
 * QQ to delete a log entry by id
 */
class SYS_LOG_DEL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return
'DELETE FROM '.\SYSTEM\SQL\system_log::NAME_PG.' WHERE "ID" = $1;';
    }
    public static function mysql(){return
'DELETE FROM '.\SYSTEM\SQL\system_log::NAME_MYS.' WHERE ID = ?;';
    }
}