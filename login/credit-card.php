<?php
$sPageName = "Insert Credit Card";
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
            Upload Credit Card.
        </h3>
        <div class="login-inputs-grid">

        <div class="login-inputs">
        <input class="login-input" type="text" name="iban" placeholder="Credit Card"  data-type="string" data-min="18" data-max="18">
        <div class="expiration-date">
        <input class="login-input date" type="number" name="year" placeholder="Year"  data-type="string" data-min="4" data-max="4"><span> /</span>
        <input class="login-input date" type="number" name="month" placeholder="Month"  data-type="string" data-min="1" data-max="2">
        </div>
        <input class="login-input" type="text" name="cvv" placeholder="CVV"  data-type="string" data-min="3" data-max="3">
        <input class="login-input" type="password" name="password" placeholder="Password" data-type="string" data-min="6" data-max="255">
        <div id="error_message"></div>
        </div>
        </div>
        </div>
        <button id="loginbtn" class="login-button" type="submit" value="Submit" onclick="login(this); return false">Upload</button>
      
    </form>
    </div>    
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('#loginbtn').click(function(event){
    event.preventDefault()
    console.log('test')
    console.log($('form').serialize())
    $.ajax({
        url : "../includes/insert-credit-card.php",
        method: "POST",
        data : $('form').serialize(), // create the form to be passed
        dataType:"JSON"
    })
    .done(function(response){
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