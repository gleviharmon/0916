<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitize_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $firstName = sanitize_input($_POST['name']);
    $middleName = sanitize_input($_POST['email']);
    $lastName = sanitize_input($_POST['last_name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone_number']);
    $birthdate = sanitize_input($_POST['birth_date']);
    $gender = sanitize_input($_POST['gender']);
    $comments = sanitize_input($_POST['comments']);
    $payment = sanitize_input($_POST['payment']);
    $runnynose = isset($_POST['runnynose']) ? 'Yes' : 'No';
    $sorethroat = isset($_POST['sorethroat']) ? 'Yes' : 'No';
    $headache = isset($_POST['headache']) ? 'Yes' : 'No';

    $to = "gharmon@heidelberg.edu";
    $subject = "POP Customer Notification";
    $message = "
    First Name: $firstName\n
    Middle Name: $middleName\n
    Last Name: $lastName\n
    Email: $email\n
    Phone Number: $phone\n
    Birth Date: $birthdate\n
    Gender: $gender\n
    Comments: $comments\n
    Payment: $payment\n
    Runny Nose: $runnynose
    Sore Throat: $sorethroat
    Headache: $headache
    ";

    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Form submission successful.";
    } else {
        echo "There was a problem with the form submission.";
    }
}
?>