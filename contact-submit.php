<?php
    $result = False;
    $error = False;

    if (array_key_exists("submit", $_POST)) {
 
        if ($_POST["submit"]) {
            /*
                sprawdzam email
            */
            if (array_key_exists("email", $_POST)) {
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $error = "Niepoprawny format adresu email.";
                }
            }

            /*
                ustawiam treść wiadomości
            */

            if (array_key_exists("txtarea", $_POST)) {
                if (!$_POST["txtarea"]) {
                    $error .= "<br>"."Brak treści wiadomości.";
                }
            }

    if ($error) {
                $result = '<div class="alert alert-danger">'.'Wystąpiły błędy podczas przetwarzania danych formularza:'.'<strong><br>'. $error .'</strong></div>';
    } else {
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.erla.pl';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'automailer@erla.pl';               // SMTP username
        $mail->Password = '';// enter your password here
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom($_POST["email"]);
        $mail->addAddress('roman@erla.pl');                     // Add a recipient
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->CharSet = "UTF-8";

        $mail->Subject = 'Wiadomość ze strony www.erla.pl';
        $mail->Body    = nl2br($_POST["txtarea"]);
        $mail->AltBody = nl2br($_POST["txtarea"]);

        if(!$mail->send()) {

            $result = '<div class="alert alert-danger">'.'Wystąpił błąd podczas wysyłania wiadomości'.'</div>';
        } else {

            $result = '<div class="alert alert-success">'."Wiadomość została wysłana - dziękuję.".'</div>';

            $_POST = array();
        }
    }
}}
