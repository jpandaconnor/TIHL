<html>
    <head>
        <title>Information Gathered</title>
    </head>

    <body>

    <?php // Code will not show if the user tries to view the source

        // Variable reference

        $ranNum = 5;

        $refToNum = &$ranNum;

        $ranNum = 100;

        echo '$refToNum = ' . $refToNum; // Prints 100 as it is a reference

        ?>

    </body>
</html>