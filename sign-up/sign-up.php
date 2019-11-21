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
        <link rel="stylesheet" href="sign-up.css">
        <title>PRELOVED</title>
    </head>
    <body>
    <div class="signup">
        <div class="signup-wrapper">
        <div class="signup-bg-color">
        <h3 class="signup-title">
            Create an Account
        </h3>
        <div class="signup-inputs-grid">
        <div class="signup-inputs">
        <input type="text" name="fullname" id="fullname" placeholder="Full Name">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="text" name="birthday" id="birthday" placeholder="Birthday" onfocus="(this.type='date')" onblur="(this.type='text')">
        <input type="text" name="address" id="address" placeholder="Address">
        <input type="password" name="password" id="password" placeholder="Password">
        </div>
        </div>
        </div>
        <button>Next</button>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
    </html>


<!-- <?php require_once(__DIR__ . '/../footer/footer.php'); ?> -->