<?php
session_start();
if(isset($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
}
?> 


    <link rel="stylesheet" href="login.css">
    <section class="body-login">
    <div class="login">
        <div class="login-wrapper">
        <div class="login-bg-color">
        <h3 class="login-title">
            Login into your account
        </h3>
        <form action="" method="POST">
        <div class="login-inputs-grid">
 php-login
        <div class="login-inputs">
        <input class="login-input" type="username" name="username" id="username" placeholder="Username">
        <input class="login-input" type="password" name="password" id="password" placeholder="Password">
        </div>
        </div>
        </div>
        <button type="submit" value="Submit">Submit</button>
        </form>
      
    </div>
    </div>    
</section>

<?php

if (isset($_POST['login-submit'])){ 

    require 'db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)){
        header("Location: ../main/index.php?error=emptyfields");
        exit();

    }else{
        $sql = "SELECT * FROM customers WHERE username=? "; //check here
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../main/index.php?error=sqlerror");
             exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result =  mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['passwordUsers']); // how is called in data
                if ($passCheck == false) {
                    header("Location: ../main/index.php?error=wrongpassword");
                exit();
                }
                else if($passCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUser']; // how is called in data - store more?

                    header("Location: ../main/index.php?login=success");
                    exit();

                }else {
                    header("Location: ../main/index.php?error=wrongpassword");
                    exit();
                }
            }else {
                header("Location: ../main/index.php?error=nouser");
                exit();
            }
           
        }
    }
}else {
    header("Location: ../main/index.php");
    exit();

    }
 ?>
 <?php require_once(__DIR__ . '/../footer/footer.php'); ?> 