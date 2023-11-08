


<?php include('head.inc.php')  ?>
<?php include('header.php')  ?>


<?php
$opacity = false;
 include('connection.php');

if($_POST){
  $userEmail = $_POST['userEmail'];
  $userPassword = $_POST['userPassword'];
  $conn = mysqli_connect($host,$user,$pass,$db);
  $query = "SELECT * from users WHERE userEmail = '$userEmail' and userPassword= '$userPassword'";
  $result = mysqli_query($conn,$query);
  
  if(mysqli_num_rows($result) == 1) {

    while ($row = $result->fetch_assoc()) {

      $userName = $row['userName'];


  
  }
    session_start();
    $_SESSION['learning_pure_php'] = 'true';
    $_SESSION['learning_pure_php'] = $userName;
    $_SESSION['learning_pure_php'] = $userEmail;
  echo"
    <script>

    window.location.href = 'profile.php';

  </script>
";

  } else  {
  

    $opacity = true;



  }
}

?>

  <style>

    <?php 
    
    include('./public/css/login.css');
    include('./public/css/error.css');
    include('./public/css/header.css');
    include('./public/css/footer.css');
    ?>



  </style>


<section class='containerError' id='containerError'>

  
<div class='alert alert-danger containerSpan' role='alert'>

   <a href='./login.php' class='linkStyle' id='linkStyle'> <iconify-icon icon='bxs:left-arrow-circle'  class='iconStyle' style='color: rgb(252, 168, 168);'></iconify-icon></a>
   <h1 class='textStyleError'> Your <span class='spanStyle'>LOGIN</span> have been <span class='spanStyle'>FAILED!!</span></h1>

  </div>



</section>

  




  <section id="allThingsTogether" class="allThingsTogether">
<section id="containerLogin" class="containerLogin">
    <div id="opacityBackground" class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5" style="position: relative; display: block;">
          <img class="imageStyle" src="./public/img/logo/loginLogo.png"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form id="containerFormLogin"  method="POST" action="">
           
 
  
            <!-- Email input -->
            <div class=" mb-4">
              <div class="containerImg">
                <img class="imgStyle" src="./public/img/signUp/owl.gif" alt="">
              </div>
              <input type="text"   name="userEmail" id="userEmail"  required   class="form-control form-control-lg inputStyle"
                placeholder="Enter UserEmail" />
            
            </div>
  
            <!-- Password input -->
            <div class="form mb-3">
              <input type="password" maxlength="8" type="password" name="userPassword" id="userPassword" required  class="form-control form-control-lg inputStyle"
                placeholder="Enter password" />
            
            </div>
  
            <div class="d-flex justify-content-end align-items-center containerForgot">
              
            
              <a href="./changePassword.php" class="linkForgot">Forgot password?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit"  class="btn btn-primary btn-lg buttonStyle" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                Login</button>

          
             
              <p class="small fw-bold mt-2 pt-1 mb-0 ">If you don't have an account, <a href="./signUp.php"
                  class=" linkStyle">Sign Up</a></p>

              
               
            </div>
  
          </form>
      
     

    
      
        </div>
      </div>
    </div>
    
  </section>
                 

  

<!-- // if ($userName && $userName ==  $row['userName'] && $userPassword && $userPassword == $row['userPassword']) {

//       $dashboard = $userName;
//     "<script>localStorage.setItem(userName, $dashboard)</script>";
    
// }  else {
//     echo "ERROR ERROR";
// }
?> -->               


                
                </form>
              



                </section>
        

                <?php if($opacity == true) { ?>
          <script> 


document.getElementById('allThingsTogether').style.opacity = 0.3;  
document.getElementById('containerError').style.visibility = 'visible';  







 
  </script> 

<?php } ?>

         <?php include('footer.php')  ?>
        
         
        