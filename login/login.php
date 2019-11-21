 <!-- <?php
session_start();
if(isset($_SESSION['user'])){
    require_once(__DIR__ . '/../login-header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
  
  } else if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');

  }
?>  -->


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="login.css">
        <title>PRELOVED</title>
    </head>
    <body>
    <div class="login">
        <div class="login-wrapper">
        <div class="login-bg-color">
        <h3 class="login-title">
            Login into your account
        </h3>
        <div class="login-inputs-grid">
        <div class="login-inputs">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        </div>
        </div>
        </div>
        <button>Login</button>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
    </html>


<!-- <?php require_once(__DIR__ . '/../footer/footer.php'); ?> -->