<!-- Diese Datei soll die Funktionen des Admin-Login Forms handeln -->
<?php

    if (isset($_POST["submit"])) {
        
        $username = $_POST["user"];
        $pwd = $_POST["pwd"];
        
        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';
        
        //Aufruf der Funktion aus functions (s.o.)
        loginAdmin($conn, $username, $pwd);
        
    }
    //Wenn der Bestätigungsknopf nicht gedrückt wurde wird der Nutzer zurück auf die Login Seite gesendet nicht 
    else{
        header("location: ../admin-login.php");
        exit();
    }

?>