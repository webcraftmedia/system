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
 * QQ to deassgin a system_todo entry from a user
 */
class SYS_SAIMOD_TODO_DEASSIGN extends \SYSTEM\DB\QP {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class(self);}
    
    /**
     * Get QQs PostgreSQL Query String
     * 
     * @return string Returns PostgreSQL Query String
     */
    public static function pgsql(){return
'DELETE FROM '.\SYSTEM\SQL\system_todo_assign::NAME_PG.' WHERE '.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.' = $1 AND "'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.'" = $2;';
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
'DELETE FROM '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' WHERE '.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.' = ? AND '.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ?;';
    }
}