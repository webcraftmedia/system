<?php
namespace SYSTEM\SAI;
class todo_stats_data {
    var $name = '';
    var $open = 0;
    var $closed = 0;
    var $all = 1;
    var $perc = 0;
    public function __construct($name='',$closed=0,$all=1) {
        $this->name = $name;
        $this->open = $all-$closed;
        $this->closed = $closed;
        $this->all = $all;
        $this->perc =  round($this->closed / $this->all * 100,2);
    }
}
