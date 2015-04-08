<?php

if ( $_SERVER['REQUEST_METHOD']  === 'POST'
     && isset($_POST['g-recaptcha-response'])  ) {

  // setup reCAPTCHA query info
  $url      = 'http://www.google.com/recaptcha/api/siteverify';
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
    echo 'Failed to validate reCAPTCHA';
  } else {
    // captcha validated, send form
    require_once('swiftmailer/lib/swift_required.php');

    // form at user info
    $userEmail   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $userName    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $userMessage = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Create the message
    $message = Swift_Message::newInstance()
      ->setSubject('New Message from ASC Online Contact Form')
      ->setFrom([$userEmail => $userName])
      ->setTo(['asc@rit.edu' => 'ASC Online'])
      ->setBody($userMessage);

    // Create the Transport
    $transport = Swift_MailTransport::newInstance();
    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);
    // Send the message
    if ( ! $mailer->send($message, $failures) ) {
      // fail
      header('Content-type: application/json');
      $response_array = ['status' => 'error', 'error'=>$failures];
      echo json_encode($response_array);
    } else {
      // success
      header('Content-type: application/json');
      $response_array = ['status' => 'success'];
      echo json_encode($response_array);
    }
  }
} else {
  // server request method != POST or captcha field not set
}


?>