<?php

    //Holt den passenden Kommentar zu der Zufalszahl (s.o.) aus er DB
     $menu_sql = "SELECT `Drink_Name`,`Availability`,`Price` FROM `Drink` WHERE `Drink_ID` =" . $drinkID . ";";
     $rs = mysqli_query($conn, $menu_sql);

     //Speichert den Kommentar und den Namen aus dem Select Statement (s.o.)in Variablen
     $drinkName = "";
     $drinkAvailability = "";
     $drinkPrice = "";

     if($rs -> num_rows > 0){
         while ($i = $rs -> fetch_assoc()){
             $drinkName = $i['Drink_Name'];
             $drinkAvailability = $i['Availability'];
             $drinkPrice = $i['Price'];
         }
     }

    //Wenn das Getränk verfügbar ist
    if ($drinkAvailability == 1) {
        echo "<h3>" . $drinkName . "</h3>";
        echo "<div class='price'>" . $drinkPrice . "€</div>";
        echo "<div class='availability' id='av'>verfügbar</div>";
    }
    //Wenn das Getränk nicht verfügbar ist
     else {
        echo "<h3>" . $drinkName . "</h3>";
        echo "<div class='price'>" . $drinkPrice . "€</div>";
        echo "<div class='availability' id='na'>nicht verfügbar</div>";
     }

?>