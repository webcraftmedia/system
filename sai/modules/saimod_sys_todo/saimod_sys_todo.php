<?php
namespace SYSTEM\SAI;

class saimod_sys_todo extends \SYSTEM\SAI\SaiModule {
    private static $stats = array(); //only strings!
    
    private static function check_stats($stats){
        if( !\class_exists($stats) ||
            !\is_array($parents = \class_parents($stats)) ||
            !\array_search('SYSTEM\SAI\todo_stats', $parents)){
            return false;}
        return true;}
    
    public static function register($stats){
        if(!self::check_stats($stats)){
            throw new \SYSTEM\LOG\ERROR('Problem with your TodoStats class: '.$stats);}
        array_push(self::$stats,$stats);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_assign($todo){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_ASSIGN::QI(array($todo,\SYSTEM\SECURITY\Security::getUser()->id));
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_deassign($todo){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_DEASSIGN::QI(array($todo,\SYSTEM\SECURITY\Security::getUser()->id));
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_close($todo){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_CLOSE::QI(array($todo));
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_open($todo){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_OPEN::QI(array($todo));
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_add($todo){
        self::exception(new \Exception($todo), false, \SYSTEM\DBD\system_todo::FIELD_TYPE_USER);
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_priority_up($todo){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_PRIORITY::QI(array(+1,$todo));
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_priority_down($todo){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_PRIORITY::QI(array(-1,$todo));
        return \SYSTEM\LOG\JsonResult::ok();}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_TODO);
        $vars['PICPATH'] = \SYSTEM\WEBPATH(new \SYSTEM\PSAI(), 'modules/saimod_sys_log/img/');
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/saimod_sys_todo.tpl'), $vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_new(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_TODO);
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/saimod_sys_todo_new.tpl'), $vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_todolist($filter='all',$search='%',$page=0){
        return self::generate_list(\SYSTEM\DBD\system_todo::FIELD_STATE_OPEN,$filter,$search,$page);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_dotolist($filter='all',$search='%',$page=0){
        return self::generate_list(\SYSTEM\DBD\system_todo::FIELD_STATE_CLOSED,$filter,$search,$page);}
    
    private static function generate_list($state,$filter,$search,$page){
        $vars = array();
        $vars['filter'] = $filter;
        $vars['search'] = $search;
        $vars['page'] = $page;
        $search = $search;
        $vars['todo_list_elements'] = $vars['filter_mine'] =
            $vars['filter_free'] = $vars['filter_others'] = $vars['filter_gen'] =
            $vars['filter_user'] = $vars['filter_report'] = '';
        $userid = \SYSTEM\SECURITY\Security::getUser()->id;
        switch($filter){
            case 'mine':
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT_MINE::Q1(array($state,$userid,$search,$search,$search))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST_MINE::QQ(array($state,$userid,$search,$search,$search));
                $vars['filter_mine'] = 'active';
                break;
            case 'free':
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT_FREE::Q1(array($state,$search,$search,$search))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST_FREE::QQ(array($state,$search,$search,$search));
                $vars['filter_free'] = 'active';
                break;
            case 'others':
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT_OTHERS::Q1(array($state,$userid,$search,$search,$search))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST_OTHERS::QQ(array($state,$userid,$search,$search,$search));
                $vars['filter_others'] = 'active';
                break;
            case 'gen':
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT_TYPE::Q1(array($state,\SYSTEM\DBD\system_todo::FIELD_TYPE_EXCEPTION,$search,$search,$search))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST_TYPE::QQ(array($state,\SYSTEM\DBD\system_todo::FIELD_TYPE_EXCEPTION,$search,$search,$search,$userid));
                $vars['filter_gen'] = 'active';
                break;
            case 'user':
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT_TYPE::Q1(array($state,\SYSTEM\DBD\system_todo::FIELD_TYPE_USER,$search,$search,$search))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST_TYPE::QQ(array($state,\SYSTEM\DBD\system_todo::FIELD_TYPE_USER,$search,$search,$search,$userid));
                $vars['filter_user'] = 'active';
                break;
            case 'report':
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT_TYPE::Q1(array($state,\SYSTEM\DBD\system_todo::FIELD_TYPE_REPORT,$search,$search,$search))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST_TYPE::QQ(array($state,\SYSTEM\DBD\system_todo::FIELD_TYPE_REPORT,$search,$search,$search,$userid));
                $vars['filter_report'] = 'active';
                break;
            default:
                $count = \SYSTEM\DBD\SYS_SAIMOD_TODO_COUNT::Q1(array($state))['count'];
                $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_LIST::QQ(array($state,$search,$search,$search,$userid));
                $vars['filter_all'] = 'active';
                break;
        }
        $count_filtered = 0;
        $res->seek(100*$page);
        while(($row = $res->next()) && ($count_filtered < 100)){
            $row['class_row'] = self::trclass($row['type'],$row['class'],$row['assignee_id'],$userid);
            $row['time_elapsed'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
            $row['state_string'] = self::state($row['count']);
            $row['state_btn'] = self::statebtn($row['count']);
            $row['message'] = $row['message'];
            $row['request_uri'] = htmlspecialchars($row['request_uri']);
            $row['openclose'] = $state == \SYSTEM\DBD\system_todo::FIELD_STATE_OPEN ? 'close' : 'open';
            $row['message'] = str_replace("\n", '<br/>', $row['message']);
            $vars['todo_list_elements'] .=  \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/todo_user_list_element.tpl'), $row);
            $count_filtered++;
        }
        $vars['pagination'] = '';
        $vars['page_last'] = ceil($count/100)-1;
        for($i=0;$i < ceil($count/100);$i++){
            $data = array('page' => $i,'search' => $search, 'filter' => $filter, 'active' => ($i == $page) ? 'active' : '');
            $vars['pagination'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/todo_list_pagination.tpl'), $data);
        }
        $vars['count'] = $count_filtered.'/'.$count;
        $vars['state'] = $state == \SYSTEM\DBD\system_todo::FIELD_STATE_OPEN ? 'todo' : 'todo(doto)';
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_TODO));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/todo_list.tpl'), $vars);
    }
    
    public static function statistics(){
        $result = array();
        $result['project'] = 0;
        $result['project_closed'] = 0;
        $result['project_open'] = 0;
        $result['project_all'] = 0;
        $result['data'] = array();
        foreach(self::$stats as $stat){
            $data = \call_user_func(array($stat, 'stats'));
            $result['data'][] = $data;
            $result['project'] += $data->perc;
            $result['project_open'] += $data->open;
            $result['project_closed'] += $data->closed;
            $result['project_all'] += $data->all;
        }
        $result['project'] = round($result['project'] / (count($result['data'])),2);
        return $result;
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_stats(){
        $vars = self::statistics();
        $vars = array_merge($vars,\SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_TODO));
        $vars['entries'] = '';
        foreach($vars['data'] as $stat){
            $vars['entries'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/todo_stats_entry.tpl'), $stat);
        }
        $vars['userstats'] = '';
        $userstats = \SYSTEM\DBD\SYS_SAIMOD_TODO_STATS_USERS::QQ();
        while($stat = $userstats->next()){
            $stat['perc'] = round($stat['state_closed'] / ($stat['state_open']+$stat['state_closed']),2)*100;
            $vars['userstats'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/todo_stats_users_entry.tpl'), $stat);
        }
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/todo_stats.tpl'), $vars);        
    }
    
    private static function state($state){
        if($state == 1){
            return 'Closed';}
        return 'Open';}
    
    private static function statebtn($state){
        if($state == 1){
            return '<input type="submit" class="btn-danger" value="reopen">';}
        return '<input type="submit" class="btn-danger" value="close">';}
    
    private static function trclass($type,$class,$assignee,$userid){
        if($type == \SYSTEM\DBD\system_todo::FIELD_TYPE_USER){
            if($assignee == $userid){ return 'success';}
            if($assignee){ return 'danger';}
            return 'warning';
        }
        switch($class){
            case 'SYSTEM\LOG\INFO': case 'INFO': case 'SYSTEM\LOG\COUNTER':
                return 'success';
            case 'SYSTEM\LOG\DEPRECATED': case 'DEPRECATED':
                return 'info';
            case 'SYSTEM\LOG\ERROR': case 'ERROR': case 'Exception': case 'SYSTEM\LOG\ERROR_EXCEPTION':
            case 'ErrorException': case 'SYSTEM\LOG\SHUTDOWN_EXCEPTION':
                return 'danger';
            case 'SYSTEM\LOG\WARNING': case 'WARNING':
                return 'warning';
            default:
                return '';
        }
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_close_all(){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_CLOSE_ALL::QI();
        return \SYSTEM\LOG\JsonResult::ok();}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_edit($todo, $message){
        \SYSTEM\DBD\SYS_SAIMOD_TODO_EDIT::QI(array($message,$message,$todo));
        return \SYSTEM\LOG\JsonResult::ok();}
        
    public static function sai_mod__SYSTEM_SAI_saimod_sys_todo_action_todo($todo){
        $userid = \SYSTEM\SECURITY\Security::getUser()->id;
        $vars = \SYSTEM\DBD\SYS_SAIMOD_TODO_TODO::Q1(array($todo,$userid));
        $vars['trace'] = implode('</br>', array_slice(explode('#', $vars['trace']), 1, -1));
        $vars['display_assign'] = $vars['assignee_id'] != $userid ? '' : 'display: none;';
        $vars['display_deassign'] = $vars['assignee_id'] == $userid ? '' : 'display: none;';
        $vars['assignees'] = '';
        $res = \SYSTEM\DBD\SYS_SAIMOD_TODO_ASSIGNEES::QQ(array($todo,$userid));
        while($row = $res->next()){
            $vars['assignees'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/saimod_sys_todo_todo_user_assignee.tpl'), $row);
        }
        $vars = array_merge($vars,\SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_TODO));
        return $vars[\SYSTEM\DBD\system_todo::FIELD_TYPE] == \SYSTEM\DBD\system_todo::FIELD_TYPE_USER ?
               \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/saimod_sys_todo_todo_user.tpl'), $vars) :
               \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/tpl/saimod_sys_todo_todo.tpl'), $vars);}
    
    public static function html_li_menu(){return '<li><a id="menu_todo" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_todo}" href="#!todo"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    //public static function css(){}
    public static function js(){
        return array(\SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_todo/js/saimod_sys_todo.js'));}
    
    public static function report($message,$data){
        $_POST = $data; //save data in post
        self::exception(new \Exception($message), false, \SYSTEM\DBD\system_todo::FIELD_TYPE_REPORT);
        return \SYSTEM\LOG\JsonResult::ok();}
        
    public static function exception(\Exception $E, $thrown, $type = \SYSTEM\DBD\system_todo::FIELD_TYPE_EXCEPTION){
        try{
            if(\property_exists(get_class($E), 'todo_logged') && $E->todo_logged){                
                return false;} //alrdy logged(this prevents proper thrown value for every system exception)
            
            \SYSTEM\DBD\SYS_SAIMOD_TODO_EXCEPTION_INSERT::Q1(   array(  get_class($E), $E->getMessage(), $E->getCode(), $E->getFile(), $E->getLine(), $E->getTraceAsString(),
                                                                        getenv('REMOTE_ADDR'),round(microtime(true) - \SYSTEM\time::getStartTime(),5),date('Y-m-d H:i:s', microtime(true)),
                                                                        $_SERVER["SERVER_NAME"],$_SERVER["SERVER_PORT"],$_SERVER['REQUEST_URI'], serialize($_POST),
                                                                        array_key_exists('HTTP_REFERER', $_SERVER) ? $_SERVER['HTTP_REFERER'] : null,
                                                                        array_key_exists('HTTP_USER_AGENT',$_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : null,
                                                                        ($user = \SYSTEM\SECURITY\Security::getUser()) ? $user->id : null,$thrown,$E->getMessage(),$type));
            if(\property_exists(get_class($E), 'logged')){
                $E->todo_logged = true;} //we just did log
        } catch (\Exception $E){return false;} //Error -> Ignore
        return false; //We just log and do not handle the error!
    }
}