<?php

$matriz = array([1,2,3],
                [4,5,6],
                [7,8,9]);

$copia = &$matriz;

$copia[0][0]= 10;

echo $matriz[0][0];
echo "\n". $copia[0][0];
echo "\n". (count($copia, COUNT_RECURSIVE)-count($copia));
echo "\n r'";