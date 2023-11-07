<?php

include('connection.php');

$query = "SELECT * from codeignitertable";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $fullNameRow = $row['fullName'];
        $personIdRow = $row['personId'];
    }
}

?>


<link rel="stylesheet" href="/css/queryTesting.css">


<h1 class="h1Style">-- Testing queries --</h1>

<h1>FullName: <?php echo $fullNameRow ?></h1>

<h1>ID: <?php echo $personIdRow ?></h1>