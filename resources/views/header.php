




<link rel="stylesheet" href="/exercise/layouts/css/header.css">

  <style>
    <?php include('./public/css/header.css') ?>
  </style>
<?php session_start(); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary navStyles">
  <div class="container-fluid">
  <a class="navbar-brand" href="./home.php"><img class="logoStyle rounded-circle" src="./public/img/logo/loginLogo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="./home.php">Home</a>
        </li>

        <?php if(isset($_SESSION['learning_pure_php'])) {


$userEmailSession = $_SESSION['learning_pure_php'];

$host = "127.0.0.1:3306";
$user = "root";
$pass = "admin357159";
$db = "learning_pure_php";
$conn = mysqli_connect($host,$user,$pass,$db);

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
          <span class="userNameStyleHeader">  <?php  echo  ucwords($userNameRow);echo"</span>"; echo " <img class='rounded-circle userPhotoHeader' src='./public/img/profile/$userPhoto' alt=''>"; ?>
            </a>
         
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php 
          if(isset($_SESSION['learning_pure_php'])) {
            echo "./profile.php";
          } elseif(!isset($_SESSION['learning_pure_php'])) {
            echo "./login.php";
          }
          ?>">Profile</a></li>
           <li><a  class="dropdown-item" href="./exercise1.php">Density Calculus</a></li>
              <li><hr class="dropdown-divider"></li>
            
          
              <li><a  class="dropdown-item" href="./logout.php">Log Out</a></li>
              
             
            </ul>
          </li>
       <?php } else { ?>

<li class="nav-item">
<a class="nav-link active" aria-current="page" href="./login.php">Login</a>
</li>

   <?php   } ?>
       
      




    
      </ul>
    </div>
  </div>
</nav>