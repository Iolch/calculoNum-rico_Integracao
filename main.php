<?php
include 'composedTrapezoidalRule.php';
include 'composed13SimpsonRule.php';
include 'composed38SimpsonRule.php';

define("A", -5);
define("B", 5);

$f = function($x){
    return $x * sin($x);
};

$trapezoidal = new ComposedTrapezoidalRule(A,B,6);
$simpson13 = new Composed13SimpsonRule(A,B,3);
$simpson38 = new Composed38SimpsonRule(A,B,2);

echo "Trapezoidal: <br />";
echo $trapezoidal->execute($f);
echo "<br />";
echo "Simpson 1/3: <br />";
echo $simpson13->execute($f);
echo "<br />";
echo "Simpson 3/8: <br />";
echo $simpson38->execute($f);
echo "<br />";
