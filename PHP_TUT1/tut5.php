<?php

# Just generally creating an array and what not

$months[] = "Jan";
$months[] = "Feb";
$months[] = "Mar";

$new_months = array('Jan', 'Feb', 'Mar');

# Array with a key (Just like a hashmap)

$h_months['jan'] = "Jan";
$h_months['feb'] = "Feb";
$h_months['mar'] = "Mar";

$hn_months = 
    array('jan' => 'Jan', 'feb' => 'Feb', 'mar' => 'Mar');

# For each

foreach($months as $value) {
    echo($value);
}

foreach($months as $key => $value) {
    echo("Key $key : Value $value");
}

?>