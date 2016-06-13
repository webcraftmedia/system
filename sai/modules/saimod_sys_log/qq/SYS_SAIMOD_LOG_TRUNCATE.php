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
class SYS_SAIMOD_LOG_TRUNCATE extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return             
'TRUNCATE '.\SYSTEM\SQL\system_log::NAME_PG.';';
    }
    public static function mysql(){return 
'TRUNCATE '.\SYSTEM\SQL\system_log::NAME_MYS.';';
    }
}