<!DOCTYPE html>
<html>
<head>
  <title>ASC Online | Outdated Browser</title>
</head>
<body>
  <div class='container' style="width: 70%; margin: 0 auto;">
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
  </div>

  <script type="text/javascript">
    var count = 6;
    var redirect = "http://www.apphp.com";

    function countDown() {
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            timer.innerHTML = "This page will redirect in "+count+" seconds.";
            setTimeout("countDown()", 1000);
        }else{
            window.location.href = redirect;
        }
    }
  </script>
</body>
</html>