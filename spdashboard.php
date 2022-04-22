<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service provider @ infinity</title>
</head>

<body>
<?php

 include('conn.php');
 session_start();
 $usr = $_SESSION['sess_user'];
 mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
 $db_id=mysqli_query($conn, "SELECT `id` FROM login WHERE `user_id`='{$usr}'");
 $id = mysqli_fetch_array($db_id);
 $query = mysqli_query($conn, "SELECT * FROM sproviders WHERE `id`='{$id['id']}'");
 $numrows = mysqli_num_rows($query);
 if ($numrows != 0) {
     while ($row = mysqli_fetch_assoc($query)) {
         echo 'SP Id :'.$row['id'].'<br>';
         echo' Full Name : ' .$row['sname'].'<br>';
         echo' Email ID :' . $row['smail'].'<br>';
         echo' Mobile No :' . $row['smob'].'<br>';
         echo'Service : ' . $row['service'].'<br>';
         echo 'At Location :' .$row['slocation'].'<br>';
         echo 'Available From ' .$row['stime'];
         echo ' To ' .$row['etime'].'<br>';
         echo 'Service Charges :' .$row['scharges'];
     }
    }
?>
</body>
</html>

