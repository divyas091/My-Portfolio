<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  $to = "divyaselvakumar29@gmail.com";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  $fullMessage = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

  if (mail($to, $subject, $fullMessage, $headers)) {
    echo json_encode(['success' => true, 'message' => 'Your message has been sent. Thank you!']);
  } else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again later.']);
  }
} else {
  http_response_code(405);
  echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
}
?>
