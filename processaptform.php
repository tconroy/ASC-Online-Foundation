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
    $userFname     = filter_var($_POST['fname'],      FILTER_SANITIZE_STRING);
    $userLname     = filter_var($_POST['lname'],      FILTER_SANITIZE_STRING);
    $userUID       = filter_var($_POST['uid'],        FILTER_SANITIZE_NUMBER_INT);
    $userEmail     = filter_var($_POST['ritemail'],   FILTER_SANITIZE_EMAIL);
    $userYear      = filter_var($_POST['yearlevel'],  FILTER_SANITIZE_STRING);
    $userCollege   = filter_var($_POST['college'],    FILTER_SANITIZE_STRING);
    $userAptReason = filter_var($_POST['apptreason'], FILTER_SANITIZE_STRING);

    $availTues  = format_availability($_POST['Tuesday']);
    $availWeds  = format_availability($_POST['Wednesday']);
    $availThurs = format_availability($_POST['Thursday']);
    $availFri   = format_availability($_POST['Friday']);

    $userSendDate = Date('Y-m-d');
    $userIPAddress = $_SERVER['REMOTE_ADDR'];

    $body = "
      <p>An Appointment Request Form was submitted.</p>
      <p>
        <h3>Message Info</h3>
        <ul>
          <li><b>Sent On</b>: {$userSendDate}</li>
          <li><b>From IP Address</b>: {$userIPAddress}</li>
        </ul>
      </p>
      <p>
        <h3>Student Info</h3>
        <ul>
          <li><b>First Name</b>: {$userFname}</li>
          <li><b>Last Name</b>: {$userLname}</li>
          <li><b>Student ID #</b>: {$userUID}</li>
          <li><b>Email</b>: {$userEmail}</li>
          <li><b>Year Level</b>: {$userYear}</li>
          <li><b>College</b>: {$userCollege}</li>
        </ul>
        <h4>Reason for Appointment:</h4>
        <p>{$userAptReason}</p>
      </p>
      <p>
        <h3>Availability for Meeting:</h3>
        <ul>
          <li>
            <b>Tuesday</b>
            {$availTues}
          </li>
          <li>
            <b>Wednesday</b>
            {$availWeds}
          </li>
          <li>
            <b>Thursday</b>
            {$availThurs}
          </li>
          <li>
            <b>Friday</b>
            {$availFri}
          </li>
        </ul>
      </p>
    ";

    // Create the message
    $message = Swift_Message::newInstance()
      ->setSubject('New Appointment Request | ASC Online')
      ->setFrom([$userEmail => $userFname.' '.$userLname])
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


function format_availability ( $dayArr ) {
  $out = "<ul>";
  foreach ($dayArr as $time) {
    $out .= "<li>{$time}</li>";
  }
  $out .= "</ul>";
  return $out;
}

?>