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
 * QQ to get latest texts by tag and limit
 */
class SYS_TEXT_GET_LATEST extends \SYSTEM\DB\QP {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT system_text.id,text FROM system_text
 LEFT JOIN system_text_tag ON system_text.id = system_text_tag.id
 WHERE tag = ? ORDER BY time_create DESC LIMIT ?;';
    }
}