<?php

    include_once 'dbh-inc.php';

    session_start();

    if (isset($_SESSION["CustomerID"])) {

        $product_sql = "SELECT `Amount_Available` FROM `Product` WHERE `Product_ID` = 3;";
        $rs = mysqli_query($conn, $product_sql);
        
        $productAvailability = "";  
        $CustomerID = $_SESSION["CustomerID"];   
        $time = date('Y-m-d H:i:s');
        
        if($rs -> num_rows > 0){
            while ($i = $rs -> fetch_assoc()){
                $productAvailability = $i['Amount_Available'];
            }
        }
        
        if ($productAvailability <= 5) {
            header("location: ../start.php?error=lowstock3#products");
        }
        else{
            $newAmount = $productAvailability - 1;
            $update_sql = "UPDATE `Product` SET `Amount_Available`='" . $newAmount . "' WHERE `Product_ID` = 3;";
            mysqli_query($conn, $update_sql);
            $reservation_sql = "INSERT INTO `ProductReservation`(`ProductID`, `CustomerID`, `Time`) VALUES ('3','". $CustomerID ."','".  $time ."')";
            mysqli_query($conn, $reservation_sql);
            if (isset($_SESSION["ReserveP3"])){
                $_SESSION["ReserveP3"] = $_SESSION["ReserveP3"] + 1 ; 
            }
            else {
                $_SESSION["ReserveP3"] = 1;
            }
            header("location: ../start.php?reservavtion=success3#products");
        }

    }
    else{
        header("location: ../start.php?error=nologin3#products");
    }

?>