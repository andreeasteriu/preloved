<?php
$sPageName = "Sign Up";
require_once(__DIR__ . '/../navigation/header.php');
  
 
?> 



    <link rel="stylesheet" href="sign-up.css">
       
<section class="body-sign-up">
    <div class="signup">
        <form id="fvSignup" class="signup-wrapper" action="../includes/signup.inc.php" method="POST">
        <div class="signup-bg-color">
        <h3 class="signup-title">
            Create an Account
        </h3>
        <div class="signup-inputs-grid">
        
        <div class="signup-inputs">
            
            <input class="signup-input" type="email" name="email" id="email" placeholder="Email*" maxlength="100" data-type="email">
            <input class="signup-input" type="text" name="firstName" id="firstname" placeholder="First Name*" maxlength="60" data-type="string" data-min="1" data-max="60">
            <input class="signup-input" type="text" name="lastName" id="lastname" placeholder="Last Name*" maxlength="60" data-type="string" data-min="1" data-max="60">
            <input class="signup-input" type="text" name="userName" id="uid" placeholder="Username*" maxlength="60" data-type="string" data-min="1" data-max="60">
            <input class="signup-input" type="password" name="password" id="password" placeholder="Password*" minlength="6" maxlength="255" data-min="6" data-max="255" data-type="string">
            <input class="signup-input" type="password" name="repeatPassword" id="password-repeat" placeholder="Repeat Password*" minlength="6" maxlength="255" data-min="6" data-max="255" data-type="string">
            <input class="signup-input" type="number" name="phoneNr" id="phonenr" placeholder="Phone Nr.*" minlength="8" maxlength="8" data-min="8" data-max="8" data-type="string">
            <input class="signup-input" type="text" name="address" id="address" placeholder="Address*" maxlength="100" data-type="string" data-min="5" data-max="100">
            <div id="error_message"></div>
        </div>
        </div>
        </div>
        <button id="submit_customer_button" type="submit" name="signup-submit" class="signup-button" onclick="fvSignup(this); return false">Next</button>
    </form>
    </div>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('#submit_customer_button').click(function(event){
    event.preventDefault()
    // console.log('test')
    // console.log($('form').serialize())
    $.ajax({
        url : "../includes/signup.inc.php",
        method: "POST",
        data : $('form').serialize(), // create the form to be passed
        dataType:"JSON"

    })
    .done(function(response){
        if( response.status == 1 ){
            window.location='../login/login.php'
        }else{
            $('#error_message').text(response.message)
        }
        console.log(response)
    })
    .fail(function(fail){
        $('#error_message').text(fail.message)
    })

})

</script>
<script src="../validate.js"></script>
<?php require_once(__DIR__ . '/../footer/footer.php'); ?> 