<?php

    session_start();
    if (!isset($_SESSION["AdminID"])) {
        header("location: admin-login.php?error=nologin");
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
            
        <!-- Link zur Allgemeinen CSS Datei  -->
        <link rel="stylesheet" href="css/style.css">

        <!-- Link zur Admin CSS Datei  -->
        <link rel="stylesheet" href="css/adminV3.css">
        
    </head>
<body>

    <section class="admin-content">
            <?php
            
            echo "<h1>Willkommen " . $_SESSION['user'] . "!</h1>";
            
            ?>
        
        <div class="admin-row">
    
            <div class="admin-button">
                <button onclick="loadUpdate()" class="btn">Datenbankbestände ändern</button>
                <a href="php/logout-inc.php" class="btn">Auloggen</a>
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

                echo "<h4>Gesamtzahl an Registrtierten Nutzern: <span>" . $numCustomers . "</span></h4>";
                echo "<br>";
                echo "<br>";
                echo "<h4>Reservierte Produkte in der letzten Woche: <span>" . $lastWeek . "</span></h4>";
                echo "<br>";
                echo "<h4>Reservierte Produkte im letzten Monat: <span>" . $lastMonth . "</span></h4>";
                echo "<br>";
                echo "<h4>Reservierte Produkte im letzten Jahr: <span>" . $lastYear . "</span></h4>";
                echo "<br>";
                echo "<h4>Gesamt reservierte Produkte: <span>" . $reservations . "</span></h4>";
                
                ?>
            </div>
    
        </div>

        <div id="dynarea">
            <?php
            
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "nodrinkid"){
                    echo "<p>Bitte geben Sie eine DrinkID an!</p>";
                    }
                    if($_GET["error"] == "drinkchanged"){
                    echo "<p>Die Daten zu dem Getränk wurden erfolgreich geändert!</p>";
                    }
                    if($_GET["error"] == "noproductid"){
                    echo "<p>Bitte geben Sie eine ProductID an!</p>";
                    }
                    if($_GET["error"] == "productchanged"){
                    echo "<p>Die Daten zu dem Produkt wurden erfolgreich geändert!</p>";
                    }
                }         
            
            ?>
        </div>

    </section>



    <script>

        function loadUpdate(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("dynarea").innerHTML = this.responseText;
                }
                else if(this.readyState == 4 && this.status == 404){
                    var msg404 = document.createTextNode("Ressource kann aktuell nicht bereitgestellt werden! Fahren Sie fort...");
                    document.getElementById("dynarea").appendChild(msg404);
                }
            }
            xhttp.open("GET", "admin-update.php", true);
            xhttp.send();
        }


    </script>
    
</body>
</html>