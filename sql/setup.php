<?php
namespace SYSTEM\SQL;
class setup {
    private static $qis = array(); //only strings!
    private static function check_qi($qi){
        if( !\class_exists($qi) ||
            !\is_array($parents = \class_parents($qi)) ||
            !\array_search('SYSTEM\DB\QI', $parents)){
            return false;}
        return true;}        
    public static function register($qi){
        if(!self::check_qi($qi)){
            throw new \SYSTEM\LOG\ERROR('Problem with your QI class: '.$qi.'; it might not be available or inherits from the wrong class!');}
        array_push(self::$qis,$qi);}
    public static function check(){}
    public static function delete(){}
    public static function backup(){}
    public static function install(){
        $result = array();
        foreach(self::$qis as $qi){
            $result[] = array($qi,\call_user_func(array($qi, 'QI')));}
        return \SYSTEM\LOG\JsonResult::toString($result);
    }
}
