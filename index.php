<?php

include "vendor/autoload.php";
use App\IArray;

$array = new IArray(['hh', 'gg']);

echo json_encode($array->count());
