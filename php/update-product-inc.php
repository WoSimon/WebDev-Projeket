<!-- Diese Datei wird ausgeführt, wenn ein Admin die DB Bestände der Produkte ändern möchte -->
<?php

    session_start();
    include_once "dbh-inc.php";
    include_once "functions-inc.php";

    //Zuweisen der eingegebenen Werte
    $ProductID = $_POST['ProductID'];
    $ProductPrice = $_POST['ProductPrice'];
    $Stock = $_POST['ProductStock'];

    //Fehler wenn keine ProduktID eingegeben wurde
    if ($ProductID === ""){
        header("location: ../admin.php?error=noproductid");
        exit(); 
    }
    //Wenn alle Drei Felder befüllt wurden, wird Preis und Bestand geändert
    if ($ProductID !== "" && $ProductPrice !== "" && $Stock !== ""){
        $sql = "UPDATE `Product` SET `Price`='$ProductPrice',`Amount_Available`='$Stock' WHERE `Product_ID` = $ProductID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=productchanged");
        exit(); 
    }
    
    //Wenn nur der Bestand und die ID eingegeben wurde wurden, wird nur der Bestand geändert
    else if ($ProductID !== "" && $ProductPrice === "" && $Stock !== ""){
        $sql = "UPDATE `Product` SET `Amount_Available`='$Stock' WHERE `Product_ID` = $ProductID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=productchanged");
        exit(); 
    }

    //Wenn nur der Preis und die ID eingegeben wurde wurden, wird nur der Preis geändert
    if ($ProductID !== "" && $ProductPrice !== "" && $Stock === ""){
        $sql = "UPDATE `Product` SET `Price`='$ProductPrice' WHERE `Product_ID` = $ProductID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=productchanged");
        exit(); 
    }

?>