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
        header("Location: spupdate.php");
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
    <link rel="stylesheet" href="./Assets/Styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="./Assets/Favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./Assets/Favicons/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <title>Document</title>
</head>
<body>
<section class="lsSection">
        <div class="lsModal boxShadow1">
            <div class="lsModalSec1">
            <div class="lsModalLogoDiv">
                    <img src="./Assets/Images/infinityLoop2.gif" class="lsModalLogo" alt="" />
                    <p>Infinity Services</p>
            </div>
                <div class="lsModelForm">
                    <h2>Welcome <?php echo"$spData[sname]" ?></h2>
                    <ul>
                        <li><h3>Service:</h3> <p><?php echo"$spData[serv]" ?></p></li>
                        <li><h3>Charges:</h3> <p><?php echo"$spData[scharges]" ?></p> </li>
                        <li><h3>Time:</h3> <p><?php echo"$spData[stime]" ?> - <?php echo"$spData[etime]" ?></p></li> 
                        <li><h3>Description:</h3> <p><?php echo"$spData[sdesc]" ?></p></li>
                    </ul>
                    <div class="lsModelFormBottom">
                        <a></a>
                        <a href="spupdate.php" class="btn boxShadow1" type="submit" name="add_prof">Edit Profile</a>
                    </div>
                </div>
                <div class="lsModalTermsDiv"></div>
            </div>
            <!-- <div class="lsModalSec2">
                <img src="./Assets/Images/updateAccount.gif" alt="" />
            </div> -->
        </div>
    </section>
    <script src="./Assets/Scripts/script.js"></script>
</body>
</html>