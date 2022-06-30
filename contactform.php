<?php

if (isset($_POST['submit'])) {
    $name = $_POST['sender-name'];
    $subject = 'Email from: ' + $name;
    $mailFrom = $_POST['sender-email'];
    $message = $_POST['sender-message'];

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