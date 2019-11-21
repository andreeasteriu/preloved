 <?php
session_start();
if(isset($_SESSION['user'])){
    require_once(__DIR__ . '/../login-header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
  
  } else if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');

  }
?>  



    <link rel="stylesheet" href="sign-up.css">
       
    <body class="body-sign-up">
    <div class="signup">
        <div class="signup-wrapper">
        <div class="signup-bg-color">
        <h3 class="signup-title">
            Create an Account
        </h3>
        <div class="signup-inputs-grid">
        <div class="signup-inputs">
        <input class="signup-input" type="text" name="fullname" id="fullname" placeholder="Full Name">
        <input class="signup-input" type="email" name="email" id="email" placeholder="Email">
        <input class="signup-input" type="text" name="birthday" id="birthday" placeholder="Birthday" onfocus="(this.type='date')" onblur="(this.type='text')">
        <input class="signup-input" type="text" name="address" id="address" placeholder="Address">
        <input class="signup-input" type="password" name="password" id="password" placeholder="Password">
        </div>
        </div>
        </div>
        <button class="signup-button">Next</button>
    </div>
    </div>
   


<!-- <?php require_once(__DIR__ . '/../footer/footer.php'); ?> -->