<?php
class Composed38SimpsonRule {
    private $a;
    private $b;
    private $h;
   
    public function __construct($a, $b, $intervals) {
        $this->a = $a;
        $this->b = $b;
        $this->h = round(($b-$a)/$intervals, 2);
    }
    function getLimits(){
        $limits = array();
        
        for($i = $this->a; $i < $this->b; $i+=$this->h){
            $tuple = array("a"=>$i, "b"=> $i+$this->h);
            array_push($limits, $tuple);
        }
        return $limits;
    }
    function getPoints($a, $b, $h){
        $points = array();
        for($i = $a; $i <= $b; $i+=$h){
            array_push($points, $i);
        }
        return $points;
    }
    public function execute($f){
        $limits = $this->getLimits();
        $result = 0;

        foreach($limits as $limit){
            $h = ($limit["b"] - $limit["a"])/3;
            
            $points = $this->getPoints($limit["a"], $limit["b"], $h);
            
            $y0 = $f($points[0]);
            $y1 = $f($points[1]);
            $y2 = $f($points[2]);
            $y3 = $f($points[3]);

            $result += 3*$h * ($y0 + 3*$y1 + 3*$y2 + $y3)/8;
        }
        return round($result, 2);
    }
} 