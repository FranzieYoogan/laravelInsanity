<?php

include('header.php');
include('head.inc.php');

    if(isset($_SESSION['learning_pure_php'])) {
        include('connection.php');

$conn = mysqli_connect($host,$user,$pass,$db);
$query = "SELECT * from users ";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1) {

  while ($row = $result->fetch_assoc()) {

    $userNameRow = $row['userName'];



}
}

    }


if (isset($_POST['submit'])) {
    $mass = $_POST['volume'];
    $volume = $_POST['mass'];
    $calculus = $mass / $volume;


  
// $mass = $_GET['mass'];
//  $volume= $_GET['volume'];
//  if($mass && $volume) {
//   return  $calculus = $mass / $volume;
//  }

}
?>

<style>
    <?php include('./public/css/exercise1.css'); ?>
    <?php include('./public/css/header.css'); ?>
    <?php include('./public/css/footer.css'); ?>
</style>

    <section class="containerAllProfile">

    <section  class="textProfile">
    <h1 class="textProfileStyle" style="font-weight: 900;"> <span class="spanH1TextProfile"> <?php if (isset($_SESSION['learning_pure_php'])) {
            echo strtoupper($userNameRow);
        } ?>
        </span>
    </h1>

    </section>


<section class="containerInputProfile">
    <div class="borderProfile">
        <form action="" method="post" class="formStyle">

            <div>

                <input type="number" required id="mass" name="mass" placeholder="MASS VALUE: " class="form-control inputStyleProfile"
                  />
            </div>

            <div>
                <input type="number" required id="volume" name="volume" placeholder="VOLUME VALUE:" class="form-control"
                    />

            </div>
            <div class="containerButtonProfile">
          
                    <div>
                        <button type="submit" id="submit" name="submit"
                            class="btn btn-outline-danger btn-rounded buttonDangerous"
                            data-mdb-ripple-color="dark">CALCULUS</button>
                    </div>


                    <div>
                        <h1 class="resultStyle">RESULT:
                            <?php if (isset($_POST['submit'])) {
                                $calculus = 0;
                                $mass = 0;
                                $volume = 0;
                                $mass = $_POST['mass'];
                                $volume = $_POST['volume'];
                                $calculus = $mass / $volume;
                                echo $calculus;
                            } ?>
                        </h1>

                   
                </div>

            </div>
        </form>
    </div>
</section>

</section>




<?php include('./footer.php') ?>