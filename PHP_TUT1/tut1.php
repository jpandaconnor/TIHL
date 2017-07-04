<?php

$dbc = mysqli_connect('localhost', 'connor', 'somepasswordhere', 'database') OR
    die(mysqli_connect_error());

mysqli_set_charset($dbc, 'uft8');

?>