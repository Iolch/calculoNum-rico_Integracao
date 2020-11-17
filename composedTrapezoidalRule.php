<?php
class ComposedTrapezoidalRule {
    private $a;
    private $b;
    private $h;
   
    public function __construct($a, $b, $intervals) {
        $this->a = $a;
        $this->b = $b;
        $this->h = round(($b-$a)/$intervals, 2);
    }
    private function getLimits(){
        $limits = array();
        
        for($i = $this->a; $i < $this->b; $i+=$this->h){
            $tuple = array("a"=>$i, "b"=> $i+$this->h);
            array_push($limits, $tuple);
        }
        return $limits;
    }
    public function execute($f){
        $limits = $this->getLimits();
        $result = 0;
        foreach($limits as $limit){
            $result += $this->h * ($f($limit["a"]) + $f($limit["b"]))/2;
        }
        return round($result, 2);
    }
} 