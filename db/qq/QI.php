<?php
namespace SYSTEM\DB;
class QI {                       
    public static function QI($dbinfo = null){
        if(!$dbinfo){
            $dbinfo = \SYSTEM\system::getSystemDBInfo();}
        
        if($dbinfo instanceof \SYSTEM\DB\DBInfoPG){
            if(!\is_callable(static::get_class().'::files_pgsql')){
                    throw new \SYSTEM\LOG\ERROR(static::get_class().' failed: no files_pgsql implementation present.');}
            $files = static::files_pgsql();
            $command =  'psql'.
                        ' -U ' . $dbinfo->m_user.
                        ' -d ' . $dbinfo->m_database.
                        ' -a '.
                        ' -f ${file} 2>&1';
        } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoMYS){
            if(!\is_callable(static::get_class().'::files_mysql')){
                    throw new \SYSTEM\LOG\ERROR(static::get_class().' failed: no files_mysql implementation present.');}
            $files = static::files_mysql();
            $command =  'mysql'.
                        ' --host=' . $dbinfo->m_host.
                        ' --user=' . $dbinfo->m_user.
                        ' --password=' . $dbinfo->m_password.
                        ' --database=' . $dbinfo->m_database.
                        ' --default-character-set=utf8'.
                        ' --execute="SOURCE ${file}" 2>&1';
        } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoAMQP){
            $files = static::files_amqp();
        } else if ($dbinfo instanceof \SYSTEM\DB\DBInfoSQLite){
            $files = static::files_sqlite();
        } else {
            throw new \Exception(static::get_class().' Could not understand Database Settings. Check ur Database Settings');}
        
        
        $result = array();
        foreach($files as $file){
            $output = shell_exec(str_replace('${file}', $file, $command));
            $result[] = array($file,$output);}
        return $result;
    }
}