<?php include('./head.inc.php') ?>
<?php include('./header.php') ?>




<?php
if (isset($_SESSION['learning_pure_php'])) {

  include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userEmail = $_SESSION['learning_pure_php'];
  $query = "SELECT * from users WHERE userEmail = '$userEmail'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {

      $userNameRow = $row['userName'];
      $userMajorRow = $row['userMajor'];
      $userEmailRow = $row['userEmail'];
      $userCpf = $row['userCpf'];
      $userAddress = $row['userAddress'];
      $userPostCode = $row['userPostCode'];
      $userPhone = $row['userPhone'];
      $userPhoto = $row['userPhoto'];


      $stringUserPhone = $userPhone;
    
   
    

     $editUserPhone = '(' . $stringUserPhone[0] . $stringUserPhone[1] . ')' . substr($userPhone,2,11);

     $editUserCpf = substr($userCpf,0,3) .  '.' . substr($userCpf,3,3) . '.' . substr($userCpf,6,3) . '-' . substr($userCpf,9,2);

     $editUserPostCode = substr($userPostCode,0,6) . '-' . substr($userPostCode,6,2);

     $resultStringUserPhone = $editUserPhone;
      
     $resultStringUserCpf = $editUserCpf;

      $resultStringUserPostCode =  $editUserPostCode ;

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
  $file_destination = "upload/userProfile/" . $file_name;



  if (move_uploaded_file($temp_name, $file_destination)) {

    $animation = true;

    $query = "UPDATE users
SET userPhoto = '$file_destination'
WHERE userEmail = '$userEmailRow'; ";
    $result = mysqli_query($conn, $query);

  

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
error_reporting(E_ALL);
ini_set("display_errors", 0);

if (isset ($_POST['submitUserNameChange'])) {
 
    include('connection.php');
  $conn = mysqli_connect($host, $user, $pass, $db);
  $userEmail = $_SESSION['learning_pure_php'];
  $userNameChange = $_POST['userName'];

  if($userNameChange != '') {
 



  $query = "UPDATE users
  SET userName = '$userNameChange' 
  WHERE userEmail = '$userEmail'";
  $resultQueryName = mysqli_query($conn, $query);


  if($resultQueryName) {

   $animation = true;

  echo     "


  <div style='position: relative;'>
  <audio id='forgingSound' controls autoplay track style='visibility: hidden; position: absolute;'>
  <source id='forgingSound' src='./public/img/profile/blacksmithSound.mp4'>
  </audio>
  <img class='rounded-circle loadingImageProfile' src='./public/img/profile/blacksmith.gif' alt=''>

  </div>  ";


  
  echo"<script> 
  
  setTimeout(() => {

 
 
    window.location.href = 'profile.php';


    
    }, 2000) 

    </script>";

}
} else {

  $animation = true;

  echo "  <div class='alert alert-danger alertStyle' role='alert'>
  ERROR!! COULD YOU TRY IT AGAIN? <img class='errorIconProfile' src='./public/img/profile/error.png' alt=''>
</div>";

  echo"<script> 
  
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
    audio.currentTime = 3; 
    audio.volume = 0.1;
    </script>

  <section id="containerAll">
    
    <?php if($animation == true) {

          echo "<script> document.getElementById('containerAll').style.opacity = 0.3 </script>";

    } else {
      echo "<script> document.getElementById('containerAll').style.opacity = 1 </script>";

    } ?>

<form class="formImageProfile" id="formImageProfile" action="" method="POST" enctype="multipart/form-data">

  <div>

    <label class="labelFileInput">
      <img class="imageFileInputButton" src="./public/img/profile/fileInput.png" alt=""><input type="file" name="file" id="file"
        class="fileStyleProfile"></label>

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
          class="rounded-circle userImage" <?php echo "src='./public/img/profile/$userPhoto'"; ?> alt="">
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

        <h1 class="textStyleProfile">Full Name <span class="dataPushing">
            <span id="spanMoving">
              <?php echo ucwords($userNameRow); ?>
            </span>
            <button type="button" class="buttonSendStyleProfile" name="submitImage" id="submitImage" onmouseover="mouseOverThing()"
              onmouseout="mouseOverThingOut()" onclick="triggerInputInput()"><img class="imgButtonSendProfile"
                src="./public/img/profile/blacksmith.png" alt=""></button></span></h1>
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
          <input type="text" id="userName" name="userName" class="form-control inputMenuChanging"/>
          <label class="form-label" for="userName">Full Name</label>

          <button class="inputMenuButton" id="submitUserNameChange" type="submit" name="submitUserNameChange"><i
              class="fa-solid fa-hammer"style="color: #EF7D00"></i></button>

              <button class="inputMenuButton2" type="button" onclick="triggerCloseInput()"><i
              class="fa-solid fa-xmark"style="color: #EF7D00"></i></button>
        </div>

         
        
      </form>


      <div class="positioningData">
        <h1 class="textStyleProfile">User CPF<span class="dataPushing2">
            <?php echo    $resultStringUserCpf; ?>
          </span></h1>
      </div>

    

      <div class="positioningData">
        <h1 class="textStyleProfile">User Phone<span class="dataPushing3">


            <?php
       

        echo $resultStringUserPhone;
        
           ?>
          </span></h1>
      </div>

      <div class="positioningData">
        <h1 class="textStyleProfile">User Address<span class="dataPushing">
            <?php echo ucwords($userAddress); ?>
          </span></h1>
      </div>

      <div class="positioningData2">
        <h1 class="textStyleProfile">User ZipCode<span class="dataPushing">
            <?php echo   $resultStringUserPostCode; ?>
          </span></h1>
      </div>


    </section>

  </section>



</section>


</section>


<?php include('./footer.php') ?>