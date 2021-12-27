<?php

    session_start();
    include_once "dbh-inc.php";
    include_once "functions-inc.php";

    $ProductID = $_POST['ProductID'];
    $ProductPrice = $_POST['ProductPrice'];
    $Stock = $_POST['ProductStock'];

    if ($ProductID === ""){
        header("location: ../admin.php?error=noproductid");
        exit(); 
    }
    if ($ProductID !== "" && $ProductPrice !== "" && $Stock !== ""){
        $sql = "UPDATE `Product` SET `Price`='$ProductPrice',`Amount_Available`='$Stock' WHERE `Product_ID` = $ProductID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=productchanged");
        exit(); 
    }
    else if ($ProductID !== "" && $ProductPrice === "" && $Stock !== ""){
        $sql = "UPDATE `Product` SET `Amount_Available`='$Stock' WHERE `Product_ID` = $ProductID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=productchanged");
        exit(); 
    }
    if ($ProductID !== "" && $ProductPrice !== "" && $Stock === ""){
        $sql = "UPDATE `Product` SET `Price`='$ProductPrice' WHERE `Product_ID` = $ProductID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=productchanged");
        exit(); 
    }

?>