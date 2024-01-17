<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Thank You</title>
</head>

<body>
    <?php

    $nameErr = $emailErr = $messageErr = "";
    $name = $email = $message = $headers = "";
    $allValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['website'])) die(); //spam protection
        if (!empty($_POST['email'])) die(); //spam protection

        if (empty($_POST["name-nospam"])) {
            $nameErr = "Name is required";
            $allValid = false;
        } else {
            $name = test_input($_POST["name-nospam"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $allValid = false;
            }
        }
        if (empty($_POST["email-nospam"])) {
            $emailErr = "Email is required";
            $allValid = false;
        } else {
            $email = test_input($_POST["email-nospam"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $allValid = false;
            }
            $headers = "From: ryan@ryanytani.com";
        }

        if (empty($_POST["message-nospam"])) {
            $message = "";
            $allValid = false;
        } else {
            $message = test_input($_POST["message-nospam"]);
        }
        if ($allValid) :
            mail("ryanytani@gmail.com", "Message from " . $name . " at " . $email, $message, $headers);
    ?>
            <div id="thank-you-wrapper" class="center">
                <h2>Thanks for reaching out!</h2>
                <h3>Confirmation of message sent:</h3>
                <div id="confirmation-message">
                    <p>Name: <?php echo $name; ?></p>
                    <p>Email: <?php echo $email; ?></p>
                    <p>Message: <?php echo $message; ?></p>
                </div>
                <h2><a href="index.html">Return Home</a></h2>
            </div>
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
</body>

</html>