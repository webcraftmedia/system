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
 * QQ to get all system_todo entrys
 */
class SYS_SAIMOD_TODO_LIST extends \SYSTEM\DB\QP {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class();}
    
    /**
     * Get QQs PostgreSQL Query String
     * 
     * @return string Returns PostgreSQL Query String
     */
    public static function pgsql(){return
'SELECT DISTINCT ON (todo_id) * FROM('.
    ' SELECT todo."'.\SYSTEM\SQL\system_todo::FIELD_ID.'" as todo_id,'.
        ' todo.'.\SYSTEM\SQL\system_todo::FIELD_TYPE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_CLASS.', todo.'.\SYSTEM\SQL\system_todo::FIELD_TIME.', todo.'.\SYSTEM\SQL\system_todo::FIELD_COUNT.', todo.'.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_REQUEST_URI.', todo.'.\SYSTEM\SQL\system_todo::FIELD_FILE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_LINE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_SERVER_NAME.', todo.'.\SYSTEM\SQL\system_todo::FIELD_SERVER_PORT.', todo.'.\SYSTEM\SQL\system_todo::FIELD_QUERYTIME.', todo.'.\SYSTEM\SQL\system_todo::FIELD_IP.', todo.'.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.','.
        ' creator.'.\SYSTEM\SQL\system_user::FIELD_ID.' as creator_id,'.
        ' creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.','.
        ' assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as assignee,'.
        ' assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.' as assignee_id'.
    ' FROM '.\SYSTEM\SQL\system_todo::NAME_PG.' as todo'.
    ' LEFT JOIN '.\SYSTEM\SQL\system_todo_assign::NAME_PG.' as assign ON todo."'.\SYSTEM\SQL\system_todo::FIELD_ID.'"=assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_PG.' as creator ON todo.'.\SYSTEM\SQL\system_todo::FIELD_USER.'=creator.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_PG.' as assignee ON assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.'=assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' WHERE todo.'.\SYSTEM\SQL\system_todo::FIELD_STATE.' = $1'.
    ' AND (todo.'.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.' LIKE $2 OR creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE $3 OR  assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE $4)'.
    ' ORDER BY case when assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = $5 then 1 else 2 end'.
') as a';
    //' ORDER BY a.'.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_TYPE.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_COUNT.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_TIME.' DESC';
    //sorry postgres but ur rly bad!
    }
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
'SELECT * FROM('.
    ' SELECT todo.'.\SYSTEM\SQL\system_todo::FIELD_ID.' as todo_id,'.
        ' todo.'.\SYSTEM\SQL\system_todo::FIELD_TYPE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_CLASS.', todo.'.\SYSTEM\SQL\system_todo::FIELD_TIME.', todo.'.\SYSTEM\SQL\system_todo::FIELD_COUNT.', todo.'.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_REQUEST_URI.', todo.'.\SYSTEM\SQL\system_todo::FIELD_FILE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_LINE.', todo.'.\SYSTEM\SQL\system_todo::FIELD_SERVER_NAME.', todo.'.\SYSTEM\SQL\system_todo::FIELD_SERVER_PORT.', todo.'.\SYSTEM\SQL\system_todo::FIELD_QUERYTIME.', todo.'.\SYSTEM\SQL\system_todo::FIELD_IP.', todo.'.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.','.
        ' creator.'.\SYSTEM\SQL\system_user::FIELD_ID.' as creator_id,'.
        ' creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.','.
        ' assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' as assignee,'.
        ' assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.' as assignee_id'.
    ' FROM '.\SYSTEM\SQL\system_todo::NAME_MYS.' as todo'.
    ' LEFT JOIN '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' as assign ON todo.'.\SYSTEM\SQL\system_todo::FIELD_ID.'=assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_TODO.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as creator ON todo.'.\SYSTEM\SQL\system_todo::FIELD_USER.'=creator.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' LEFT JOIN '.\SYSTEM\SQL\system_user::NAME_MYS.' as assignee ON assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.'=assignee.'.\SYSTEM\SQL\system_user::FIELD_ID.
    ' WHERE todo.'.\SYSTEM\SQL\system_todo::FIELD_STATE.' = ?'.
    ' AND (todo.'.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.' LIKE ? OR creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE ? OR  assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE ?)'.
    ' ORDER BY case when assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ? then 1 else 2 end'.
') as a'.
' GROUP BY a.todo_id'.
' ORDER BY a.'.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_TYPE.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_COUNT.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_TIME.' DESC';
    }
}