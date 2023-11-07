<?php include('./header.php') ?> 
<?php  include('./head.inc.php')  ?>
<?php error_reporting(E_ALL ^ E_WARNING);  ?>


    <style>

<?php include('css/footer.css') ?> 
<?php include('css/header.css') ?> 
<?php include('css/changePassword.css') ?> 

    </style>







      <section class="containerReset">

        <form class="formStyleChangePassword" action="" method="POST">    
              <div class="card text-center cardStyle">
    <div class="card-header h5 text-white bg-primary titleStyle">Password Reset</div>
    <div class="card-body px-5">
    <div class= "containerTutoSignup">
        <p class="tutoSignup">
            Enter your information for making your account
        </p>
        </div>
        <div class="form-outline inputEmail">
        <img class="imgStyle" src="img/signUp/owl.gif" alt="">
            <input type="email" id="typeEmail" name="userEmail" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="typeEmail">Enter your EMAIL</label>
        </div>

        <div class="form-outline">
            <input type="text" id="typeCPF" name="userCpf" pattern="[0-9]{11}" maxlength="11" minlength="11" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="typeCPF">Enter your CPF</label>
        </div>

        <div class="form-outline">
            <input type="password" id="typePassword" name="userPassword" minlength="8" maxlength="8" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="typePassword">NEW Password</label>
        </div>

        <div class="form-outline">
            <input type="password" id="typePasswordConfirmation" name="passwordConfirmation" minlength="8" maxlength="8" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="typePasswordConfirmation">Confirm Password</label>
        </div>


        <section class="containerRadio">

<p class="pStyle">Would you finish Undertale as a...</p>
<input type="radio" class="btn-check checkPacifist" name="radio" value="pacifist" id="radioPacifist" checked >
<label class="btn pacifist" for="radioPacifist">PACIFIST</label>


<input type="radio" class="btn-check checkWarmonger" name="radio" value="warmonger" id="radioWarmonger" >
<label class="btn warmonger" for="radioWarmonger">WARMONGER</label>

</section>
        <div>
        <input type="submit" name="submit" value="RESET YOUR PASSSWORD" class="btn btn-primary w-100 resetButtonStyle"/>

      

</div>

    </div>
</div>
</form>




      </section>



      <?php

if($_POST && isset($_POST['submit'])){
  $host = "127.0.0.1:3306";
  $user = "root";
  $pass = "admin357159";
  $db = "learning_pure_php";

  $userPassword = $_POST['userPassword'];
  $userEmail = $_POST['userEmail'];
  $userCpf = $_POST['userCpf'];
$passwordConfirmation = $_POST['passwordConfirmation'];
  $userQuestion = $_POST['radio'];



  $passwordConfirmation = $_POST['passwordConfirmation'];
  $conn = mysqli_connect($host,$user,$pass,$db);
  $sql = "SELECT * FROM users WHERE userEmail = '$userEmail' AND userCpf = '$userCpf' AND userQuestion = '$userQuestion'";
  $resultSql = mysqli_query($conn,$sql);
  if($passwordConfirmation == $userPassword and mysqli_num_rows($resultSql) == 1) {

    $query = "UPDATE users
SET userPassword='$userPassword' WHERE userEmail = '$userEmail' AND userCpf = '$userCpf' AND userQuestion = '$userQuestion'";

    $result = mysqli_query($conn,$query);

   
  

    
    
        echo "<div class='alert alert-success alertStyle' role='alert'>
        PASSWORD CHANGED SUCCESSFULLY!!
      </div>";

  

    echo" <script>

    setTimeout(() => {
        window.location = './login.php';
    },3000);
   
    </script>";

header("Location: login.php");

  
  } else {
  
    echo "<div class='alert alert-danger alertStyle' role='alert'>
    ERROR!! COULD YOU TRY IT AGAIN?
  </div>";



echo" <script>

setTimeout(() => {
    window.location = './changePassword.php';
},3000);

</script>";

header("Location: login.php");
  }
    

    }

 

?>







<?php include('./footer.php') ?> 