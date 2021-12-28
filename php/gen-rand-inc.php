<!-- Diese Datei soll drei Zufällig ausgewählte Kommentare aus der DB auswählen -->
<?php

    include_once 'dbh-inc.php';

    //SQL Statement um zu gucken wie viele reihen existieren
    $sql_rows = "SELECT * FROM `Message`";
    $rows = $conn -> query($sql_rows);

    //Generiert zufalls zahl (comment_id) und holt den passenden Kommentar aus der DB
    $comment_one_id = random_int(1, $rows -> num_rows);
    $comment_two_id = random_int(1, $rows -> num_rows);
    $comment_three_id = random_int(1, $rows -> num_rows);
    while ($comment_two_id == $comment_three_id OR $comment_two_id == $comment_one_id) {
        $comment_two_id = random_int(1, $rows -> num_rows);
    }
    while ($comment_three_id == $comment_two_id OR $comment_three_id == $comment_one_id) {
        $comment_three_id = random_int(1, $rows -> num_rows);
    }

?>