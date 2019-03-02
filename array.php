<?php
/*
Функция сравнивает поочереди элементы двух массивов и присваивает очко в каждой итерации тому чей элемент в сравнении был выше
*/
$a = array(2, 4, 44);
$b = array(3, 4, 333);
$c = array();
function my_func($a, $b)
{
    $d = 0;
    $e = 0;
    for ($i = 0; $i < count($a); $i++) {
        if ($a[$i] > $b[$i]) {
            echo "Одно очко B<br />";
            $d +=1;
            $c[0] = $d;
        }
        if ($a[$i] < $b[$i]) {
            $e +=1;
            $c[1] = $e;
        }
        else {
            $c[0] =$d;
            $c[1] =$e;
        }
    }
    $f =  $c[0];
    $e =  $c[1];
    echo $f . $e;
    $h = array($f, $e);
    return($h);
    printf_r();
}
my_func($a, $b);

echo "<br />";
