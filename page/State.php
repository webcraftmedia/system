<?php
namespace SYSTEM\PAGE;

class State {
    public static function get($group){
        return \SYSTEM\LOG\JsonResult::toString(\SYSTEM\DBD\SYS_PAGESTATES_GROUP::QA(array($group)));}
}