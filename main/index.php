<?php
session_start();
if(isset($_SESSION['user'])){
    require_once(__DIR__ . '/../login/login-header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
  
  } else if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');

  }
?>   

<link rel="stylesheet" href="index.css">

  <div id="main_picture">
    <div id='picture' style="background-image: url('../pictures/0.png');">
    <div id="main_title"><span style="color: #e6e6e6;">PRE</span><span style="color: #e8a798;">LOVED.</span></div>
    <div id='title_description'>Another journey chamber way yet females man.</div>
<div id="main_row">
    <div id="main_column1">
      <div id='title1'>     
        <div class="main_description"><a href="url">BUY</a></div>
</div>
      <div id='text1'>Another journey chamber way yet females man.</div>
    </div>
    <div id="main_column2">
      <div id='title2'> 
      <div class="main_description"><a href="url">SELL</a></div>
</div>
      <div id='text2'>Another journey chamber way yet females man.</div>
    </div>

    </div> 
    </div> 
</div>

<div id='category'><span style="color: #e6e6e6;">CAT</span><span style="color: #e8a798;">EGORIES.</span></div>
<div class="category_grid">
  <div class="column" style="background-image: url('../pictures/1.png');">
  <div class="cat_title"><a href="url">JEANS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/2.png');">
  <div class="cat_title"><a href="url">T-SHIRTS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/3.png');">
  <div class="cat_title"><a href="url">JACKETS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/4.png');">
  <div class="cat_title"><a href="url">SKIRTS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/5.png');">
  <div class="cat_title"><a href="url">HOODIES</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/6.png');">
  <div class="cat_title"><a href="url">KNITS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/7.png');">
  <div class="cat_title"><a href="url">PANTS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/8.png');">
  <div class="cat_title"><a href="url">DRESSES</a></div>
</div>

</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  
