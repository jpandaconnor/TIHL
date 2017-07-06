<?php

// DISCLAIMER I KNOW THIS ISN'T RIGHT BUT CBA RUINING THE NUMBER ORDER

echo '
    <form action="tut17.php" method="POST">
        <dl>
            <dt>Name:
                <dd><input type="text" name="name">
            <dt>Email:
                <dd><input type="mail" name="mail">
            <dt>Comments:
                <dd><textarea rows="5" cols="20" name="comments"></textarea>
        </dl>

        <p><input type="submit"></p>
    </form>
'

$name = $_POST['name'];
$mail = $_POST['mail'];
$comment = $_POST['comment'];

echo "<p>Thank you for the commnet $name </p>";
echo "<p><i>$comment</i></p>";
echo "<p>We will reply to $mail</p>";

// POST or GET

?>