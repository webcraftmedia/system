<?php
namespace SYSTEM\HTML;
class html{
    public static function link($href,$rel = 'stylesheet',$type = 'text/css'){
        return '<link href="'.$href.'" rel="'.$rel.'" type="'.$type.'"/>';}
    public static function script($src,$type = 'text/javascript',$rel = 'stylesheet', $language = 'JavaScript', $script = ''){
        return '<script src="'.$src.'" language="'.$language.'" type="'.$type.'">'.$script.'</script>';}
}
