<!-- <?php
session_start();
if(isset($_SESSION['user'])){
    require_once(__DIR__ . '/../login-header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
  
  } else if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');

  }
?> -->


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="login.scss">
        <title>PRELOVED</title>
    </head>
    <body>
        
    <div class="login-container">
        <div class="login-bg-color">
        <h2 class="login-title">
            Create an Account
        </h2>
        <input type="email" name="email" id="email">
        <input type="password" name="password" id="password">
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
    </html>