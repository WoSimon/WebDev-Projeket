<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Awesome Coffee | Administrationsbereich</title>
      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="close-btn">
            <a href="start.php#home"><div class="fas fa-times-circle"></div></a>
         </div>
         <div class="title-text">
            <div class="title login">
               Einloggen
            </div>
            <div class="title signup">
               Registrieren
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Einloggen</label>
               <label for="signup" class="slide signup">Registrieren</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form name="loginForm" action="php/login-inc.php" method="post" class="login">
                  <div class="field">
                     <input type="text" name="email" placeholder="Mail Adresse" required>
                  </div>
                  <div class="field">
                     <input type="password" name="pwd" placeholder="Passwort" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="submit" value="Einloggen">
                  </div>
                  <div class="signup-link">
                     Du hast noch kein Konto? <a href="">Jetzt einloggen</a>
                  </div>
               </form>
               
               <form id="signupForm" action="php/signup-inc.php" method="post" class="signup" onsubmit="return validateSignup()" >
                  <div class="field">
                     <input id="name" type="text" name="name" placeholder="Name" required>
                  </div>
                  <div class="field">
                     <input id="email" type="email" name="email" placeholder="Mail Adresse" required>
                  </div>
                  <div class="field">
                     <input id="pwd" type="password" name="pwd" placeholder="Passwort" required>
                  </div>
                  <div class="field">
                     <input id="pwdRepeat" type="password" name="pwdRepeat" placeholder="Passwort bestätigen" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input id="submit" type="submit" name="submit" value="Registrieren">
                  </div>
               </form>
            </div>
         </div>
      </div>
         <?php
                  
            if (isset($_GET["error"])) {
               if($_GET["error"] == "emailexists"){
                  echo "<p>Diese Email Adresse ist bereits mit einem Account verbunden!</p>";
               }
               if($_GET["error"] == "pwdDontMatch"){
                  echo "<p>Die eingegebenen Passwörter stimmen nicht überein!</p>";
               }
               if($_GET["error"] == "none"){
                  echo "<p>Die Operation war erfolgreich!</p>";
               }
               if($_GET["error"] == "maildoesnotexist"){
                  echo "<p>Zu der angegebenen Email existiert kein Nutzerkonto!</p>";
               }
               if($_GET["error"] == "wronglogin"){
                  echo "<p>Das Passwort stimmt nicht!</p>";
               }
            }
                  
         ?>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>