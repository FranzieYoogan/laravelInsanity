<?php include('header.php') ?>
<?php include('head.inc.php') ?>
<style>

    <?php
   include('./public/css/header.css');
   include('./public/css/footer.css');
   include('./public/css/location.css');
    ?>


<?php 

if (isset($_SESSION['learning_pure_php'])) {

    include('connection.php');
    $conn = mysqli_connect($host, $user, $pass, $db);
    $userEmail = $_SESSION['learning_pure_php'];
    $query = "SELECT * from users WHERE userEmail = '$userEmail'";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) == 1) {
      while ($row = mysqli_fetch_assoc($result)) {

        $userInstitutionRow = $row['userInstitution'];

      }
    }
}

?>
</style>



    <section class="containerMap">




    <?php if($userInstitutionRow == 'Adamantina')  { ?>
        <iframe class="iframeStyles" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3707.516102966841!2d-51.081677525496175!3d-21.682673395270886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9496a3e6148bc7ef%3A0x841d9125f1bc0156!2sVia%20Sabor%20Panificadora!5e0!3m2!1sen!2sbr!4v1699722410103!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

       
   
   
            <?php }  ?>

            
    <?php if($userInstitutionRow == 'JardimPaulista')  { ?>


        <iframe class="iframeStyles" src="https://www.google.com/maps/d/embed?mid=1P0Lrzfxhi6d2kP0ZUwE8AYzKeBc&hl=en_US&ehbc=2E312F" width="640" height="480"></iframe>


    <?php }  ?>

    <?php if($userInstitutionRow == 'Bangu')  { ?>


        <iframe class="iframeStyles" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.9045723287745!2d-43.4689565!3d-22.879983300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bdfe95c06e969%3A0xb838323b6e729122!2sUNISUAM%20Bangu!5e0!3m2!1sen!2sbr!4v1699428763641!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


    <?php }  ?>


    <?php if($userInstitutionRow == 'Niteroi')  { ?>


        <iframe class="iframeStyles" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.5294805557446!2d-43.12336662536908!3d-22.893833437406926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9983c39a1b684b%3A0x804d9e092faf5176!2sAv.%20Ernani%20do%20Amaral%20Peixoto%2C%20286%20-%20Centro%2C%20Niter%C3%B3i%20-%20RJ%2C%2024020-076!5e0!3m2!1sen!2sbr!4v1699428806078!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <?php }  ?>
   

   




    </section>

    <?php include('footer.php') ?>
