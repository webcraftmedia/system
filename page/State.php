<?php
namespace SYSTEM\PAGE;
class State {
    public static function get($group,$state,$returnasjson=true){
        //seperate state from vars
        $state_vars = \explode(';', $state);
        //parse substates
        $state_all = \explode('(', $state_vars[0]);
        $state_name = $state_all[0];
        $substate = substr($state_vars[0], strlen($state_name));
        $substate = self::parse_substate($substate);
        //vars
        $vars = array();
        for($i=1;$i<count($state_vars);$i++){
            $var = \explode('.',$state_vars[$i]);
            $vars[$var[0]] = $var[1];}
        $result = array();
        $res = \SYSTEM\SQL\SYS_PAGE_GROUP::QQ(array($group,$state_name));
        while($row = $res->next()){
            if(!self::is_loaded($row,$substate,$state_name,$row['parent_id'])){
                continue;}
            if( ($row['login'] == 1 && !\SYSTEM\SECURITY\Security::isLoggedIn()) ||
                ($row['login'] == 2 && \SYSTEM\SECURITY\Security::isLoggedIn())){
                continue;}
            $row['url'] = \SYSTEM\PAGE\replace::replace($row['url'], $vars);
            $row['url'] = \SYSTEM\PAGE\replace::clean($row['url']);
            //clean url of empty variables
            //$row['url'] = preg_replace('/&.*?=(&|$)/', '&', $row['url']);
            $row['url'] = preg_replace('/[^=&]+=(&|$)/', '&', $row['url']);
            $row['url'] = preg_replace('/&&$/', '', $row['url']);
            $row['css'] = $row['js'] = array();
            if(\class_exists($row['php_class']) && \method_exists($row['php_class'], 'css') && \is_callable($row['php_class'].'::css')){
                $row['css'] = array_merge($row['css'], \call_user_func($row['php_class'].'::css'));}
            if(\class_exists($row['php_class']) && \method_exists($row['php_class'], 'js') && \is_callable($row['php_class'].'::js')){
                $row['js'] = array_merge($row['js'], \call_user_func($row['php_class'].'::js'));}
            $row['php_class'] = '';
            
            $skip = false;
            for($i=0;$i<count($result);$i++){
                if($result[$i]['div'] == $row['div']){
                    $skip = true;
                    if($row['type'] == 1){
                        $result[$i] = $row;}
                    break;
                }
            }
            if(!$skip){
                $result[] = $row;}
        }
        return $returnasjson ? \SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    public static function parse_substate($substate){
        return (new ParensParser())->parse($substate);
    }
    private static function is_loaded($row,&$substate,$state_name,$parent_id = -1){
        for($i=0;$i<count($substate);$i++){
            if($row['name'] == $state_name){
                $substate[$i]['parent_id'] = $row['id'];}
            if($substate[$i]['name'] == $row['name']){
                $substate[$i]['parent_id'] = $parent_id;
                return true;
            }
            if(array_key_exists('parent_id', $substate[$i])){
                if(self::is_loaded($row,$substate[$i]['sub'],$substate[$i]['name'],$substate[$i]['parent_id'])){
                    return true;}
            }
        }
        return $row['type'] == 0 ? true : false;
    }
}

class ParensParser
{
    // something to keep track of parens nesting
    protected $stack = null;
    // current level
    protected $current = null;

    // input string to parse
    protected $string = null;
    // current character offset in string
    protected $position = null;
    // start of text-buffer
    protected $buffer_start = null;

    public function parse($string)
    {
        if (!$string) {
            // no string, no data
            return array();
        }

        if ($string[0] == '(') {
            // killer outer parens, as they're unnecessary
            $string = substr($string, 1, -1);
        }

        $this->current = array();
        $this->stack = array();

        $this->string = $string;
        $this->length = strlen($this->string);
        // look at each character
        for ($this->position=0; $this->position < $this->length; $this->position++) {
            switch ($this->string[$this->position]) {
                case '(':
                    $this->push();
                    // push current scope to the stack an begin a new scope
                    array_push($this->stack, $this->current);
                    $this->current = array();
                    break;

                case ')':
                    $this->push();
                    // save current scope
                    $t = $this->current;
                    // get the last scope from stack
                    $this->current = array_pop($this->stack);
                    // add just saved scope to current scope
                    $this->current[count($this->current)-1]['sub'] = $t;
                    break; 
                case '|':
                    // make each word its own token
                    $this->push();
                    break;
                default:
                    // remember the offset to do a string capture later
                    // could've also done $buffer .= $string[$position]
                    // but that would just be wasting resources…
                    if ($this->buffer_start === null) {
                        $this->buffer_start = $this->position;
                    }
            }
        }
        $this->push();
        return $this->current;
    }

    protected function push()
    {
        if ($this->buffer_start !== null) {
            // extract string from buffer start to current position
            $buffer = substr($this->string, $this->buffer_start, $this->position - $this->buffer_start);
            // clean buffer
            $this->buffer_start = null;
            // throw token into current scope
            $this->current[] = array('name' => $buffer);
        }
    }
}