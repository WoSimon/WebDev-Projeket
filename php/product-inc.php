<?php

    //Holt die Daten zu einem bestimmten Produkt aus der DB
    $product_sql = "SELECT `Product_Name`, `Price`, `Amount_Available` FROM `Product` WHERE `Product_ID` =" . $productID . ";";
    $rs = mysqli_query($conn, $product_sql);

    //Speichert die Daten aus dem Select Statement (s.o.) in Variablen
    $productName = "";
    $productAvailability = "";
    $productPrice = "";

    if($rs -> num_rows > 0){
        while ($i = $rs -> fetch_assoc()){
            $productName = $i['Product_Name'];
            $productAvailability = $i['Amount_Available'];
            $productPrice = $i['Price'];
        }
    }

    //Ausgabe der Daten
    echo "<h3>" .$productName. "</h3>";
    echo "<br>";
    echo "<h6>Noch <span>". $productAvailability ."</span> Verfügbar</h6>";

?>