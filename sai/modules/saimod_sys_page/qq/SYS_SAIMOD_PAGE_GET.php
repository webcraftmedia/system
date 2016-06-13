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
class SYS_SAIMOD_PAGE_GET extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return 
'SELECT * FROM system_page ORDER BY `group`, `ID` ASC;';
    }
    public static function mysql(){return 
'SELECT * FROM system_page ORDER BY `group`, `ID` ASC;';
    }
}
