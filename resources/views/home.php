<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <?php include('head.inc.php')  ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/home.css">

        <title>Testing</title>

      
    </head>
    <body class="antialiased">
  
    <?php include('header.php') ?>
        
    <section class="containerAllHome">
<audio id='forgingSound' controls autoplay loop style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='img/home/adventureTimeSong.mp4'>
  </audio>

  <script>

let audio = document.getElementById("forgingSound");
audio.volume = 0.1;

  </script>
    
<h1 class="textHomeStyle"> PEOPLE WILL BE PEOPLE IT DOESN'T MATTER THE PLACE . . . THEN KEEP PUSHING IT AND
     <span style="border-bottom: 3px solid red;">BE YOURSELF</span> ANYWAY ^-^ </h1>

</section>

    <?php include('footer.php') ?>

    </body>
</html>



