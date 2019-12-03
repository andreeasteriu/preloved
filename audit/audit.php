<?php
session_start();
if(isset($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
}
?> 
<link rel="stylesheet" href="audit.css">


<div class="audit_box">
<div class="audit_info">THANK YOU FOR CHOOSING <span style="color: #e6e6e6;">PRE</span><span style="color: #e8a798;">LOVED. </span>PRODUCT</div>
<div class="audit_product">KNITTED CARDIGAN WITH BUTTONS</div>
<div class="audit_price">200 DKK</div>
<div class="audit_text">Pick up the item at</div>
<div class="audit_text2">WAREHOUSE 1</div>
<div class="audit_text3">Lygten 16, 2300 Copenahgen S</div>
<div class="audit_choice">Choose the card to proceed with the payment</div>

<div class="checkbox">
<label><input value="1" name="subject" class="subject-list" type="checkbox" onclick="onlyOne(this)"> CARD 1</label>
<label><input value="2" name="subject" class="subject-list" type="checkbox" onclick="onlyOne(this)"> CARD 2</label>
</div>
<form action="#">
<div class="audit_button"><button>COMPLETE</button></div>
</form>
</div>
<script>
  function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('subject')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  
