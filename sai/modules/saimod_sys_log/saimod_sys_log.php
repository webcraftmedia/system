<?php
namespace SYSTEM\SAI;

class saimod_sys_log extends \SYSTEM\SAI\SaiModule {    
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_truncate(){        
        \SYSTEM\DBD\SYS_SAIMOD_LOG_TRUNCATE::QQ();
        return \SYSTEM\LOG\JsonResult::ok();}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats(){
        $vars = array();
        $vars['dbfile_entries'] = '';
        $scanned_directory = array_diff(scandir(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH)), array('..', '.'));
        foreach($scanned_directory as $file){
            $vars['dbfile_entries'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log_stats_menu.tpl'), array('file' => $file));}
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log_stats.tpl'), $vars);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_class_system($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_CLASS_SYSTEM::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('class_system',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\COUNTER" then 1 else 0 end) class_SYSTEM_LOG_COUNTER,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\INFO" then 1 else 0 end) class_SYSTEM_LOG_INFO,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\DEPRECATED" then 1 else 0 end) class_SYSTEM_LOG_DEPRECATED,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\WARNING" then 1 else 0 end) class_SYSTEM_LOG_WARNING,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\ERROR" then 1 else 0 end) class_SYSTEM_LOG_ERROR,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\ERROR_EXCEPTION" then 1 else 0 end) class_SYSTEM_LOG_ERROR_EXCEPTION,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\SHUTDOWN_EXCEPTION" then 1 else 0 end) class_SYSTEM_LOG_SHUTDOWN_EXCEPTION'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);    
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_class_other($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_CLASS_OTHER::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('class_other',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'                                                                                
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'Exception\' then 1 else 0 end) class_Exception,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'RuntimeException\' then 1 else 0 end) class_RuntimeException,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'ErrorException\' then 1 else 0 end) class_ErrorException'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_class_basic($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_CLASS_BASIC::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('class_basic',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'                                                                                
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'ERROR\' then 1 else 0 end) class_ERROR,'                                        
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'WARNING\' then 1 else 0 end) class_WARNING,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'INFO\' then 1 else 0 end) class_INFO,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'DEPRECATED\' then 1 else 0 end) class_DEPRECATED,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = \'AppError\' then 1 else 0 end) class_AppError'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_unique_basic($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_UNIQUE_BASIC::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('unique_basic',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'
                                    .'count(distinct "'.\SYSTEM\DBD\system_log::FIELD_USER.'") as user_unique,'                                        
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_IP.') as ip_unique,'                                                                     
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_SERVER_NAME.') as server_name_unique'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_unique_request($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_UNIQUE_REQUEST::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('unique_request',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'                                        
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_SERVER_NAME.') as server_name_unique,'
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_SERVER_PORT.') as server_port_unique,'
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_REQUEST_URI.') as request_uri_unique,'
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_POST.') as post_unique'                                        
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_unique_exception($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_UNIQUE_EXCEPTION::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('unique_exception',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'                                        
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_FILE.') as file_unique,'
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_LINE.') as line_unique,'                                        
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_CLASS.') as class_unique'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_unique_referer($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_UNIQUE_REFERER::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('unique_referer',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'
                                    .'count(distinct "'.\SYSTEM\DBD\system_log::FIELD_USER.'") as user_unique,'
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_IP.') as ip_unique,'                                        
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_HTTP_REFERER.') as http_referer_unique,'
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_HTTP_USER_AGENT.') as http_user_agent_unique'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_basic_visitor($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_BASIC_VISITOR::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('basic_visitor',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'
                                    .'count(distinct "'.\SYSTEM\DBD\system_log::FIELD_USER.'") as user_unique,'                                        
                                    .'count(distinct '.\SYSTEM\DBD\system_log::FIELD_IP.') as ip_unique'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_basic_sucess($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_BASIC_SUCCESS::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('basic_sucess',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'                                                                                
                                    .'sum(case when not '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\COUNTER" and'
                                    .' not '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\INFO" and'
                                    .' not '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "INFO" and'
                                    .' not '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\DEPRECATED" and'
                                    .' not '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "DEPRECATED" and '
                                    .' not '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "PreprocessingLog" '
                                    .'then 1 else 0 end) class_fail,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\INFO" or '
                                    .\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\INFO" or '
                                    .\SYSTEM\DBD\system_log::FIELD_CLASS.' = "INFO" or '
                                    .\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\DEPRECATE" or '
                                    .\SYSTEM\DBD\system_log::FIELD_CLASS.' = "DEPRECATED" or '
                                    .\SYSTEM\DBD\system_log::FIELD_CLASS.' = "PreprocessingLog" '
                                    .'then 1 else 0 end) class_log,'
                                    .'sum(case when '.\SYSTEM\DBD\system_log::FIELD_CLASS.' = "SYSTEM\\LOG\\COUNTER" then 1 else 0 end) class_sucess'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_stats_name_basic_querytime($filter,$db){
        $result = array();
        if(!$db){
            $result = \SYSTEM\DBD\SYS_SAIMOD_LOG_BASIC_QUERYTIME::QA(array($filter));
        } else {
            $con = new \SYSTEM\DB\Connection(new \SYSTEM\DB\DBInfoSQLite(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CRON_LOG2SQLITE_PATH).$db));
            $res = $con->prepare('basic_querytime',
                                'SELECT datetime(strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.') - strftime("%s",'.\SYSTEM\DBD\system_log::FIELD_TIME.')%:filter,"unixepoch", "localtime")  as day,'
                                    .'count(*) as count,'                                                                                
                                    .'avg('.\SYSTEM\DBD\system_log::FIELD_QUERYTIME.') as querytime_avg,'
                                    .'max('.\SYSTEM\DBD\system_log::FIELD_QUERYTIME.') as querytime_max,'
                                    .'min('.\SYSTEM\DBD\system_log::FIELD_QUERYTIME.') as querytime_min'
                                .' FROM '.\SYSTEM\DBD\system_log::NAME_MYS
                                .' GROUP BY day'
                                .' ORDER BY day DESC'
                                .' LIMIT 30;',
                                array(':filter' => $filter));
            while($row = $res->next()){
                $result[] = $row;}
        }
        return \SYSTEM\LOG\JsonResult::toString($result);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_error($error){
        $vars = \SYSTEM\DBD\SYS_SAIMOD_LOG_ERROR::QQ(array($error))->next();        
        $vars['trace'] = implode('</br>', array_slice(explode('#', $vars['trace']), 1, -1));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log_error.tpl'), $vars);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_filter($filter = "%"){
        $count = \SYSTEM\DBD\SYS_SAIMOD_LOG_FILTER_COUNT::Q1(array($filter));
        $res = \SYSTEM\DBD\SYS_SAIMOD_LOG_FILTER::QQ(array($filter));
        $table='';
        while($r = $res->next()){     
            //print_r($r);
            $r['class_row'] = self::tablerow_class($r['class']);
            $r['time'] = self::time_elapsed_string(strtotime($r['time']));
            $r['message'] = substr($r['message'],0,255);
            $table .=  \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log_table_row.tpl'),$r);                                         
        }
        $vars = array();
        $vars['count'] = $count['count'];
        $vars['table'] = $table;
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log_table.tpl'), $vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_action_log(){
        $vars = array();
        $vars['table'] = self::sai_mod__SYSTEM_SAI_saimod_sys_log_action_filter();        
        $vars['error_filter'] = self::generate_error_filters();
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log_filter.tpl'), $vars);
    }
    
    private static function time_elapsed_string($ptime){
        $etime = time() - $ptime;
        if ($etime < 1){
            return '0 seconds';}

        $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second');

        foreach ($a as $secs => $str){
            $d = $etime / $secs;
            if ($d >= 1){
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';}
        }
    }
    
    private static function generate_error_filters(){
        $res = \SYSTEM\DBD\SYS_SAIMOD_LOG_FILTERS::QQ();        
        $result = '';        
        while($row = $res->next()){
            $result .= '<li><a href="#" filter="'.$row['class'].'">'.$row['class'].'</a></li>';}
        return $result;
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log(){
        $vars = array();        
        $vars['PICPATH'] = \SYSTEM\WEBPATH(new \SYSTEM\PSAI(), 'modules/saimod_sys_log/img/');
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/tpl/saimod_sys_log.tpl'), $vars);        
    }
    
    public static function tablerow_class($class){
        switch($class){
            case 'SYSTEM\LOG\INFO': case 'INFO': case 'SYSTEM\LOG\COUNTER':
                return 'success';
            case 'SYSTEM\LOG\DEPRECATED': case 'DEPRECATED':
                return 'info';
            case 'SYSTEM\LOG\ERROR': case 'ERROR': case 'Exception': case 'SYSTEM\LOG\ERROR_EXCEPTION':
            case 'ErrorException': case 'SYSTEM\LOG\SHUTDOWN_EXCEPTION':
                return 'error';
            case 'SYSTEM\LOG\WARNING': case 'WARNING':
                return 'warning';
            default:
                return '';
        }        
    }
    
    public static function html_li_menu(){return '<li><a href="#" saimenu=".SYSTEM.SAI.saimod_sys_log">Log</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_flag_css(){}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_log_flag_js(){
        return \SYSTEM\LOG\JsonResult::toString(
            array(\SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_log/js/saimod_sys_log.js')));}
}