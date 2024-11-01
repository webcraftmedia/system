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
 * QQ to get count of all open not assigned system_todo entrys
 */
class SYS_SAIMOD_TODO_STATS_COUNT_TODO_NOT_ASSIGNED extends \SYSTEM\DB\QQ {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class($this);}
    
    /**
     * Get QQs PostgreSQL Query String
     * 
     * @return string Returns PostgreSQL Query String
     */
    public static function pgsql(){return
'SELECT COUNT(*) as count FROM system.todo'.
' LEFT JOIN system.todo_assign ON system.todo."ID" = system.todo_assign.todo'.
' WHERE state = 0 AND type = 1 AND system.todo_assign.user IS NULL;';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
'SELECT COUNT(*) as `count` FROM system_todo'.
' LEFT JOIN system_todo_assign ON system_todo.id = system_todo_assign.todo'.
' WHERE state = 0 AND `type` = 1 AND system_todo_assign.user IS NULL;';
    }
}