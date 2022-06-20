<?php 
$title = 'Home';

include 'route.php';
include $tpl . 'header.inc';
include $tpl . 'nav.inc';
?>

<?php include $tpm . 'connect.php'; ?>

<div class="container">
<img src="https://source.unsplash.com/random" name="slide">
</div>
<script>

var i = 0;
var images = [
              'https://images.pexels.com/photos/546226/pexels-photo-546226.jpeg?auto=compress&cs=tinysrgb&dpr=1&fit=crop&h=500&w=500',
              'https://images.pexels.com/photos/1460670/pexels-photo-1460670.jpeg?auto=compress&cs=tinysrgb&dpr=1&fit=crop&h=500&w=500',
              'https://images.pexels.com/photos/709496/pexels-photo-709496.jpeg?auto=compress&cs=tinysrgb&dpr=1&fit=crop&h=500&w=500'] ;
var time = 2000;

function changeImg(){

document.slide.src = images[i];

if (i < images.length - 1) {
i++;
} else {
i = 0;
}
setTimeout("changeImg()", time);
}
window.onload = changeImg;

</script>

<?php include $tpl . 'footer.inc'; ?>