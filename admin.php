<?php

    session_start();
    if (!isset($_SESSION["AdminID"])) {
        header("location: ../admin-login.php?error=noeinloggen");
        exit();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <!-- Definiert den Viewport um die Seite resposive zu machen -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Awesome Coffee | Adminbereich </title>

        <!-- Link zur Admin CSS Datei  -->
        <link rel="stylesheet" href="css/admin.css">

        <!-- Link zur Allgemeinen CSS Datei  -->
        <link rel="stylesheet" href="css/style.css">

    </head>
<body>

    <section class="admin-content">
            <?php
            
            echo "<h1>Willkommen " . $_SESSION['user'] . "!</h1>";
            
            ?>
        
        <div class="admin-row">
    
            <div class="admin-text">
                <a href="" class="btn">Datenbankbestände ändern</a>
            </div>

            <div class="admin-text">
                <h2>Statistiken:</h2>
                <br>
                <br>
                <?php
                
                include_once "php/dbh-inc.php";

                $customers_sql = "SELECT * FROM `Customer`;";
                $rs = mysqli_query($conn, $customers_sql);
                $numCustomers = $rs -> num_rows;
                
                $lastWeek_sql = "SELECT * FROM `ProductReservation` WHERE `Time` BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW();";
                $rs = mysqli_query($conn, $lastWeek_sql);
                $lastWeek = $rs -> num_rows;
                
                $lastMonth_sql = "SELECT * FROM `ProductReservation` WHERE `Time` >= DATE(NOW() - INTERVAL 1 MONTH);";
                $rs = mysqli_query($conn, $lastMonth_sql);
                $lastMonth = $rs -> num_rows;
                
                $lastYear_sql = "SELECT * FROM `ProductReservation` WHERE `Time` >= DATE(NOW() - INTERVAL 1 Year);";
                $rs = mysqli_query($conn, $lastYear_sql);
                $lastYear = $rs -> num_rows;

                $reservations_sql = "SELECT * FROM `ProductReservation`;";
                $rs = mysqli_query($conn, $reservations_sql);
                $reservations = $rs -> num_rows;

                echo "<table>";

                    echo "<tr>";
                        echo "<td><h4>Gesamtzahl an Registrtierten Nutzern</h4></td>";
                        echo "<td class='stat'><h4>$numCustomers</h4></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><h4>Reservierte Produkte in der letzten Woche</h4></td>";
                        echo "<td class='stat'><h4>$lastWeek</h4></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><h4>Reservierte Produkte im letzten Monat</h4></td>";
                        echo "<td class='stat'><h4>$lastMonth</h4></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><h4>Reservierte Produkte im letzten Jahr</h4></td>";
                        echo "<td class='stat'><h4>$lastYear</h4></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><h4>Gesamt reservierte Produkte</h4></td>";
                        echo "<td class='stat'><h4>$reservations</h4></td>";
                    echo "</tr>";

                echo "</table>";

                
                ?>
            </div>
    

        </div>
    
    </section>
    
</body>
</html>