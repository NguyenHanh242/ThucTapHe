<?php 
    require 'phpMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();               
    $mail->Host = 'smtp.gmail.com';                      
    $mail->SMTPAuth = true;                               // enable SMTP
    $mail->Username = 'nguyenhanhbkdn@gmail.com';                 // SMTP username
    $mail->Password = 'honghanh';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            //enable ssl
    $mail->Port = 465;                        //set port = 465

    // $name = trim($_POST["name"]);
    // $email = trim($_POST["email"]);
    // $phone = trim($_POST["phone"]);
    // $message = trim($_POST["message"]);

    $mail->setFrom('nguyentiencongxdcd@gmail.com', 'Tien Cong');
    $mail->addAddress('nguyenhanhbkdn@gmail.com', 'Hanh Nguyen');
    $mail->addReplyTo('nguyenhanhbkdn@gmail.com', 'Hanh Nguyen');
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   
    $mail->isHTML(true);    

    $mail->Subject= 'Idea of customer';
    $mail->Body = 'Hello, this is email';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
?>