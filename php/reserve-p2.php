<!-- Diese Datei soll die Reservierung von Produkt zwei handeln -->
<?php

    include_once 'dbh-inc.php';

    session_start();

    //Prüfe ob Nutzer eingeloggt ist
    if (isset($_SESSION["CustomerID"])) {

        $product_sql = "SELECT `Amount_Available` FROM `Product` WHERE `Product_ID` = 2;";
        $rs = mysqli_query($conn, $product_sql);
        
        //Setze die Variablen
        $productAvailability = "";  
        $CustomerID = $_SESSION["CustomerID"];   
        $time = date('Y-m-d H:i:s');
        
        //Die Verfügbarkeit speichern
        if($rs -> num_rows > 0){
            while ($i = $rs -> fetch_assoc()){
                $productAvailability = $i['Amount_Available'];
            }
        }
        
        //Reservierung nur möglich wenn noch mehr als 5 Produkte auf Lager sind
        if ($productAvailability <= 5) {
            header("location: ../start.php?error=lowstock2#products");
        }
        //Updaten der DB Bestände
        else{
            $newAmount = $productAvailability - 1;
            $update_sql = "UPDATE `Product` SET `Amount_Available`='" . $newAmount . "' WHERE `Product_ID` = 2;";
            mysqli_query($conn, $update_sql);
            $reservation_sql = "INSERT INTO `ProductReservation`(`ProductID`, `CustomerID`, `Time`) VALUES ('2','". $CustomerID ."','".  $time ."')";
            mysqli_query($conn, $reservation_sql);
            if (isset($_SESSION["ReserveP2"])){
                $_SESSION["ReserveP2"] = $_SESSION["ReserveP2"] + 1 ; 
            }
            else {
                $_SESSION["ReserveP2"] = 1;
            }
            header("location: ../start.php?reservavtion=success2#products");
        }

    }
    else{
        header("location: ../start.php?error=nologin2#products");
    }

?>