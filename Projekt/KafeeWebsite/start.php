<?php

    include_once 'php/dbh-inc.php';
    include_once 'php/gen-rand-inc.php';
    session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Definiert den Viewport um die Seite resposive zu machen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Awesome Coffee | Home Page</title>

    <!-- Link zu Fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Link zur CSS Datei  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- Header einfügen  -->
<?php

    include_once "php/header-inc.php";

?>

<!-- Anfang des "Home" bereichs -->

<section class="home" id="home">

    <div class="content">
        <h3>Frischer Kaffee jeden morgen</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis.</p>
        <a href="#contact" class="btn">Kommen Sie doch vorbei</a>
    </div>

</section>

<!-- Ende des "Home" bereichs -->

<!-- Start der Getränke Karte  -->

<section class="menu" id="menu">

    <h1 class="heading"> Getränke <span> Karte</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/menu-1.png" alt="">
            <?php
            
            $drinkID = 1;
            include 'php/menu-inc.php';
            
            ?>
        </div>

        <div class="box">
            <img src="images/menu-2.png" alt="">
            <?php
            
            $drinkID = 2;
            include 'php/menu-inc.php';
            
            ?>
        </div>

        <div class="box">
            <img src="images/menu-3.png" alt="">
            <?php
            
            $drinkID = 3;
            include 'php/menu-inc.php';
            
            ?>
        </div>

        <div class="box">
            <img src="images/menu-4.png" alt="">
            <?php
            
            $drinkID = 4;
            include 'php/menu-inc.php';
            
            ?>
        </div>

        <div class="box">
            <img src="images/menu-5.png" alt="">
            <?php
            
            $drinkID = 5;
            include 'php/menu-inc.php';
            
            ?>
        </div>
        
        <div class="box">
            <img src="images/menu-6.png" alt="">
            <?php
            
            $drinkID = 6;
            include 'php/menu-inc.php';
            
            ?>
        </div>

    </div>

</section>

<!-- Ende der Getränke Karte -->

<!-- Anfang der Produkte -->

<section class="products" id="products">

    <h1 class="heading"> Unsere <span>Produkte</span> </h1>
    
    <div class="box-container">
        
        <div class="box">

        <a href="php/reserve-p1.php"><button class="btn">Reservieren</button></a>
        
        <?php

            if (isset($_GET["error"])){

                if($_GET["error"] == "lowstock1"){
                    echo "<h6 class='errorMessage'>Nicht genug Produkte auf Lager!</h6>";
                }
                if($_GET["error"] == "nologin1"){
                    echo "<h6 class='errorMessage'>Bitte Loggen Sie sich ein!</h6>";
                } 
            }
            
            elseif (isset($_GET["reservavtion"])){

                if($_GET["reservavtion"] == "success1"){
                    echo "<h6 class='errorMessage'>Die Reservierung war erfolgreich!</h6>";
                }
            }
            
        ?>

            <div class="image">
                <img src="images/product-1.png" alt="">
            </div>
            <div class="content">
            <?php
                
                $productID = 1;
                include "php/product-inc.php";
                if (isset($_SESSION["ReserveP1"])) {
                    echo "<h6>Sie haben <span>". $_SESSION["ReserveP1"] ."</span> Reserviert</h6>";       
                }
                echo "<br>";
                echo "<div class='price'>". $productPrice ."€</div>";
                
                ?>
            </div>
        </div>

        <div class="box">

        <a href="php/reserve-p2.php"><button class="btn">Reservieren</button></a>

        <?php
        
            if (isset($_GET["error"])){

                if($_GET["error"] == "lowstock2"){
                    echo "<h6 class='errorMessage'>Nicht genug Produkte auf Lager!</h6>";
                }
                if($_GET["error"] == "nologin2"){
                    echo "<h6 class='errorMessage'>Bitte Loggen Sie sich ein!</h6>";
                } 
            }
            
            elseif (isset($_GET["reservavtion"])){

                if($_GET["reservavtion"] == "success2"){
                    echo "<h6 class='errorMessage'>Die Reservierung war erfolgreich!</h6>";
                }
            }
        
        ?>
            
            <div class="image">
                <img src="images/product-2.png" alt="">
            </div>
            <div class="content">
                <?php
                
                $productID = 2;
                include "php/product-inc.php";
                if (isset($_SESSION["ReserveP2"])) {
                    echo "<h6>Sie haben <span>". $_SESSION["ReserveP2"] ."</span> Reserviert</h6>";       
                }
                echo "<br>";
                echo "<div class='price'>". $productPrice ."€</div>";
                
                ?>
            </div>
        </div>

        <div class="box">
           
        <a href="php/reserve-p3.php"><button class="btn">Reservieren</button></a>

        <?php
        
            if (isset($_GET["error"])){

                if($_GET["error"] == "lowstock3"){
                    echo "<h6 class='errorMessage'>Nicht genug Produkte auf Lager!</h6>";
                }
                if($_GET["error"] == "nologin3"){
                    echo "<h6 class='errorMessage'>Bitte Loggen Sie sich ein!</h6>";
                } 
            }
            
            elseif (isset($_GET["reservavtion"])){

                if($_GET["reservavtion"] == "success3"){
                    echo "<h6 class='errorMessage'>Die Reservierung war erfolgreich!</h6>";
                }
            }
        
        ?>

            <div class="image">
                <img src="images/product-3.png" alt="">
            </div>
            <div class="content">
                <?php
                
                $productID = 3;
                include "php/product-inc.php";
                if (isset($_SESSION["ReserveP3"])) {
                    echo "<h6>Sie haben <span>". $_SESSION["ReserveP3"] ."</span> Reserviert</h6>";       
                }
                echo "<br>";
                echo "<div class='price'>". $productPrice ."€</div>";
                
                ?>
            </div>
        </div>

    </div>

</section>

<!-- Ende der Produkte -->

<!-- Anfang der "Über uns" Sektion  -->

<section class="about" id="about">

    <h1 class="heading"> <span>über</span> uns </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.jpg" alt="">
        </div>

        <div class="content">
            <h3>Was macht unseren Kafee so besonders?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
            <a href="about.php" class="btn">Finden Sie mehr heraus</a>
        </div>
        
    </div>

</section>

<!-- Ende der "Über Uns" Sektion -->

<!-- Anfang des Kontaktformulars  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>Schreiben </span>Sie uns </h1>

    <div class="row">

        <iframe class="map" src="https://maps.google.com/maps?q=Schaevinstra%C3%9Fe%201B,%20K%C3%B6ln&t=&z=17&ie=UTF8&iwloc=&output=embed"></iframe>
        
        <form name="messageForm" method="POST" action="php/form-inc.php" onsubmit="return check()">
            <h3>Wir freuen uns über jede Nachricht</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input name="name" type="text" placeholder="Name">
            </div>
            <div class="inputBox">
                <span class="far fa-address-book"></span>
                <input name="email" type="email" placeholder="Mail-Adresse">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <select name="subject">
                    <option value="">--Bitte wählen--</option>
                    <option value="review">Bewertung</option>
                    <option value="question">Frage</option>
                    <option value="idea">Idee</option>
                    <option value="complaint">Beschwerde</option>
                    <option value="application">Bewerbung</option>
                </select>
            </div>
            <div class="inputBox">
                <span class="fas fa-comment-alt"></span>
                <textarea name="message" placeholder="Ihre Nachricht" cols="15" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Senden</button>
        </form>

    </div>

</section>

<!-- Ende des Kontaktformulars -->

<!-- Anfang der Rezensionen -->

<section class="review" id="review">

    <h1 class="heading"> Kunden <span>Rezensionen</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p><?php
                //Holt den passenden Kommentar zu der Zufalszahl (s.o.) aus er DB
                $sql_sec = "SELECT `Content`, `Sender_Name` FROM `Message` WHERE `Message_ID` = " .$comment_one_id. ";";
                $rs = mysqli_query($conn, $sql_sec);

                //Speichert den Kommentar und den Namen aus dem Select Statement (s.o.)in Variablen
                $content = "";
                $sender_name = "";

                if($rs -> num_rows > 0){
                    while ($i = $rs -> fetch_assoc()){
                        $content = $i['Content'];
                        $sender_name = $i['Sender_Name'];
                    }
                }
                echo "$content </p>";
                echo "<h3>" .$sender_name. "</h3>";
                ?>
        </div>

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p><?php
                //Holt den passenden Kommentar zu der Zufalszahl (s.o.) aus er DB
                $sql_sec = "SELECT `Content`, `Sender_Name` FROM `Message` WHERE `Message_ID` = " .$comment_two_id. ";";
                $rs = mysqli_query($conn, $sql_sec);

                //Speichert den Kommentar und den Namen aus dem Select Statement (s.o.)in Variablen
                $content = "";
                $sender_name = "";

                if($rs -> num_rows > 0){
                    while ($i = $rs -> fetch_assoc()){
                        $content = $i['Content'];
                        $sender_name = $i['Sender_Name'];
                    }
                }
                echo "$content </p>";
                echo "<h3>" .$sender_name. "</h3>";
                ?>
        </div>
        
        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p><?php
                //Holt den passenden Kommentar zu der Zufalszahl (s.o.) aus er DB
                $sql_sec = "SELECT `Content`, `Sender_Name` FROM `Message` WHERE `Message_ID` = " .$comment_three_id. ";";
                $rs = mysqli_query($conn, $sql_sec);

                //Speichert den Kommentar und den Namen aus dem Select Statement (s.o.)in Variablen
                $content = "";
                $sender_name = "";

                if($rs -> num_rows > 0){
                    while ($i = $rs -> fetch_assoc()){
                        $content = $i['Content'];
                        $sender_name = $i['Sender_Name'];
                    }
                }
                echo "$content </p>";
                echo "<h3>" .$sender_name. "</h3>";
                ?>
        </div>

    </div>

</section>

<!-- Ende der Rezensionen -->

<!-- Anfang der Blogs  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> Unsere <span>Blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/blog-1.jpeg" alt="">
            </div>
            <div class="content">
                <a href="blog1.php" class="title">Unser Neuster Cafee</a>
                <span>von Ines G. / 26.11.2021</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente accusantium.</p>
                <a href="blog1.php" class="btn">Lesen Sie den vollen Blog</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/blog-2.jpeg" alt="">
            </div>
            <div class="content">
                <a href="blog2.php" class="title">Exkursion nach Südamerika</a>
                <span>von Kevin R. / 13.10.2021</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dicta.</p>
                <a href="blog2.php" class="btn">Lesen Sie den vollen Blog</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/blog-3.jpeg" alt="">
            </div>
            <div class="content">
                <a href="blog3.php" class="title">Unsere Top 10 Kaffee Sorten</a>
                <span>von Jürgen D. / 12.10.2020</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dicta.</p>
                <a href="blog3.php" class="btn">Lesen Sie den vollen Blog</a>
            </div>
        </div>

    </div>

</section>

<!-- Ende des Blogs -->

<!-- Footer wird integriert  -->
<?php

    include_once "php/footer-inc.php";

?>

<!-- Ende des Footers -->

<!-- Link zur JS Datei zur Plausibilitätskontrolle des Formulars-->
<script src="js/plausibilitätskontrolle.js"></script>

<!-- Link zur JS Datei für das Ausklappen des Menüs-->
<script src="js/script.js"></script>

</body>
</html>