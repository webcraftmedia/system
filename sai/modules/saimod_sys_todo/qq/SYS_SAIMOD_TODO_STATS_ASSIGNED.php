<?php
namespace SYSTEM\SQL;
class SYS_SAIMOD_TODO_STATS_ASSIGNED extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return 
'SELECT DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_todo::NAME_MYS.'.'.\SYSTEM\SQL\system_todo::FIELD_TIME.') - MOD(UNIX_TIMESTAMP('.\SYSTEM\SQL\system_todo::NAME_MYS.'.'.\SYSTEM\SQL\system_todo::FIELD_TIME.'),?)),"%Y/%m/%d %H:%i:%s") as day,'
    .'count(*) as count,'                                                                                
    .'sum(case when '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.'.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' IS NOT NULL then 1 else 0 end) assigned,'                                        
    .'sum(case when '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.'.'.\SYSTEM\SQL\system_todo_assign::FIELD_USER.' IS NULL then 1 else 0 end) not_assigned'
.' FROM '.\SYSTEM\SQL\system_todo::NAME_MYS
.' LEFT JOIN '.\SYSTEM\SQL\system_todo_assign::NAME_MYS.' ON '.\SYSTEM\SQL\system_todo::FIELD_ID.' = '.\SYSTEM\SQL\system_todo_assign::FIELD_TODO
.' GROUP BY day'
.' ORDER BY day DESC'
.' LIMIT 30;';
    }
}