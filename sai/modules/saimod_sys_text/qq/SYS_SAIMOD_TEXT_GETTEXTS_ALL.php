<?php
namespace SYSTEM\DBD;

class SYS_SAIMOD_TEXT_GETTEXTS_ALL extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
            //pg            
            '',
            //mys
            'SELECT system_text_tag.tag, system_text.*, a.username as author_name, ae.username as author_edit_name
                FROM system_text_tag 
                LEFT JOIN system_text ON system_text_tag.id = system_text.id
                LEFT JOIN system_user as a ON system_text.author = a.id
                LEFT JOIN system_user as ae ON system_text.author_edit = ae.id
                GROUP BY id;'
);}}
