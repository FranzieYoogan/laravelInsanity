<?php include('header.php'); ?>
<?php include('head.inc.php');

$opacity = false;
$userState = '';
?>



<style>
  <?php include('./public/css/signUp.css'); ?>
  <?php include('./public/css/header.css'); ?>
  <?php include('./public/css/error.css'); ?>
  <?php include('./public/css/footer.css'); ?>
</style>

<?php



if (isset($_POST['submit'])) {
  include('connection.php');
  $userName = $_POST['userName'];
  $userPassword = $_POST['userPassword'];
  $userEmail = $_POST['userEmail'];
  $userAddress = $_POST['userAddress'];
  $userPostCode = $_POST['userPostCode'];
  $userMajor = $_POST['userMajor'];
  $userState = $_POST['userState'];
  $userInstitution = $_POST['userInstitution'];
  $userCpf = $_POST['userCpf'];
  $userPhone = $_POST['userPhone'];
  $userGender = $_POST['radioGender'];
  $userQuestion = $_POST['radio'];

  $passwordConfirmation = $_POST['passwordConfirmation'];
  $conn = mysqli_connect($host, $user, $pass, $db);
  $sql = "SELECT * from users WHERE userEmail = '$userEmail' AND userCpf = '$userCpf'";
  $resultSql = mysqli_query($conn, $sql);
  if ($passwordConfirmation == $userPassword && mysqli_num_rows($resultSql) == 0) {

    $query = "INSERT INTO users (userName, userPassword, userEmail, userCpf, userPhone, userQuestion, userMajor, userState, userPostCode, userInstitution, userAddress,userGender)
VALUES ('$userName','$userPassword','$userEmail','$userCpf','$userPhone','$userQuestion','$userMajor','$userState','$userPostCode','$userInstitution','$userAddress','$userGender');";

    $result = mysqli_query($conn, $query);
    echo "<div class='alert alert-success alertStyle' role='alert'>
  ACCOUNT CREATED SUCCESSFULLY!!
</div>";

    $opacity = true;

    echo " <script>

setTimeout(() => {
  window.location = './login.php';
},3000);

</script>";

  } elseif (!isset($result)) {


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










<section class="containerReset" id="containerReset">






  <form class="formSignUpStyle" action="" method="POST">
    <div class="card text-center cardStyle">
      <div class="card-header h5 text-white bg-primary titleStyle">ACCOUNT SIGNUP</div>
      <div class="card-body px-5">
        <div class="containerTutoSignup">
          <p class="tutoSignup">
            Enter your information for making your account
          </p>
        </div>
        <div class="form-outline inputEmail">
          <img class="imgStyle" src="./public/img/signUp/owl.gif" alt="">
          <input type="email" id="userEmail" name="userEmail" required class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="userEmail">Enter your EMAIL</label>
        </div>

        <div class="form-outline containerNameSpecial">
          <input type="text" id="userName" name="userName" pattern="[A-Za-z]{}" maxlength="30" minlength="3" required
            class="form-control my-3 inputResetStyle inputNameSpecial" />
          <label class="form-label labelResetStyle labelnameSpecial" for="userName">Enter your Name</label>


          <input type="radio" id="radioF" name="radioGender"  class="radioStyle" value="female" required>
          <label for="radioF"  class=""><img  class="genderStyle" id="genderStyleF" src="./public/img/profile/female.png" alt=""></label>

          <input type="radio" id="radioM" name="radioGender"  class="radioStyle" value="male" required>
          <label for="radioM" class=""><img class="genderStyle" id="genderStyleM" src="./public/img/profile/male.png" alt=""></label>

          <input type="radio" id="radioE" name="radioGender" class="radioStyle" value="enby" required>
          <label for="radioE" class=""><img class="genderStyle" id="genderStyleE" src="./public/img/profile/enby.png" alt=""></label>

  <script>


  let radioF = document.getElementById('radioF');

radioF.addEventListener("focus", (event) => {
let focusF = true;
let focusE = false;
let focusM = false;

if(focusF = true) {
  document.getElementById('genderStyleF').style.border = '2px solid rgb(255, 161, 177)';
  document.getElementById('genderStyleF').style.borderRadius = '40px';
  document.getElementById('genderStyleF').style.padding = '5px';
  document.getElementById('genderStyleF').style.boxShadow = '2px 2px 2px #EF7D00';


  document.getElementById('genderStyleM').style.border = '1px solid transparent';
  document.getElementById('genderStyleM').style.borderRadius = '40px';
  document.getElementById('genderStyleM').style.padding = '0px';
  document.getElementById('genderStyleM').style.boxShadow = '2px 2px 2px black';


  document.getElementById('genderStyleE').style.border = '1px solid transparent';
  document.getElementById('genderStyleE').style.borderRadius = '40px';
  document.getElementById('genderStyleE').style.padding = '0px';
  document.getElementById('genderStyleE').style.boxShadow = '1px 1px 1px black';

}
});


let radioM = document.getElementById('radioM');

radioM.addEventListener("focus", (event) => {
let focusM = true;
let focusE = false;
let focusF = false;

if(focusM = true) {
  document.getElementById('genderStyleM').style.border = '2px solid rgb(182, 216, 232)';
  document.getElementById('genderStyleM').style.borderRadius = '40px';
  document.getElementById('genderStyleM').style.padding = '5px';
  document.getElementById('genderStyleM').style.boxShadow = '2px 2px 2px #EF7D00';


  document.getElementById('genderStyleF').style.border = '1px solid transparent';
  document.getElementById('genderStyleF').style.borderRadius = '40px';
  document.getElementById('genderStyleF').style.padding = '0px';
  document.getElementById('genderStyleF').style.boxShadow = '2px 2px 2px black';


  document.getElementById('genderStyleE').style.border = '1px solid transparent';
  document.getElementById('genderStyleE').style.borderRadius = '40px';
  document.getElementById('genderStyleE').style.padding = '0px';
  document.getElementById('genderStyleE').style.boxShadow = '1px 1px 1px black';
 
}
});


let radioE = document.getElementById('radioE');

radioE.addEventListener("focus", (event) => {
  let focusE = true;
let focusM = false;
let focusF = false;

if(focusE = true) {
  document.getElementById('genderStyleE').style.border = '2px solid rgb(254, 215, 254)';
  document.getElementById('genderStyleE').style.borderRadius = '40px';
  document.getElementById('genderStyleE').style.padding = '5px';
  document.getElementById('genderStyleE').style.boxShadow = '1px 1px 1px #EF7D00';


  document.getElementById('genderStyleF').style.border = '1px solid transparent';
  document.getElementById('genderStyleF').style.borderRadius = '40px';
  document.getElementById('genderStyleF').style.padding = '0px';
  document.getElementById('genderStyleF').style.boxShadow = '2px 2px 2px black';

  document.getElementById('genderStyleM').style.border = '1px solid transparent';
  document.getElementById('genderStyleM').style.borderRadius = '40px';
  document.getElementById('genderStyleM').style.padding = '0px';
  document.getElementById('genderStyleM').style.boxShadow = '2px 2px 2px black';
 
}
});

   



    


  </script>

        </div>




        <div class="form-outline">
          <input type="text" id="userCpf" name="userCpf" pattern="[0-9]{11}" maxlength="11" minlength="11" required
            class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="userCpf">Enter your CPF</label>
        </div>

        <div class="form-outline">
          <input type="text" id="userPhone" name="userPhone" pattern="[0-9]{11}" maxlength="11" minlength="11" required
            class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="userPhone">Enter your Phone</label>
        </div>

        <div class="form-outline">
          <input type="text" id="userAddress" name="userAddress" pattern="[\w\W]+)\s(\d+)" maxlength="35" required
            class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="userAddress">Enter your Address</label>
        </div>

        <div class="form-outline">
          <input type="text" id="userPostCode" name="userPostCode" pattern="[0-9]{8}" maxlength="8" minlength="8"
            required class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="userPostCode">Enter your PostCode</label>
        </div>

        <div class="form-outline">
          <input type="password" id="userPassword" name="userPassword" minlength="8" maxlength="8" required
            class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="userPassword">Password</label>
        </div>

        <div class="form-outline">
          <input type="password" id="PasswordConfirmation" name="passwordConfirmation" minlength="8" maxlength="8"
            required class="form-control my-3 inputResetStyle" />
          <label class="form-label labelResetStyle" for="PasswordConfirmation">Confirm Password</label>
        </div>

        <section class="containerSelectSignUp">

          <select class="form-select selectStyleSignUp" name="userMajor" id="userMajor" required>

            <option selected>Select your desirable major</option>
            <option value="frontend" class="optionStyle">FRONTEND</option>
            <option value="backend" class="optionStyle">BACKEND</option>
            <option value="fullstack" class="optionStyle">FULLSTACK</option>

          </select>



          <select class="form-select selectStyleSignUpState" name="userState" id="userState" required>
            <option selected class="optionStyle">State</option>
            <option value="RJ" class="optionStyle">RJ</option>
            <option value="SP" class="optionStyle">SP</option>


          </select>


          <script>

            const selectElement = document.getElementById("userState");
            const result = document.querySelector(".result");

            selectElement.addEventListener("change", (event) => {
              let result = event.target.value;

              if (result == 'RJ') {

                document.getElementById('userInstitutionRJ').style.display = 'block';
                document.getElementById('userInstitutionSP').style.display = 'none';

              } if(result == 'SP') {
                document.getElementById('userInstitutionSP').style.display = 'block';
                document.getElementById('userInstitutionRJ').style.display = 'none';
              }
            });

          </script>







          <select class="form-select selectStyleSignUpInstitution" name="userInstitution" id="userInstitutionRJ"  required
            style="display: none;">

            <option disabled selected>Select your unity</option>
            <option value="Bangu" class="optionStyle">BANGU</option>
            <option value="Niteroi" class="optionStyle">NITERÓI</option>


          </select>


          <select class="form-select selectStyleSignUpInstitution" name="userInstitution" id="userInstitutionSP" required
            style="display: none;">

            <option disabled selected>Select your unity</option>
            <option value="JardimPaulista" class="optionStyle">JARDIM PAULISTA</option>
            <option value="Adamantina" class="optionStyle">ADAMANTINA</option>


          </select>


        </section>


        <section class="containerRadio">

          <p class="pStyle">Would you finish Undertale as a...</p>
          <input type="radio" class="btn-check checkPacifist" name="radio" value="pacifist" id="radioPacifist" required>
          <label class="btn pacifist" for="radioPacifist">PACIFIST</label>


          <input type="radio" class="btn-check checkWarmonger" name="radio" value="warmonger" id="radioWarmonger" required>
          <label class="btn warmonger" for="radioWarmonger">WARMONGER</label>

        </section>



        <div>
          <input type="submit" name="submit" id="submit" value="SEND YOUR INFORMATIONS"
            class="btn btn-primary w-100 resetButtonStyle" />



        </div>

      </div>
    </div>





  </form>


  <?php if ($opacity == true) { ?>
    <script>


      document.getElementById('containerReset').style.opacity = 0.3;

    </script>

  <?php } ?>

</section>


<?php include('footer.php') ?>