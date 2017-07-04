<?

# Using require in this tutorial

require('tut1.php');

if(mysqli_ping($dbc)) {
    echo 'MySQL Server' . mysqli_get_server_info($dbc) . 'on ' . mysqli_get_host_info($dbc);
}

?>