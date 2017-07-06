<?php

# Sorting arrays

$array = ('jan' => 'Jan', 'feb' => 'Feb');

$csv_list = implode(',', $array); # Array to string with seperator
$array = explode(',' .$csv_list); # String to array

/*

There are a few sorting functions for arrays in PHP

sort() = Sorts by value and discards the original key
asort() = Sorts by value and keeps the original key
ksort() = Sorts by the key

*/

$car_array = array('Ford', 'Peugot', 'Nissan');
sort($car_array);

/*

There is also options to sort an array by alphanumeric order 1-9,a-z

rsort()
arsort()
krsort()

Use rsort() when the key doesn't matter

*/




?>