<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_LIST_MINE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
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
    ' AND assign.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' = ?'.
    ' AND (todo.'.\SYSTEM\SQL\system_todo::FIELD_MESSAGE.' LIKE ? OR creator.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE ? OR  assignee.'.\SYSTEM\SQL\system_user::FIELD_USERNAME.' LIKE ?)'.
') as a'.
' GROUP BY a.todo_id'.
' ORDER BY a.'.\SYSTEM\SQL\system_todo::FIELD_PRIORITY.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_TYPE.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_COUNT.' DESC, a.'.\SYSTEM\SQL\system_todo::FIELD_TIME.' DESC';    
    }
}