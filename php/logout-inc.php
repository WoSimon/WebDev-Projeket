<!-- Wenn man sich ausloggt (als Admin oder als Nutzer) wird die Session beendet-->
<?php

    session_start();
    session_unset();
    session_destroy();

    header("location: ../start.php");
    exit();

?>