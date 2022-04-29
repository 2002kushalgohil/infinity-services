<?php

     //  ----------------- Include Connection file --------------------
     include ("conn.php");

     //  ----------------- Session start --------------------
     session_start();
     $userName = $_SESSION['sess_user'];
     
     // -------------------- Fetch user Id from dtabase --------------------
     mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
     $userId = mysqli_query($conn, "SELECT id FROM Login WHERE user_id= '$userName'");
     $id2=mysqli_fetch_assoc($userId);
     $unFIlteredSPData = mysqli_query($conn, "SELECT * FROM sproviders WHERE id= '$id2[id]'");
     $spData = mysqli_fetch_array($unFIlteredSPData);
 
     // if $spData is empty the make it as an empty array
     if(!$spData){
         $spData['sname'] = "";
         $spData['serv'] = "";
         $spData['stime'] = "";
         $spData['etime'] = "";
         $spData['scharges'] = "";
         $spData['sdesc'] = "";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div>
        <p>Name:<?php echo"$spData[sname]" ?></p>
        <p>Description:<?php echo"$spData[sdesc]" ?></p>
        <p>Services:<?php echo"$spData[serv]" ?></p>
        <p>Charges:<?php echo"$spData[scharges]" ?></p>
        <p>Time:<?php echo"$spData[stime]" ?> - <?php echo"$spData[etime]" ?></p>
    </div>
</body>
</html>