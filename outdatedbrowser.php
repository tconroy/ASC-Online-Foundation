<!DOCTYPE html>
<html>
<head>
  <title>ASC Online | Outdated Browser</title>
  <script type="text/javascript">
    var count = 11;
    var redirect = "http://browsehappy.com";

    function countDown() {
      var timer = document.getElementById("timer");
      if(count > 0){
          count--;
          timer.innerHTML = "This page will redirect in <span id='num'>"+count+"</span> seconds.";
          setTimeout("countDown()", 1000);
      }else{
          window.location.href = redirect;
      }
    }
  </script>
  <style type="text/css" media="screen">
    body {
      background: url(/wp-content/themes/ASC-Online/assets/img/admin/login-bg.png) repeat;
    }
    .container {
      width: 70%; margin: 0 auto;
    }
    #timer {
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      display: block;
      margin: 0 auto;
    }
    #num {
      color: orange;
    }
    img {
      margin: 0 auto;
      display: block;
      width: 100%;
      max-width: 200px;
    }
    h1, h2, h3 {
      text-align: center;
    }
    .content {
      margin-top: 25px;
      background: lightgray;
      border: 3px solid darkgray;
      padding: 10px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class='container'>
    <img src="/wp-content/themes/ASC-Online/assets/img/nav/asco-logo.png">

    <div class="content">
      <h1>Uh Oh!</h1>
      <h2>Looks like you're using an outdated web browser!</h2>
      <h3><?= $_GET['browser'] ?> version <?= $_GET['version'] ?> is not supported on this site.</h3>
      <p>
        Unfortunately, not all web browsers are created equal. Some of the content and functionality of this website does not work with your version of <?= $_GET['browser'] ?>. To ensure maximum performance, functionality and security, only updated browsers can access this site.
      </p>

      <p>
        In a few moments, we'll redirect you to <a href="http://browsehappy.com">browsehappy.com</a>, a site which can guide you through upgrading your browser.
      </p>

      <span id="timer">
        <script type="text/javascript">countDown();</script>
      </span>
    </div> <!-- /.content -->

  </div> <!-- /.container -->
</body>
</html>