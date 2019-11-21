 <?php
session_start();
if(isset($_SESSION['user'])){
    require_once(__DIR__ . '/../login-header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
  
  } else if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');

  }
?>  


    <link rel="stylesheet" href="login.css">
    <div class="body-login">
    <div class="login">
        <div class="login-wrapper">
        <div class="login-bg-color">
        <h3 class="login-title">
            Login into your account
        </h3>
        <div class="login-inputs-grid">
        <div class="login-inputs">
        <input class="login-input" type="email" name="email" id="email" placeholder="Email">
        <input class="login-input" type="password" name="password" id="password" placeholder="Password">
        </div>
        </div>
        </div>
        <button class="login-button">Login</button>
    </div>
    </div>    
    </div>
 <?php require_once(__DIR__ . '/../footer/footer.php'); ?> 