<?php
    //Start der PHP Session und Errorhandeling
    session_start();
    if (!isset($_SESSION["AdminID"])) {
        header("location: admin-login.php?error=nologin");
        exit();
    }

?>

<body>
    
    <div class="admin-row">
        
        <!-- Formular zum ändern der Getränkekarte -->
        <form name="UpdateMenu" method="POST" action="php/update-drink-inc.php">
            <h3><span>Getränke</span>daten Ändern</h3>
            <div class="inputBox">
                <input name="DrinkID" type="text" placeholder="Getränke ID">
            </div>
            <div class="inputBox">
                <input name="DrinkPrice" type="text" placeholder="Preis">
            </div>
            <div class="inputBox">
                <select name="Availability">
                    <option value="">--Verfügbarkeit auswählen--</option>
                    <option value="Available">Verfügbar</option>
                    <option value="NotAvailable">Nicht Verfügbar</option>
                </select>
            </div>
            <button type="submit" name="save" class="btn">Speichern</button>
        </form>
        
        <!-- Formular zum ändern der Produkte -->
        <form name="UpdateProducts" method="POST" action="php/update-product-inc.php">
            <h3><span>Produkt</span>daten Ändern</h3>
            <div class="inputBox">
                <input name="ProductID" type="text" placeholder="Produkt ID">
            </div>
            <div class="inputBox">
                <input name="ProductPrice" type="text" placeholder="Preis">
            </div>
            <div class="inputBox">
                <input name="ProductStock" type="number" min="0" placeholder="Menge Verfügbar">
            </div>        
            <button type="submit" name="save" class="btn">Speichern</button>
        </form>

    </div>
    
</body>
</html>