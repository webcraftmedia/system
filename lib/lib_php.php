<?php
namespace LIB;
//dont use system paths? for php yes - for js css not possibledue webpath -> PLIB object?
//or mask all paths using api
abstract class lib_php extends lib{
    protected static function php_autoload(){} //autload magic? require_once lib\autoload.inc -> should do the trick -> do that in lib
}

