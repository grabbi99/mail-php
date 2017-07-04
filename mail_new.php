<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['your_name'];
        $email = $_POST['your_email'];
        $subject = $_POST['your_subject'];
        $message = $_POST['your_message'];

        // Sender Email and Name 
        $from = stripslashes($_POST['your_name'])."<".stripslashes($_POST['your_email']).">";

        // Recipient Email Address 
        $to = 'yourmail@mail.com'; 

        // Email Header 
        $headers = "From: $from\r\n" .
                 "MIME-Version: 1.0\r\n" .

        // Message Body 
        $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
        
        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Please fill all the fields and try again.';
            exit;
        }

        // If there are no errors, send the email
        if (mail ($to, $from, $body )) {
            echo 'Thank You! We will be in touch with you very soon.';
        }
        else {
            echo 'Sorry there was an error sending your message. Please try again';
        }
    }
?>