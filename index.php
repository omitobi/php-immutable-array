<?php

include "vendor/autoload.php";
use App\IArray;

$array = new IArray(['hh', 'gg']);
$array = $array->getOutItems();
echo json_encode($array);
//echo json_encode();
