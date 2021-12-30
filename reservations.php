<?php
    //Start der PHP Session
    session_start();

    //Errorhandeling: Wenn der Nutzer nicht eingeloggt ist wird er auf die Startseite zurückgeschickt
    if (!isset($_SESSION["CustomerID"])){
        header("location: start.php");
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome Coffee | Vergangene Reservierungen</title>

    <!-- Link zu Fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Link zur Reservations CSS -->
    <link rel="stylesheet" href="css/reservations.css">

    <!-- Link zur CSS Datei  -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <!-- Header einfügen  -->
    <?php

    include_once "php/header-inc.php";

    ?>

    <!-- Beginn Content -->
    <section class="past-res" id="past-res">

        <div class="past-res-row">

            <div class="past-res-content">
                <!-- Tabelle mit den vergangenen Reservierungen -->
                <table>

                    <tr>
                        <th colspan=3><h3>Vergangene Reservierungen</h3></th>
                    </tr>
                    <tr>
                        <td class="col-name" width = "20%"><b>Reservierung</b></td>
                        <td class="col-name" width = "40%"><b>Produkt</b></td>
                        <td class="col-name" width= "40%"><b>Datum</b></td>
                    </tr>
                    <!-- PHP wird genutzt um die Daten aus der DB zu holen -->
                    <?php

                        include_once "php/dbh-inc.php";

                        echo $_SESSION['CustomerID'];

                        $res_sql = "SELECT `ReservationID`,`ProductID`,`Time` FROM `ProductReservation` WHERE `CustomerID` = " . $_SESSION["CustomerID"] . " ORDER BY `Time` DESC;";
                        $rs = mysqli_query($conn, $res_sql);

                        //Für jeden Eintrag in der Datenbank wird eine neue Zeite erstellt 
                        if($rs -> num_rows > 0){
                            while ($i = $rs -> fetch_assoc()){
                                echo "<tr>";
                                echo    "<td>" .$i['ReservationID']. "</td>";
                                $product_sql = "SELECT `Product_Name` FROM `Product` WHERE `Product_ID` = " . $i['ProductID'] .";";
                                $product_rs = mysqli_query($conn, $product_sql);
                                if($product_rs -> num_rows > 0){
                                    while ($j = $product_rs -> fetch_assoc()){
                                        echo    "<td>". $j['Product_Name'] ."</td>";
                                    }
                                }
                                echo   "<td>". $i['Time'] ."</td>";
                                echo "</tr>";
                            }
                        }
                        //Wenn noch nichts bestellt wurde wird eine Entsprechende Nachricht ausgegeben
                        else{
                            echo "<tr>";
                                echo "<td colspan=3>Keine Bestellungen verfügbar</td>";
                            echo "</tr>";
                        }
                        
                    ?>

                </table>
            </div>
            
        </div>

    </section>
    <!-- Ende Content -->

    <!-- Footer wird integriert  -->
    <?php

    include_once "php/footer-inc.php";

    ?>

</body>
</html>