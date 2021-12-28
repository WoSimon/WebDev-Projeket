<!-- Diese Datei wird ausgeführt, wenn ein Admin die DB Bestände der Getränke ändern möchte -->
<?php

    session_start();
    include_once "dbh-inc.php";
    include_once "functions-inc.php";

    //Zuweisen der eingegebenen Werte
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

    //Fehler wenn keine DrinkID eingegeben wurde
    if ($DrinkID === ""){
        header("location: ../admin.php?error=nodrinkid");
        exit(); 
    }
    //Wenn alle Drei Felder befüllt wurden, wird Preis und Verfügbarkeit geändert
    if ($DrinkID !== "" && $DrinkPrice !== "" && $Availability !== ""){
        $sql = "UPDATE `Drink` SET `Availability`='$Availability',`Price`='$DrinkPrice' WHERE `Drink_ID` = $DrinkID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=drinkchanged");
        exit(); 
    }
    //Wenn nur die Verfügbarkeit und die ID eingegeben wurde wurden, wird nur die Verfügbarkeit geändert
    else if ($DrinkID !== "" && $DrinkPrice === "" && $Availability !== ""){
        $sql = "UPDATE `Drink` SET `Availability`='$Availability' WHERE `Drink_ID` = $DrinkID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=drinkchanged");
        exit(); 
    }
    //Wenn nur der Preis und die ID eingegeben wurde wurden, wird nur der Preis geändert
    if ($DrinkID !== "" && $DrinkPrice !== "" && $Availability === ""){
        $sql = "UPDATE `Drink` SET `Price`='$DrinkPrice' WHERE `Drink_ID` = $DrinkID;";
        mysqli_query($conn, $sql);
        header("location: ../admin.php?error=drinkchanged");
        exit(); 
    }

?>