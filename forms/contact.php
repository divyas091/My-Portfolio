header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 1);
error_reporting(E_ALL);
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  // Where to send the email
  $to = "divyaselvakumar29@gmail.com"; 
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  $fullMessage = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

  if (mail($to, $subject, $fullMessage, $headers)) {
    echo "Your message has been sent. Thank you!";
  } else {
    http_response_code(500);
    echo "Something went wrong. Please try again later.";
  }
}
?>
