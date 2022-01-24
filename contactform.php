<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['mail'] + ' ' + $_POST['message'];

    $mailTo = "ryanytani@gmail.com";
    $headers = 'From: ' . $mailFrom . "\r\n" .
        'Reply-To: ' . $mailFrom . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($mailTo, $subject, $message, $headers);
    header("Location: index.html?mailsend");
?>
    Thank you for writing! I will be in touch with you very soon.
<?php
}

?>