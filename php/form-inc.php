<!-- Speiechert die Eingaben des Kontaktformulars in der DB wenn es sich um eine Bewertung handelt und Sendet ansonsten eine Mail -->
<?php

    include_once 'dbh-inc.php';

    $count = mysqli_query($conn, "SELECT * FROM `Message`;");
    $c = $count -> num_rows;

    $id = $c + 1;
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['message'];

    $MailTo = "simon.04@web.de";
    $MailHeaders = "Mail von: " .$mail. " (über die Website 'Awesome Coffee')";
    $Mailtext = "Wir haben eine Email von " .$name. " über das Kontaktformular der Website erhalten.\n\nDer Inhalt der Nachricht ist:\n" .$content;  
    
    //Wenn die Nachricht eine Bewertung ist, wird diese in der DB gespeichert
    if ($subject = "review") {
        $sql = "INSERT INTO `Message`(`Message_ID`, `Content`, `Sender_Name`, `Sender_Mail`) VALUES ('$id','$content','$name','$mail');";
        mysqli_query($conn, $sql);
    }
    //Wenn nicht, wird eine Mail mit Bitte um Manuelle Bearbeitung der Anfrage versendet
    else {
        mail($MailTo, $subject, $Mailtext, $MailHeaders);
    }

    header("Location: ../start.php?MessageSend=success#contact");

?>