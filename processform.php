<?php

if ( $_SERVER['REQUEST_METHOD']  === 'POST'
     && isset($_POST['g-recaptcha-response'])  ) {

  // setup reCAPTCHA query info
  $url      = 'https://www.google.com/recaptcha/api/siteverify';
  $secret   = "6LegnAITAAAAAABiioB_CVS1JXsRuBfkCRwiSn9f";
  $response = $_POST['g-recaptcha-response'];
  $data     = ['secret' => $secret, 'response' => $response ];

  // perform query
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $result = json_decode(utf8_encode($response));

  // only process form on reCAPTCHA success
  if ( ! $result->success ) {
    sendResponse('warning', '', 'Failed to validate reCAPTCHA. Please try again.');
  } else {
    // captcha validated, send form
    require_once('swiftmailer/lib/swift_required.php');

    // form at user info
    $userEmail   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $userName    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $userMessage = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $userSendDate = Date('Y-m-d');
    $body = "
      <p>A user has sent you a message through the ASC Online Contact Form.</p>
      <p>
        <ul>
          <li><b>Name</b>: {$userName}</li>
          <li><b>Email</b>: {$userEmail}</li>
          <li><b>Sent On</b>: {$userSendDate}</li>
        </ul>
      </p>
      <p><b>Message:</b></p>
      <p>{$userMessage}</p>
    ";

    // Create the message
    $message = Swift_Message::newInstance()
      ->setSubject('New Message - Contact Form | ASC Online')
      ->setFrom([$userEmail => $userName])
      // ->setTo(['asc@rit.edu' => 'ASC Online'])
      ->setTo(['tom@thomasconroy.net' => 'ASC Online'])
      ->setBody($body, 'text/html');

    // Create the Transport
    $transport = Swift_MailTransport::newInstance();
    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);
    // Send the message
    if ( ! $mailer->send($message, $failures) ) {
      // fail
      sendResponse('error', $failures, 'There was a problem sending your message. Please try again.');
    } else {
      // success
      sendResponse('success', '', 'Message was sent successfully!');
    }
  }
} else {
  // server request method != POST or captcha field not set
}

function sendResponse( $status, $errors, $message ) {
  $response_array = ['status' => $status];
  if ( $errors ) {
    $response_array['errors'] = $errors;
  }
  if ( $message ) {
    $response_array['message'] = $message;
  }
  header('Content-Type: application/json');
  echo json_encode($response_array);
}

?>