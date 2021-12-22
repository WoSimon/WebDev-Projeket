<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Awesome Coffee | Administrationslogin</title>
      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Einloggen
            <div class="form-inner">
               <form name="loginForm" action="php/admin-login-inc.php" method="post" class="login">
                  <div class="field">
                     <input type="text" name="user" placeholder="Nutzername" required>
                  </div>
                  <div class="field">
                     <input type="password" name="pwd" placeholder="Passwort" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="submit" value="Einloggen">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>   
      <?php              
         if (isset($_GET["error"])) {
            if($_GET["error"] == "usernotexist"){
               echo "<p>Zu dem angegebenen Usernamen existiert kein Adminkonto!</p>";
            }
            if($_GET["error"] == "wronglogin"){
               echo "<p>Das Passwort stimmt nicht!</p>";
            }
            if($_GET["error"] == "nologin"){
               echo "<p>Bitte loggen Sie sich ein!</p>";
            }
         }         
      ?>
   </body>
</html>