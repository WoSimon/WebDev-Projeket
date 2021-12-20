<?php

    function emailExists($conn, $email){
        $sql = "SELECT * FROM `Customer` WHERE `Mail-Adress` = '$email';";
        $rs = mysqli_query($conn, $sql);

        if($rs -> num_rows > 0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function createUser($conn, $name, $email, $pwd){
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `Customer`(`Name`, `Mail-Adress`, `Password`) VALUES ('$name','$email','$hashedPwd');";
        mysqli_query($conn, $sql);
         
        header("location: ../login.php?error=none");
        exit();
    }
    
    function loginUser($conn, $email, $pwd){
        $emailExists = emailExists($conn, $email);
        
        if ($emailExists === false) {
            header("location: ../login.php?error=maildoesnotexist");
            exit();
        }
        
        $sql = "SELECT * FROM `Customer` WHERE `Mail-Adress` = '$email';";
        $rs = mysqli_query($conn, $sql);
        while ($i = $rs -> fetch_assoc()){
            $pwdHashed = $i['Password'];
            $customerID = $i['Customer_ID'];
            $customerName = $i['Name'];
        }
        
        $checkPwd = password_verify($pwd, $pwdHashed);
        
        if ($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit(); 
        }
        elseif ($checkPwd === true) {
            session_start();
            $_SESSION["CustomerID"] = $customerID;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $customerName;
            header("location: ../start.php?login=successful");
            exit();
        }

    }

    function pwdDontMatch($pwd, $pwdRepeat){
        if ($pwd !== $pwdRepeat){
            $result = true;
        }
        else{
            $result = false;
        }
        
        return $result;
         
    }

?>