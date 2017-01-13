<?php
// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Get the form fields and remove whitespace.
	$name = strip_tags(trim($_POST["name"]));
	$name = str_replace(array("\r","\n"),array(" "," "),$name);
	$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
	$message = trim($_POST["message"]);
	// $secret = "YOUR-RECAPTCHA-SECRET"; // TODO: Update this to your desired email address.
	$secret = "6LeMQhgTAAAAABoI1CMC2jxbkilJUPjDe24UyP7J";
	$response = $_POST["captcha"];
	$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
	$captcha_success = json_decode($verify);

    if (empty($name)) {
        $errors['name'] = 'Please fill in your name';
    }

    if (empty($email)) {
        $errors['email'] = 'Please fill in your email address';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

    if (empty($message)) {
        $errors['message'] = 'Please enter a message to send';
    }

	if (empty($response)) {
		$errors['recaptcha'] = 'Please enter the reCAPTCHA';
	} else if ($captcha_success->success==false) {
	  	$errors['recaptcha'] = 'ReCAPTCHA is not valid';
	}

    if (!empty($errors)) {
        echo json_encode($errors);
		die;
    }

	$recipient = "hello@example.com"; // TODO: Update this to your desired email address.

	$subject = "New contact from $name";

	$email_content = "Name: $name\n";
	$email_content .= "Email: $email\n\n";
	$email_content .= "Message:\n$message\n";

	$email_headers = "From: $name <$email>";

	$send = mail($recipient, $subject, $email_content, $email_headers);

	// Send the email.
	if ($send) {
		echo json_encode(['success' => 'Thank you for your message. We\'ll get back to you as soon as possible']);
	} else {
		echo json_encode(['error' => "Oops! Something went wrong and we couldn't send your message. Try again later."]);
	}
} else {
    echo json_encode("There was a problem with your submission, please try again.");
}
