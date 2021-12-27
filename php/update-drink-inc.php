<?php

    session_start();
    include_once "dbh-inc.php";
    include_once "functions-inc.php";

    $DrinkID = $_POST['DrinkID'];
    $DrinkPrice = $_POST['DrinkPrice'];
    $Availability = $_POST['Availability'];

    if ($Availability !== ""){
        if ($Availability === "Available"){
            $Availability = 1;
        }
        else if ($Availability === "NotAvailable"){
            $Availability = 0;
        }
    }

    if ($DrinkID === ""){
        header("location: ../admin.php?error=nodrinkid");
        exit(); 
    }
    if ($DrinkID !== "" && $DrinkPrice !== "" && $Availability !== ""){
        $sql = "UPDATE `Drink` SET `Availability`='$Availability',`Price`='$DrinkPrice' WHERE `Drink_ID` = $DrinkID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=drinkchanged");
        exit(); 
    }
    else if ($DrinkID !== "" && $DrinkPrice === "" && $Availability !== ""){
        $sql = "UPDATE `Drink` SET `Availability`='$Availability' WHERE `Drink_ID` = $DrinkID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=drinkchanged");
        exit(); 
    }
    if ($DrinkID !== "" && $DrinkPrice !== "" && $Availability === ""){
        $sql = "UPDATE `Drink` SET `Price`='$DrinkPrice' WHERE `Drink_ID` = $DrinkID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=drinkchanged");
        exit(); 
    }

?>