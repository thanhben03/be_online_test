<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company']);
    $message = htmlspecialchars($_POST['message']);

    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors['name'] = "Please enter your name.";
    }

    // Validate email
    if (empty($email)) {
        $errors['email'] = "Please enter your email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    // Validate phone
    if (empty($phone)) {
        $errors['phone'] = "Please enter your phone number.";
    } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $errors['phone'] = "Please enter a valid phone number.";
    }

    // Validate company
    if (empty($company)) {
        $errors['company'] = "Please enter your company name.";
    }

    // Validate message
    if (empty($message)) {
        $errors['message'] = "Please enter your message.";
    }

    // If there are errors, redirect back with error messages
    if (!empty($errors)) {
        // You can store errors in the session or use a different method to pass them back to the form
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header("Location: ../");
        exit();
    } else {
        $_SESSION['errors'] = [];
        $_SESSION['old_data'] = [];
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .thank-you-container {
            margin-top: 50px;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .thank-you-container h2 {
            color: #007bff;
        }
        .thank-you-container p {
            margin: 20px 0;
        }
        .thank-you-container strong {
            display: inline-block;
            width: 120px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="thank-you-container">
        <h2>Thank you for contacting us</h2>
        <p>We will be back in touch with you within one business day using the information you just provided below:</p>
        <p><strong>Name:</strong> <?=$name?></p>
        <p><strong>Phone:</strong> <?=$phone?></p>
        <p><strong>Email Address:</strong> <a href="mailto:<?=$email?>"><?=$email?></a></p>
        <p><strong>Company:</strong> <?=$company?></p>
    </div>
</div>

</body>
</html>

<?php
}
?>

