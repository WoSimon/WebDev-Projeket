<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdRepeat"];

        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';

        if (emailExists($conn, $email) == true){
            header("location: ../login.php?error=emailexists");
            exit();            
        }
        if (pwdDontMatch($pwd, $pwdRepeat) == true){
            header("location: ../login.php?error=pwdDontMatch");
            exit();            
        }

        createUser($conn, $name, $email, $pwd);

    }
    else{
        header("location: ../login.php");
        exit();
    }

?>