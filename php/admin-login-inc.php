<?php

    if (isset($_POST["submit"])) {
        
        $username = $_POST["user"];
        $pwd = $_POST["pwd"];

        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';

        loginAdmin($conn, $username, $pwd);

    }
    else{
        header("location: ../admin-login.php");
        exit();
    }

?>