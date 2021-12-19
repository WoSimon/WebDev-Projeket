<header class="header">

<!-- Anfang Navbar mit Logo und Links -->

    <a href="#home" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="start.php#home">Home</a>
        <a href="start.php#menu">Getränke Karte</a>
        <a href="start.php#products">Produkte</a>
        <a href="start.php#about">Über uns</a>
        <a href="start.php#contact">Kontakt</a>
        <a href="start.php#review">Rezensionen</a>
        <a href="start.php#blogs">Blog</a>
        <?php
    
            if (isset($_SESSION["CustomerID"])) {
                echo "<a href='php/logout-inc.php'>Ausloggen</a>";
                echo "<a></a>";
                echo "<a><b>Hallo " .$_SESSION['name']. "!</b></a>";
                echo "</nav>";
            }
            else{
                echo "</nav>";
    
                echo "<div class='icons'>";
                echo    "<a href='login.php'><div class='fas fa-user'></div></a>";
                echo    "<div class='fas fa-bars' id='menu-btn'></div>";
                echo "</div>";
            }

        ?>

<!-- Ende Navbar mit Logo und Links -->

</header>