

<?php include('head.inc.php')  ?>


  <script>

    let active = false;

  </script>

<link rel="stylesheet" href="/css/header.css">

<?php session_start(); ?>


<nav class="navbar navbar-expand-lg  navStyles">
  <div class="container-fluid">
  <a class="navbar-brand" href="home.php"><img class="logoStyle rounded-circle" src="img/logo/loginLogo.png" alt=""></a>
    <button class="navbar-toggler" id="toggler" onclick="untoggler()" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/">Home</a>
        </li>

        <?php if(isset($_SESSION['learning_pure_php'])) {


$userEmailSession = $_SESSION['learning_pure_php'];

include('connection.php');

$query = "SELECT * from users WHERE userEmail = '$userEmailSession'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1) {

  while ($row = mysqli_fetch_assoc($result) ){

    $userNameRow = $row['userName'];
    $userPhoto = $row['userPhoto'];

  }

}


          ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="userNameStyleHeader">  <?php  echo  ucwords($userNameRow);echo"</span>"; echo " <img class='rounded-circle userPhotoHeader' src='$userPhoto' alt=''>"; ?>
            </a>
         
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php 
          if(isset($_SESSION['learning_pure_php'])) {
            echo "profile.php";
          } elseif(!isset($_SESSION['learning_pure_php'])) {
            echo "login.php";
          }
          ?>">Profile</a></li>
           <li><a  class="dropdown-item" href="/exercise1">Density Calculus</a></li>
              <li><hr class="dropdown-divider"></li>
            
          
              <li><a  class="dropdown-item" href="/logout">Log Out</a></li>
              
             
            </ul>
          </li>
       <?php } else { ?>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="/login">Login</a>
</li>

   <?php   } ?>
       
      

        <script>

          function untoggler() {

      

         
            document.getElementById('toggler').addEventListener("click", function()
    {
        menu = document.getElementById("navbarNav");
        if (menu.style.display == "none") {
            document.getElementById("navbarNav").style.display="block";
        } else {
            document.getElementById("navbarNav").style.display="none";
        }
    });
           
   
      

          }

        </script>


    
      </ul>
    </div>
  </div>
</nav>