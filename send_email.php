<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $too = htmlspecialchars($_POST['too']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: admin@gmail.com"; // Replace with the admin's email address

    if (mail($to, $subject, $message, $headers)) {
        header("Location: email.php?status=1");
    } else {

        header("Location: email.php?error=1");
    }
} else {
    echo "Invalid request.";
}
?>
