<!-- Stellt die Datenbankverbindung her -->
<?php

    $servername = "localhost";
    $user = "root";
    $pw = "";
    $db = "Projekt-Coffee";

    $conn = mysqli_connect($servername, $user, $pw, $db);

?>