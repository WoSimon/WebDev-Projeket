<!-- Definition von Funktionen die in verschiedennen PHP Seiten aufgerufen werden -->
<?php

    //Prüft ob eine angegebene Mail Adresse zu einem Eintrag in der DB gehört
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
    
    //Erstellt einen neuen User in der DB
    function createUser($conn, $name, $email, $pwd){
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `Customer`(`Name`, `Mail-Adress`, `Password`) VALUES ('$name','$email','$hashedPwd');";
        mysqli_query($conn, $sql);
        
        header("location: ../login.php?error=none");
        exit();
    }
    
    //Loggt einen User auf der Website ein
    function loginUser($conn, $email, $pwd){

        $emailExists = emailExists($conn, $email);
        
        //Wenn die Mail in der DB eingetragen ist
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
        
        //Wenn das PW nicht mit dem aus der DB übereinstimmt
        if ($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit(); 
        }
        //Wenn das PW mit dem aus der DB übereinstimmt
        elseif ($checkPwd === true) {
            session_start();
            $_SESSION["CustomerID"] = $customerID;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $customerName;
            header("location: ../start.php?login=successful");
            exit();
        }

    }

    //Prüft ob ein angegebenner Admin Nutzername existiert
    function userExists($conn, $user){
        $sql = "SELECT * FROM `Admin` WHERE `Username` = '".$user."';";
        $rs = mysqli_query($conn, $sql);
        
        if($rs -> num_rows > 0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    
    
    //Loggt einen Admin ein
    function loginAdmin($conn, $user, $pwd){
        $userExists = userExists($conn, $user);
        
        if ($userExists === false) {
            header("location: ../admin-login.php?error=usernotexist");
            exit();
        }
        
        $sql = "SELECT * FROM `Admin` WHERE `Username` = '" .$user. "';";
        $rs = mysqli_query($conn, $sql);
        while ($i = $rs -> fetch_assoc()){
            $AdminPwd = $i['Password'];
            $AdminID = $i['Admin_ID'];
            $name = $i['Username'];
        }
        
        if ($AdminPwd !== $pwd) {
            header("location: ../admin-login.php?error=wrongpassword");
            exit(); 
        }
        elseif ($AdminPwd === $pwd) {
            session_start();
            $_SESSION["AdminID"] = $AdminID;
            $_SESSION["user"] = $user;
            header("location: ../admin.php?login=successful");
            exit();
        }

    }

    //Prüft ob zwei eingegebenne Passwörter gleich sind
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