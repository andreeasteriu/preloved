<?php
$sPageName = "Update Password";
require_once(__DIR__ . '/../includes/db-connect.php');

session_start();

if (isset($_SESSION['username'])) {
    require_once(__DIR__ . '/../navigation/header-logout.php');
}
if (empty($_SESSION)) {
    require_once(__DIR__ . '/../navigation/header.php');
}
?>




    <link rel="stylesheet" href="login.css">
    <section class="body-login">
    <div class="login">
        <form class="login-wrapper" id="frmLogin" action="" method="POST">
        <div class="login-bg-color">
        <h3 class="login-title">
            Update your password
        </h3>
        <div class="login-inputs-grid">

        <div class="login-inputs">        
        <input class="login-input" type="password" name="oldPassword" placeholder="Old Password" data-type="string" data-min="6" data-max="255">
        <input class="login-input" type="password" name="password" placeholder="Password" data-type="string" data-min="6" data-max="255">
        <input class="login-input" type="password" name="repeatPassword" placeholder=" Repeat Password" data-type="string" data-min="6" data-max="255">
        <div id="error_message"></div>
        </div>
        </div>
        </div>
        <button id="loginbtn" class="login-button" type="submit" value="Submit" onclick="login(this); return false">Update</button>
      
    </form>
    </div>    
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('#loginbtn').click(function(event){
    event.preventDefault()
    // console.log('test')
    // console.log($('form').serialize())
    $.ajax({
        url : "../includes/password-update.php",
        method: "POST",
        data : $('form').serialize(), // create the form to be passed
        dataType:"JSON"
    })
    .done(function(response){
        console.log('Hi');
        if( response.status === 1 ){
            window.location='../profile/profile.php'
        }else{
            $('#error_message').text(response.message)
        }
        console.log(response)
    })
    .fail()

})

</script>
<script src="../validate.js"></script>

 <?php require_once(__DIR__ . '/../footer/footer.php'); ?> 