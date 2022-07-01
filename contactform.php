<?php

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = $headers = "";
$allValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $allValid = false;
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $allValid = false;
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $allValid = false;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $allValid = false;
        }
        $headers = "From: ryan@ryanytani.com";
    }

    if (empty($_POST["message"])) {
        $message = "";
        $allValid = false;
    } else {
        $message = test_input($_POST["message"]);
    }
    if ($allValid) :
        mail("ryanytani@gmail.com", "Message from " . $name . " at " . $email, $message, $headers);
?>
        <h2>Thanks for reaching out!</h2>
        <h3>Confirmation of message sent:</h3>
        <p>Name: <?php echo $name; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Message: <?php echo $message; ?></p>
    <?php else : ?>
        <h2> ERROR </h2>
<?php endif;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>