<!-- Diese Datei wird ausgeführt, wenn ein neuer Nutzer sich registirieren möchte -->
<?php

    //Hat der Registrieren gedrückt?
    if (isset($_POST["submit"])) {
        
        //Eingegebennen Werte in Variablen speichern
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdRepeat"];
        
        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';
        
        //Wenn die Mail nocht existiert: Abbrechen
        if (emailExists($conn, $email) == true){
            header("location: ../login.php?error=emailexists");
            exit();            
        }
        //Wenn die Passwörter nicht übereinstimmen: Abbrechen
        if (pwdDontMatch($pwd, $pwdRepeat) == true){
            header("location: ../login.php?error=pwdDontMatch");
            exit();            
        }
        
        //Sonst nutzer Erstellen
        createUser($conn, $name, $email, $pwd);
        
    }
    //Sonst zurück zur Login Seite
    else{
        header("location: ../login.php");
        exit();
    }

?>