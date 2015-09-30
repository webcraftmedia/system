<?php

require_once 'system/autoload.inc.php';
require_once 'dbd/autoload.inc.php';
require_once 'dasense/autoload.inc.php';

//Debug
error_reporting(E_ALL);
ini_set('display_errors', TRUE); // evtl. hilfreich

$call = new SQL\dasensedata();
/*$call = array(  array(\SQL\PAGETable::FIELD_ID=>6,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>5,  \SQL\PAGETable::FIELD_PARENTVALUE=>'sensor',    \SQL\PAGETable::FIELD_NAME=>'sensorIDs',    \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>5,  \SQL\PAGETable::FIELD_FLAG=>0,  \SQL\PAGETable::FIELD_PARENTID=>-1, \SQL\PAGETable::FIELD_PARENTVALUE=>NULL,        \SQL\PAGETable::FIELD_NAME=>'action',       \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>0,  \SQL\PAGETable::FIELD_FLAG=>0,  \SQL\PAGETable::FIELD_PARENTID=>-1, \SQL\PAGETable::FIELD_PARENTVALUE=>NULL,        \SQL\PAGETable::FIELD_NAME=>'module',       \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>1,  \SQL\PAGETable::FIELD_FLAG=>0,  \SQL\PAGETable::FIELD_PARENTID=>0,  \SQL\PAGETable::FIELD_PARENTVALUE=>NULL,        \SQL\PAGETable::FIELD_NAME=>'action',       \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>2,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>1,  \SQL\PAGETable::FIELD_PARENTVALUE=>'sensor',    \SQL\PAGETable::FIELD_NAME=>'sensorIDs',    \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>3,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>1,  \SQL\PAGETable::FIELD_PARENTVALUE=>'login',     \SQL\PAGETable::FIELD_NAME=>'old_module',   \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>4,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>1,  \SQL\PAGETable::FIELD_PARENTVALUE=>'login',     \SQL\PAGETable::FIELD_NAME=>'old_action',   \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>7,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>1,  \SQL\PAGETable::FIELD_PARENTVALUE=>'geopoint',  \SQL\PAGETable::FIELD_NAME=>'coord',        \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>8,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>1,  \SQL\PAGETable::FIELD_PARENTVALUE=>'geopoint',  \SQL\PAGETable::FIELD_NAME=>'datatype',     \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>9,  \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>1,  \SQL\PAGETable::FIELD_PARENTVALUE=>'geopoint',  \SQL\PAGETable::FIELD_NAME=>'radius',       \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>10, \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>5,  \SQL\PAGETable::FIELD_PARENTVALUE=>'geopoint',  \SQL\PAGETable::FIELD_NAME=>'coord',        \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>11, \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>5,  \SQL\PAGETable::FIELD_PARENTVALUE=>'geopoint',  \SQL\PAGETable::FIELD_NAME=>'datatype',     \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'),
                array(\SQL\PAGETable::FIELD_ID=>12, \SQL\PAGETable::FIELD_FLAG=>1,  \SQL\PAGETable::FIELD_PARENTID=>5,  \SQL\PAGETable::FIELD_PARENTVALUE=>'geopoint',  \SQL\PAGETable::FIELD_NAME=>'radius',       \SQL\PAGETable::FIELD_ALLOWEDVALUES=>'ALL'));*/

$page = new \SYSTEM\PAGE\PageApi( $call, new SYSTEM\verifyclass(), new PageApi());

try{
    echo $page->CALL(array_merge($_POST,$_GET))->html();
} catch(Exception $e) {
    echo $e;
    $page = new default_page();
    echo $page->html();
}

?>