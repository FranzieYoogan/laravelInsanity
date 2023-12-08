<?php include('./head.inc.php') ?>
<?php include('./header.php') ?>




<?php
  $animation= false;
if (isset($_SESSION['learning_pure_php'])) {

  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userEmail = $_SESSION['learning_pure_php'];
  $query = "SELECT * from users WHERE userEmail = '$userEmail'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {

      $userNameRow = $row['userName'];
      $userIdRow = $row['userId'];
      $userMajorRow = $row['userMajor'];
      $userEmailRow = $row['userEmail'];
      $userCpf = $row['userCpf'];
      $userAddress = $row['userAddress'];
      $userPostCode = $row['userPostCode'];
      $userGender = $row['userGender'];
      $userInstitution = $row['userInstitution'];
      $userPhone = $row['userPhone'];
      $userPhoto = $row['userPhoto'];


      $stringUserPhone = $userPhone;




      $editUserPhone = '(' . $stringUserPhone[0] . $stringUserPhone[1] . ')' . substr($userPhone, 2, 11);

      $editUserCpf = substr($userCpf, 0, 3) . '.' . substr($userCpf, 3, 3) . '.' . substr($userCpf, 6, 3) . '-' . substr($userCpf, 9, 2);

      $editUserPostCode = substr($userPostCode, 0, 6) . '-' . substr($userPostCode, 6, 2);

      $resultStringUserPhone = $editUserPhone;

      $resultStringUserCpf = $editUserCpf;

      $resultStringUserPostCode = $editUserPostCode;

    }
  }




}
?>

<?php

include('connection.php');
$conn = mysqli_connect($host, $user, $pass, $db);


if (isset($_POST["submitInputProfile"]) and isset($_SESSION['learning_pure_php'])) {





  $file_name = $_FILES['file']['name'];
  $temp_name = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_destination = "./public/img/profile/upload/userProfile/" . $file_name;





  if (move_uploaded_file($temp_name, $file_destination)) {



    $query = "UPDATE users
SET userPhoto = '$file_destination'
WHERE userEmail = '$userEmailRow' ";
    $result = mysqli_query($conn, $query);
    $animation = true;
   



    echo " 
    <div style='position: relative;'>
    <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
    <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
    </audio>
    <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>
  
    </div> ;

";

    echo " <script>

  setTimeout(() => {

      window.location.href = 'profile.php';
 
  }, '2000'); 
  

  </script>

 ";




  } else {
    echo
      " <div style='position: relative;'> <p class='alertProfile' style='color: red;'>Photo haven't been changed ERROR!! <img class='alertImageProfile' src='img/profile/error.png'></p> </div>;
  
  <script>


  setTimeout(() => {
  
      window.location.href = './profile.php';
  }, '2000');


  </script>";


  }
}

?>


<?php


if (isset($_POST['submitUserNameChange'])) {

  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userEmail = $_SESSION['learning_pure_php'];
  $userNameChange = $_POST['userName'];

  if ($userNameChange != '') {




    $query = "UPDATE users
  SET userName = '$userNameChange' 
  WHERE userEmail = '$userEmail'";
    $resultQueryName = mysqli_query($conn, $query);


    if ($resultQueryName) {



      echo "


  <div style='position: relative;'>
  <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
  </audio>
  <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>

  </div>  ";



      echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";

    }
  } else {

  

    echo "  <div class='alert alert-danger alertStyle' role='alert'>
  ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
</div>";

    echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";



  }
}


  if (isset($_POST['submitUserPhoneChange'])) {

    include('connection.php');
    $conn = mysqli_connect($host, $user, $pass, $db);
    $userPhone = $_POST['userPhone'];
  
    if ($userPhone != '') {
  
  
  
  
      $queryPhone = "UPDATE users
    SET userPhone = '$userPhone' 
    WHERE userEmail = '$userEmail'";
      $resultQueryPhone = mysqli_query($conn, $queryPhone);
  
  
      if ($resultQueryPhone) {
  
  
  
        echo "
  
  
    <div style='position: relative;'>
    <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
    <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
    </audio>
    <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>
  
    </div>  ";
  
  
  
        echo "<script> 
    
    setTimeout(() => {
  
   
   
      window.location.href = 'profile.php';
  
  
      
      }, 2000) 
  
      </script>";
  
      }
    } else {
  
    
  
      echo "  <div class='alert alert-danger alertStyle' role='alert'>
    ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
  </div>";
  
      echo "<script> 
    
    setTimeout(() => {
  
   
   
      window.location.href = 'profile.php';
  
  
      
      }, 2000) 
  
      </script>";
  
  
  
    }

}

if (isset($_POST['submitUserAddressChange'])) {

  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userAddress = $_POST['userAddress'];

  if ($userPhone != '') {




    $queryAddress = "UPDATE users
  SET userAddress = '$userAddress' 
  WHERE userEmail = '$userEmail'";
    $resultQueryAddress = mysqli_query($conn, $queryAddress);


    if ($resultQueryAddress) {



      echo "


  <div style='position: relative;'>
  <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
  </audio>
  <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>

  </div>  ";



      echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";

    }
  } else {

  

    echo "  <div class='alert alert-danger alertStyle' role='alert'>
  ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
</div>";

    echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";



  }

}

if (isset($_POST['submitUserZipCodeChange'])) {

  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userZipCode = $_POST['userZipCode'];

  if ($userPhone != '') {




    $queryZipCode = "UPDATE users
  SET userPostCode = '$userZipCode' 
  WHERE userEmail = '$userEmail'";
    $resultQueryZipCode = mysqli_query($conn, $queryZipCode);


    if ($resultQueryZipCode) {



      echo "


  <div style='position: relative;'>
  <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
  </audio>
  <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>

  </div>  ";



      echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";

    }
  } else {

  

    echo "  <div class='alert alert-danger alertStyle' role='alert'>
  ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
</div>";

    echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";



  }

}

if (isset($_POST['submitUserUnityChangeRJ'])) {

  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userUnityRJ = $_POST['userInstitutionRJ'];

  if ($userUnityRJ) {




    $queryUnityRJ = "UPDATE users
  SET userInstitution = '$userUnityRJ' 
  WHERE userEmail = '$userEmail'";
    $resultQueryUnity = mysqli_query($conn, $queryUnityRJ);


    if ($resultQueryUnity) {



      echo "


  <div style='position: relative;'>
  <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
  </audio>
  <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>

  </div>  ";



      echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";

    }
  } else {

  

    echo "  <div class='alert alert-danger alertStyle' role='alert'>
  ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
</div>";

    echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";



  }

}


if (isset($_POST['submitUserUnityChangeSP'])) {
  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userUnitySP = $_POST['userInstitutionSP'];

  if ($userUnitySP != '') {




    $queryUnitySP = "UPDATE users
  SET userInstitution = '$userUnitySP' 
  WHERE userEmail = '$userEmail'";
    $resultQueryUnity = mysqli_query($conn, $queryUnitySP);


    if ($resultQueryUnity) {



      echo "


  <div style='position: relative;'>
  <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
  </audio>
  <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>

  </div>  ";



      echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";

    }
  } else {

  

    echo "  <div class='alert alert-danger alertStyle' role='alert'>
  ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
</div>";

    echo "<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";



  }

}



?>

<style>
  <?php include('./public/css/header.css') ?>
  <?php include('./public/css/footer.css') ?>
  <?php include('./public/css/profile.css') ?>
</style>

<script>let audio = document.getElementById('forgingSound');
  if (audio) {
    audio.currentTime = 3;
    audio.volume = 0.1;
  }

</script>

<section class="containerAll" id="containerAll">

<?php if ($animation == true) {

echo "<script> document.getElementById('containerAll').style.opacity = 0.3;
document.querySelector('body').style.overflow = 'hidden';

</script>";

} if($animation == false) {
echo "<script> document.getElementById('containerAll').style.opacity = 1 </script>";

} ?>

  <form class="formImageProfile" id="formImageProfile" action="" method="POST" enctype="multipart/form-data">

    <div>

      <label class="labelFileInput">
        <img class="imageFileInputButton" src="./public/img/profile/fileInput.png" alt=""><input type="file" name="file"
          id="file" class="fileStyleProfile"></label>

      <button class="buttonSendStyleProfile" name="submitImage" id="submitImageImage" onclick="triggerInput()"><img
          class="imgButtonSendProfile" src="./public/img/profile/send.png" alt=""></button>




      <script>

        function triggerInput() {

          document.getElementById('submitInputProfile').click();



        }

      </script>


      <input type="hidden" id="submitInputProfile" name="submitInputProfile" value="submitInputProfile">

    </div>




  </form>


  <section class="containerProfileAll" id="containerProfileAll" style="opacity: 1;">

    <section class="containerProfile1">


      <script>

        function showForm() {


          document.getElementById("formImageProfile").style.visibility = 'visible';
          document.getElementById("formImageProfile").style.opacity = 1;
          document.getElementById("file").style.width = "75%";
        }



      </script>



      <div class="imgBackgroundProfile">
        <button onclick="showForm()" onmouseover="editStayStill()" class="buttonStyleProfile">
          <h3 class="editImageButton"><span id="textProfileThing" class="spanH3Profile">EDIT</span> <img
              class="imgStyleImgButton" src="./public/img/profile/blacksmith.png" alt=""></h3> <img
            class="rounded-circle userImage" <?php echo "src='$userPhoto'"; ?> alt="">
        </button>

      </div>

      <script>

        function editStayStill() {

          document.getElementById('textProfileThing').style.opacity = '100%';


        }

      </script>

      <h2 class="userNameStyle">
        <?php echo $userName = $_SESSION['learning_pure_php'] ?>
      </h2>
      <?php if ($userMajorRow) { ?>
        <h2 class="userProfessionStyle">
          <?php echo strtoupper($userMajorRow); ?>
        </h2>

      <?php }
      ; ?>

            <div style="position: relative;">

              <?php if($userGender == 'female') {?> 

              <?php echo " <div class='containerGender'>
                  <img class='imgGenderStyleF' src='./public/img/profile/female.png' alt=''>

                  </div>";

                  ?>
                <?php } ?>


                <?php if($userGender == 'male') {?> 

<?php echo " <div class='containerGender'>
    <img class='imgGenderStyleM' src='./public/img/profile/male.png' alt=''>

    </div>";

    ?>
  <?php } ?>

  
  <?php if($userGender == 'enby') {?> 

<?php echo " <div class='containerGender'>
    <img class='imgGenderStyleE' src='./public/img/profile/enby.png' alt=''>

    </div>";

    ?>
  <?php } ?>

            </div>


    </section>



    <section class="containerDataProfile">
      <section class="containerDataProfile2">

        <div class="positioningData">

          <script>


            function mouseOverThing() {

              const buttonHover = document.getElementById('submitImage');


              return document.getElementById('spanMoving').style.opacity = 0.3;



            };


            function mouseOverThingOut() {

              return document.getElementById('spanMoving').style.opacity = 1;


            }


          </script>

          <div class="positioningData">
            <h1 class="textStyleProfile">Student Id <span class="spanIdStyle">  <?php echo $userIdRow ?>  </span></h1>
          </div>

          <h1 class="textStyleProfile">Full Name <span class="dataPushing">
              <span id="spanMoving">
                <?php echo ucwords($userNameRow); ?>
              </span>
              <button type="button" class="buttonSendStyleProfile" name="submitImage" id="submitImage"
                onmouseover="mouseOverThing()" onmouseout="mouseOverThingOut()" onclick="triggerInputInput()"><img
                  class="imgButtonSendProfile" src="./public/img/profile/blacksmith.png" alt=""></button></span></h1>
        </div>



        <script>

          function triggerInputInput() {



            document.getElementById('menuChangingName').style.display = 'block';
            document.getElementById('menuChangingName').style.marginTop = '1em';
          }
        </script>

        <script>

          function triggerCloseInput() {

            document.getElementById('menuChangingName').style.display = 'none';
            window.location.reload();


          }

        </script>




        <form action="" method="POST" class="menuChanging" id="menuChangingName">

          <div class="form-outline mb-4 containerMenuButton">
            <input type="text" id="userName" name="userName" class="form-control inputMenuChanging" />
            <label class="form-label" for="userName">Full Name</label>

            <button class="inputMenuButton" id="submitUserNameChange" type="submit" name="submitUserNameChange"><i
                class="fa-solid fa-hammer" style="color: #EF7D00"></i></button>

            <button class="inputMenuButton2" type="button" onclick="triggerCloseInput()"><i class="fa-solid fa-xmark"
                style="color: #EF7D00"></i></button>
          </div>





        </form>


        <div class="positioningData">
          <h1 class="textStyleProfile">User CPF<span class="dataPushing2">
              <?php echo $resultStringUserCpf; ?>
            </span></h1>


            
        </div>


          <form action="" method="POST" id="menuChangingPhone">
        <div class="positioningData">
          <h1 class="textStyleProfile">User Phone<span id='userPhone' class="dataPushing3">
       

              <?php


              echo $resultStringUserPhone;

              ?>

<button type="button" class="buttonSendStyleProfile" name="submitUserPhoneChange" id="submitImage"
                onmouseover="mouseOverThingPhone()" onmouseout="mouseOutPhone()" onmouseout="mouseOverThingOut()" onclick="triggerInputInputPhone()"><img
                  class="imgButtonSendProfile" src="./public/img/profile/blacksmith.png" alt=""></button></span></h1>
            </span></h1>

            <div class="form-outline mb-4 containerMenuButton" id='containerMenuPhone' style="display: none;">
            <input type="text" id="userPhone" pattern="[0-9]+" name="userPhone" class="form-control inputMenuChanging" required/>
            <label class="form-label" for="userPhone">User Phone</label>


            <button class="inputMenuButton" id="submitUserPhoneChange" type="submit" name="submitUserPhoneChange"><i
                class="fa-solid fa-hammer" style="color: #EF7D00"></i></button>

            <button class="inputMenuButton2" type="button" onclick="triggerCloseInputPhone()"  ><i class="fa-solid fa-xmark"
                style="color: #EF7D00" ></i></button>

        </div>
        </div>
        </form>


        <script>


function mouseOverThingPhone() {

  document.getElementById('userPhone').style.opacity = '0.5';

}

function mouseOutPhone() {

  document.getElementById('userPhone').style.opacity = '1';

}



function triggerInputInputPhone() {



  document.getElementById('containerMenuPhone').style.display = 'block';
  document.getElementById('menuChangingPhone').style.marginTop = '1em';
}
</script>

<script>

function triggerCloseInputPhone() {

  document.getElementById('containerMenuPhone').style.display = 'none';
  window.location.reload();


}

</script>


        <form action="" method="POST" id="menuChangingAddress">
        <div class="positioningData">
          <h1 class="textStyleProfile">User Address<span class="dataPushing" style="font-size: 80%;">
              <?php echo ucwords($userAddress); ?>

              <button type="button" class="buttonSendStyleProfile" name="submitUserPhoneChange" id="submitImage"
                onmouseover="mouseOverThingAddress()" onmouseout="mouseOutAddress()" onmouseout="mouseOverThingOut()" onclick="triggerInputInputAddress()"><img
                  class="imgButtonSendProfile" src="./public/img/profile/blacksmith.png" alt=""></button></span></h1>
            </span></h1>

            <div class="form-outline mb-4 containerMenuButton" id='containerMenuAddress' style="display: none;">
            <input type="text" id="userAddress" name="userAddress" class="form-control inputMenuChanging" pattern="[\w\W]+)\s(\d+)" minlength="17" maxlength="35" required/>
            <label class="form-label" for="userAddress">User Address</label>


            <button class="inputMenuButton" id="submitUserAddressChange" type="submit" name="submitUserAddressChange"><i
                class="fa-solid fa-hammer" style="color: #EF7D00"></i></button>

            <button class="inputMenuButton2" type="button" onclick="triggerCloseInputAddress()"  ><i class="fa-solid fa-xmark"
                style="color: #EF7D00" ></i></button>

        </div>

        </div>
        </form>

        <script>


function mouseOverThingAddress() {

  document.getElementById('userAddress').style.opacity = '0.5';

}

function mouseOutAddress() {

  document.getElementById('userAddress').style.opacity = '1';

}



function triggerInputInputAddress() {



  document.getElementById('containerMenuAddress').style.display = 'block';
  document.getElementById('menuChangingAddress').style.marginTop = '1em';
}
</script>

<script>

function triggerCloseInputAddress() {

  document.getElementById('containerMenuAddress').style.display = 'none';
  window.location.reload();


}

</script>

<form action="" method="POST" id="menuChangingZipCode">
        <div class="positioningData2">
          <h1 class="textStyleProfile">User ZipCode<span class="dataPushing">
              <?php echo $resultStringUserPostCode; ?>

              <button type="button" class="buttonSendStyleProfile" name="submitUserPhoneChange" id="submitImage"
                onmouseover="mouseOverThingZipCode()" onmouseout="mouseOutZipCode()" onmouseout="mouseOverThingOut()" onclick="triggerInputInputZipCode()"><img
                  class="imgButtonSendProfile" src="./public/img/profile/blacksmith.png" alt=""></button></span></h1>
            </span></h1>



            <div class="form-outline mb-4 containerMenuButton" id='containerMenuZipCode' style="display: none;">
            <input type="text" id="userZipCode" name="userZipCode" class="form-control inputMenuChanging" pattern="[0-9]+" minlength="8" maxlength="8" required/>
            <label class="form-label" for="userZipCode">User ZipCode</label>


            <button class="inputMenuButton" id="submitUserZipCodeChange" type="submit" name="submitUserZipCodeChange"><i
                class="fa-solid fa-hammer" style="color: #EF7D00"></i></button>

            <button class="inputMenuButton2" type="button" onclick="triggerCloseInputZipCode()"  ><i class="fa-solid fa-xmark"
                style="color: #EF7D00" ></i></button>

        </div>


        </div>


        <script>


function mouseOverThingZipCode() {

  document.getElementById('userZipCode').style.opacity = '0.5';

}

function mouseOutZipCode() {

  document.getElementById('userZipCode').style.opacity = '1';

}



function triggerInputInputZipCode() {



  document.getElementById('containerMenuZipCode').style.display = 'block';
  document.getElementById('menuChangingZipCode').style.marginTop = '1em';
}
</script>

<script>

function triggerCloseInputZipCode() {

  document.getElementById('containerMenuZipCode').style.display = 'none';
  window.location.reload();


}

</script>
       





<form action="" method="POST" id="menuChangingUnity">

        <div class="positioningData2">
          <h1 class="textStyleProfile" style="border-top: 3px solid #004070;">User Unity<span class="dataPushing" >
              <?php echo $userInstitution; ?>
           
              <button type="submit" class="buttonSendStyleProfile" name="submitUnity" id="submitUnity"
                onmouseover="mouseOverThingUnity()" onmouseout="mouseOutUnity()" onclick="triggerInputInputUnity()"><img
                  class="imgButtonSendProfile" src="./public/img/profile/blacksmith.png" alt=""></button></span></h1>
            </span></h1>


            <div class="form-outline mb-4 containerMenuButton" id='containerMenuUnity' style="display: none;">
            </form>
              <?php

include('connection.php');

if(isset($_POST['submitUnity'])) {
$conn = mysqli_connect($host, $user, $pass, $db);
$userEmail = $_SESSION['learning_pure_php'];
$queryInstitution = "SELECT * from users WHERE userEmail = '$userEmail' AND  userState = 'RJ' ";
$result = mysqli_query($conn, $queryInstitution);

if ($result) {

  echo "
  <form action='' method='POST' id='menuChangingUnity'>
            <select class='form-select selectStyleSignUpInstitution' name='userInstitutionRJ' id='userInstitutionRJ'  required>

            <option disabled selected value=''>Select your unity</option>
            <option value='Bangu' class='optionStyle'>BANGU</option>
            <option value='Niteroi' class='optionStyle'>NITERÓI</option>
            
            </select>


            <button class='inputMenuButton' id='submitUserUnityChangeRJ' type='submit' name='submitUserUnityChangeRJ'><i
            class='fa-solid fa-hammer' style='color: #EF7D00'></i></button>

        <button class='inputMenuButton2' type='button' onclick='triggerCloseInputUnity()'  ><i class='fa-solid fa-xmark'
            style='color: #EF7D00' ></i></button>
      
          </form>
          ";


}
}
?>


  <?php

include('connection.php');
$conn = mysqli_connect($host, $user, $pass, $db);
$userEmail = $_SESSION['learning_pure_php'];
$queryInstitution2 = "SELECT * from users WHERE userEmail = '$userEmail' AND  userState = 'SP' ";
$result2 = mysqli_query($conn, $queryInstitution2);

if ($result2) {

  echo "
  <form action='' method='POST' id='menuChangingUnity'>
            <div class='form-outline mb-4 containerMenuButton' id='containerMenuUnity'>
            <select class='form-select selectStyleSignUpInstitution' name='userInstitutionSP' id='userInstitutionSP' required>

              <option disabled selected value=''>Select your unity</option>
            <option value='JardimPaulista' class='optionStyle'>JARDIM PAULISTA</option>
            <option value='Adamantina' class='optionStyle'>ADAMANTINA</option>


          </select> 
          
          <button class='inputMenuButton' id='submitUserUnityChangeSP' type='submit' name='submitUserUnityChangeSP'><i
          class='fa-solid fa-hammer' style='color: #EF7D00'></i></button>

      <button class='inputMenuButton2' type='button' onclick='triggerCloseInputUnity()'  ><i class='fa-solid fa-xmark'
          style='color: #EF7D00' ></i></button>
            </form>
          ";

}
          ?>


        
                </div>

        </div>
  
              <div class="positionImageRelative">
      
      
              <div class="containerImageLocation">
      <a class="locationAnchor" href="location.php"><img class="locationAnchorImage" src="./public/img/profile/map.png" alt="location.php"></a>
    </div>
    </div>



     

        </div>
       


        <script>


function mouseOverThingUnity() {

  document.getElementById('userUnity').style.opacity = '0.5';

}

function mouseOutUnity() {

  document.getElementById('userUnity').style.opacity = '1';

}



function triggerInputInputUnity() {



  document.getElementById('containerMenuUnity').style.display = 'block';
  document.getElementById('containerMenuUnity').style.marginTop = '1em';
}
</script>

<script>

function triggerCloseInputUnity() {

  document.getElementById('containerMenuUnity').style.display = 'none';
  window.location.reload();


}

</script>

      </section>

    </section>


 

  </section>

  
</section>



<?php include('footer.php') ?>