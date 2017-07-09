<html>
    <head>
        <title>Information Gathered</title>
    </head>

    <body>

    <?php // Code will not show if the user tries to view the source

            // Good 'ol' arrays

            $friends = array('A', 'B');
            echo $friends[0]; // Prints out index in the array

            $friends[4] = 'Steve'; // Non-exsiting index


            foreach($friends as $friend) {
                echo $friend . ', ';
            }

            // Key value pairs

            $people = array('Name' => 'Test', 'Name2' => 'Test2');
                
            foreach($customer as $key => $value) {
                echo $key . ' : ' . $value;
            }

            $testarray = array('1', '2');
            $testarray2 = array('Test', 'Test2');

            $testarray = $testarray + $testarray2;

            // Can be done with == and === as well to compare arrays

        ?>

    </body>
</html>