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
        <a href="url"><h1>BUY</h1></a>
</div>
      <div id='text1'>Another journey chamber way yet females man.</div>
    </div>
    <div id="main_column2">
      <div id='title2'> 
         <a href="url"><h1>SELL</h1></a>
</div>
      <div id='text2'>Another journey chamber way yet females man.</div>
    </div>

    </div> 
    </div> 
</div>

<div id='category'><span style="color: #e6e6e6;">CAT</span><span style="color: #e8a798;">EGORIES.</span></div>
<div class="category_grid">
  <div class="column" style="background-image: url('../pictures/1.png');">
  <a href="url"><h2>JEANS</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/2.png');">
  <a href="url"><h2>T-SHIRTS</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/3.png');">
  <a href="url"><h2>JACKETS</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/4.png');">
  <a href="url"><h2>SKIRTS</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/5.png');">
  <a href="url"><h2>HOODIES</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/6.png');">
  <a href="url"><h2>KNITS</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/7.png');">
  <a href="url"><h2>PANTS</h2></a>
  </div>
  <div class="column" style="background-image: url('../pictures/8.png');">
  <a href="url"><h2>DRESSES</h2></a>
</div>

</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  
