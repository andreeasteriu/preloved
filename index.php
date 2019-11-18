<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles/index.sass">

  <div id="main_picture">
    <div id='picture'>
    <div id="title">PRELOVED.</div>
    <div id='title_description'>Another journey chamber way yet females man.</div>
<div id="row1">
    <div id="column1">
      <div id='title1'>BUY</div>
      <div id='text1'>Another journey chamber way yet females man.</div>
    </div>
    <div id="column1">
      <div id='title2'>SELL</div>
      <div id='text2'>Another journey chamber way yet females man.</div>
    </div>

    </div> 
    </div> 
</div>

<div id='category'>CATEGORIES.</div>
<div id="category_grid">
<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Column 1</h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Column 2</h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Column 3</h2>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Column 4</h2>
  </div>
</div>

<div class="row">
  <div class="column" style="background-color:#ccc;">
    <h2>Column 5</h2>
  </div>
  <div class="column" style="background-color:#ddd;">
    <h2>Column 6</h2>
  </div>
  <div class="column" style="background-color:#ddd;">
    <h2>Column 7</h2>
  </div>
  <div class="column" style="background-color:#ddd;">
    <h2>Column 8</h2>
  </div>
</div>
</div>
<script>

// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}


</script>

</body>
</html>