<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require '/home/mailer/vendor/autoload.php';

function send_mail($email, $oggetto, $messaggio, $path_allegato = null){
        $mail = new PHPMailer();
        $mail->IsIMAP();
        $mail->Host = "imap.gmail.com"; //indirizzo del server di posta in uscita
        $mail->SMTPDebug = 0;
        $mail->Port = 993; //porta del server di posta in uscita
 	    $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
	    $mail->SMTPSecure = 'ssl'; //tls o ssl informarsi presso il provider del vostro server di posta
        $mail->Username = "newstecnologiaofficial@gmail.com"; //la vostra mail
        $mail->Password = "R1cc4rd0-LAMP-L0r3nz0-NEWS"; //password per accedere alla vostra mail
        $mail->Priority    = 1; //(1 = High, 3 = Normal, 5 = low)
        $mail->setFrom('newstecnologiaofficial@gmail.com', 'Lamp News'); //impostazione del mittente
        $mail->AddAddress($email);
        $mail->IsHTML(true);
        $mail->Subject  =  $oggetto;
        $mail->Body     =  $messaggio;
        $mail->AltBody  =  "";
        $mail->AddAttachment($path_allegato);
        if(!$mail->Send()){
                echo "errore nell'invio della mail: ".$mail->ErrorInfo;
                return false;
        }else{
                return true;
        }
        //echo !extension_loaded('openssl')?"Not Available":"Available";
}
?>
