



<?php if(session_status() == 2) {

    include('dashboard.php');
} else{
    include('header.php');
} 
include('head.inc.php');


?>

<style>
    <?php 
    include('./public/css/home.css');
    include('./public/css/header.css');
    include('./public/css/footer.css');
    ?>

</style>

<section class="containerAllHome">
<audio id='forgingSound' controls autoplay loop style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/home/adventureTimeSong.mp4'>
  </audio>

  <script>

let audio = document.getElementById("forgingSound");
audio.volume = 0.1;

  </script>
    
<h1 class="textHomeStyle"> PEOPLE WILL BE PEOPLE IT DOESN'T MATTER THE PLACE . . . THEN KEEP PUSHING IT AND
     <span style="border-bottom: 3px solid red;">BE YOURSELF</span> ANYWAY ^-^ </h1>

</section>




<?php  include('./footer.php') ?>

