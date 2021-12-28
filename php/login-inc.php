<!-- Die Datei wird ausgeführt, wenn ein Nutzer sich einloggen möchte -->
<?php

    //Hat er Einloggen gedrückt?
    if (isset($_POST["submit"])) {
        
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        
        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';
        
        //Aufruf der Login Funktion
        loginUser($conn, $email, $pwd);

    }
    //Wenn nicht wird er zurück geleitet
    else{
        header("location: ../login.php");
        exit();
    }

?>