<?php
include('links/header.html');
?>
<html>
<head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
    <h1 class="view">WELCOME TO THE STORE</h1>
    <h2 class="w3-center">Best Mobiles</h2>
<div class="center">
    <img class="slideshow" src="images/samsungten.jpg" style="width:50%  height:50%">
    <img class="slideshow" src="images/s10 plus.jpg" style="width:50% height:50%">
    <img class="slideshow" src="images/xr.png" style="width:50% height:50%">
    <img class="slideshow" src="images/11.png" style="width:50% height:50%">
    <img class="slideshow" src="images/11 pro.png" style="width:50% height:50%">
</div>
<div class="center">
<div class="section">
    <button class="btn light-grey" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="btn light-grey" onclick="plusDivs(1)">Next ❯</button>
</div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slideshow");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>
</body>
    <?php include('links/footer.html');
    ?>
</html>
