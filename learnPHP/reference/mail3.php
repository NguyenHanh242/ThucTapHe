<?php 
require "mai/Mail.php";
//lamp/php/etc/php.ini
//[mail function]
$from = '<huuhung.luyt@gmail.com>';
$to = '<huuhung.luyt@gmail.com>';
$subject = "Subject";
$body = "Hello hello";
$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);
$message = $body;
$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'nguyenhanhbkdn@gmail.com',
        'password' => 'honghanh'
    ));
$mail = $smtp->send($to, $headers, $message);
if (PEAR::isError($mail)) {
    echo "ERROR:Send failed";
    echo("<p>" . $mail->getMessage() . "</p>");
    exit();
} else {
    echo "SUCCESS:Send successful:";
        exit();
}
?>