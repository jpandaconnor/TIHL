<?php

# Sorting arrays

$array = ('jan' => 'Jan', 'feb' => 'Feb');

$csv_list = implode(',', $array); # Array to string with seperator
$array = explode(',' .$csv_list); # String to array



?>