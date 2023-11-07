

<?php include('./header.php'); ?>
<?php include('./head.inc.php'); 

  $opacity = false;

?>



<style>

    <?php include('css/signUp.css'); ?>
    <?php include('css/header.css'); ?>
     <?php include('css/error.css'); ?> 
    <?php include('css/footer.css'); ?>
</style>




  <section class="containerReset" id="containerReset">


  



  <form class="formSignUpStyle" action="" method="POST">    
              <div class="card text-center cardStyle">
    <div class="card-header h5 text-white bg-primary titleStyle">ACCOUNT SIGNUP</div>
    <div class="card-body px-5">
        <div class= "containerTutoSignup">
        <p class="tutoSignup">
            Enter your information for making your account
        </p>
        </div>
        <div class="form-outline inputEmail">
        <img class="imgStyle" src="img/signUp/owl.gif" alt="">
            <input type="email" id="userEmail" name="userEmail" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userEmail">Enter your EMAIL</label>
        </div>

        <div class="form-outline">
            <input type="text" id="userName" name="userName" pattern="[A-Za-z]{}" maxlength="30" minlength="3" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userName">Enter your Name</label>
        </div>

        <div class="form-outline">
            <input type="text" id="userCpf" name="userCpf" pattern="[0-9]{11}" maxlength="11" minlength="11" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userCpf">Enter your CPF</label>
        </div>

        <div class="form-outline">
            <input type="text" id="userPhone" name="userPhone" pattern="[0-9]{11}" maxlength="11" minlength="11" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userPhone">Enter your Phone</label>
        </div>

        <div class="form-outline">
            <input type="text" id="userAddress" name="userAddress" pattern="[\w\W]+)\s(\d+)" maxlength="35" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userAddress">Enter your Address</label>
        </div>

        <div class="form-outline">
            <input type="text" id="userPostCode" name="userPostCode" pattern="[0-9]{8}" maxlength="8" minlength="8" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userPostCode">Enter your PostCode</label>
        </div>

        <div class="form-outline">
            <input type="password" id="userPassword" name="userPassword" minlength="8" maxlength="8" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="userPassword">Password</label>
        </div>

        <div class="form-outline">
            <input type="password" id="PasswordConfirmation" name="passwordConfirmation" minlength="8" maxlength="8" required class="form-control my-3 inputResetStyle" />
            <label class="form-label labelResetStyle" for="PasswordConfirmation">Confirm Password</label>
        </div>

      <section class="containerSelectSignUp">

        <select class="form-select selectStyleSignUp" name="userMajor" id="userMajor" required>
         
  <option selected>Select your desirable major</option>
  <option value="frontend" class="optionStyle">FRONTEND</option>
  <option value="backend" class="optionStyle">BACKEND</option>
  <option value="fullstack" class="optionStyle">FULLSTACK</option>
 
</select>

<select class="form-select selectStyleSignUpState" name="userState" id="userState" >
         
         <option selected value="RJ" class="optionStyle">RJ</option>
         <option value="SP" class="optionStyle">SP</option>
         
        
       </select>

       </section>


        <section class="containerRadio">

<p class="pStyle">Would you finish Undertale as a...</p>
<input type="radio" class="btn-check checkPacifist" name="radio" value="pacifist" id="radioPacifist" checked >
<label class="btn pacifist" for="radioPacifist">PACIFIST</label>


<input type="radio" class="btn-check checkWarmonger" name="radio" value="warmonger" id="radioWarmonger" >
<label class="btn warmonger" for="radioWarmonger">WARMONGER</label>

</section>
        <div>
        <input type="submit" name="submit" id="submit" value="SEND YOUR INFORMATIONS" class="btn btn-primary w-100 resetButtonStyle"/>

      

</div>

    </div>
</div>

   



</form>




      </section>



      <?php



if(isset($_POST['submit'])){
$host = "127.0.0.1:3306";
$user = "root";
$pass = "admin357159";
$db = "learning_pure_php";
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];
$userEmail = $_POST['userEmail'];
$userAddress = $_POST['userAddress'];
$userPostCode = $_POST['userPostCode'];
$userMajor = $_POST['userMajor'];
$userState = $_POST['userState'];
$userCpf = $_POST['userCpf'];
$userPhone = $_POST['userPhone'];
$userQuestion = $_POST['radio'];

$passwordConfirmation = $_POST['passwordConfirmation'];
$conn = mysqli_connect($host,$user,$pass,$db);
$sql = "SELECT * from users WHERE userEmail = '$userEmail' AND userCpf = '$userCpf'";
$resultSql = mysqli_query($conn,$sql);
if($passwordConfirmation == $userPassword && mysqli_num_rows($resultSql) == 0) {

  $query = "INSERT INTO users (userName, userPassword, userEmail, userCpf, userPhone, userQuestion, userMajor, userState, userPostCode, userAddress)
VALUES ('$userName','$userPassword','$userEmail','$userCpf','$userPhone','$userQuestion','$userMajor','$userState','$userPostCode','$userAddress');";

  $result = mysqli_query($conn,$query);
  echo "<div class='alert alert-success alertStyle' role='alert'>
  ACCOUNT CREATED SUCCESSFULLY!!
</div>";

$opacity = true;

echo" <script>

setTimeout(() => {
  window.location = './login.php';
},3000);

</script>";

} elseif(!isset($result)){


  $opacity = true;
  
  echo "<section class='containerError' id='containerError' style='visibility: visible;'>

  
  <div class='alert alert-danger containerSpan' role='alert'>
  
     <a href='./signUp.php' class='linkStyle' id='linkStyle'> <iconify-icon icon='bxs:left-arrow-circle'  class='iconStyle' style='color: rgb(252, 168, 168);'></iconify-icon></a>
     <h1 class='textStyleError'> Your <span class='spanStyle'>SIGNUP</span> have been <span class='spanStyle'>FAILED!!</span></h1>
  
    </div>
  
  
  
  </section>";
  
  
  
  



}
  
}





?>



<?php if($opacity == true) { ?>
          <script> 


document.getElementById('containerReset').style.opacity = 0.3;  

  </script> 

<?php } ?>

 

  <?php include('./footer.php') ?>
