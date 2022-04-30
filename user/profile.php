<?php

     //  ----------------- Include Connection file --------------------
     include ("../conn.php");

     //  ----------------- Session start --------------------
     session_start();
     $userName = $_SESSION['sess_user'];

    //------------------------- if not authenticated redirect to login page --------------------
    if(!isset($_SESSION['sess_user'])){
        header("Location: login.php");
    }
     
     // -------------------- Fetch user Id from dtabase --------------------
     mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
     $userId = mysqli_query($conn, "SELECT id FROM Login WHERE user_id= '$userName'");
     $id2=mysqli_fetch_assoc($userId);
     $unFIlteredSPData = mysqli_query($conn, "SELECT * FROM users WHERE id= '$id2[id]'");
     $spData = mysqli_fetch_array($unFIlteredSPData);
 
     // if $spData is empty the make it as an empty array
     if(!$spData){
        header("Location: account-setup.php");
         $spData['uname'] = "";
         $spData['umail'] = "";
         $spData['umob'] = "";
         $spData['location'] = "";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/Favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/Favicons/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <title>Profile</title>
</head>
<body>
<nav class="glass">
        <a href="#home"><img src="../Assets/Images/infinityLoop2.gif" class="navImg" alt=""></a>
            <ul>
            <li><a href='./'>Dashboard</a></li>
            <li><a href='../logout.php'>Logout</a></li>
        </ul>
    </nav>
<section class="lsSection"id="mainSectionSmall">
        <div class="lsModal boxShadow1">
            <div class="lsModalSec1">
            <div class="lsModalLogoDiv">
                    <img src="../Assets/Images/infinityLoop2.gif" class="lsModalLogo" alt="" />
                    <p>Infinity Services</p>
            </div>
                <div class="lsModelForm">
                    <h2>Welcome <?php echo"$spData[uname]" ?></h2>
                    <ul>
                        <li><h3>Name:</h3> <p><?php echo"$spData[uname]" ?></p></li>
                        <li><h3>Email:</h3> <p><?php echo"$spData[umail]" ?></p> </li>
                        <li><h3>Mobile:</h3> <p><?php echo"$spData[umob]" ?></p></li> 
                        <li><h3>Location:</h3> <p><?php echo"$spData[location]" ?></p></li>
                        <li></li>
                    </ul>
                    <div class="lsModelFormBottom">
                        <a href=""></a>
                        <a href="account-setup.php" class="btn boxShadow1" type="submit" name="add_prof">Edit Profile</a>                    </div>
                </div>
                <div class="lsModalTermsDiv"></div>
            </div>
            <div class="lsModalSec2">
                <img src="../Assets/Images/updateAccount.gif" alt="" />
            </div>
        </div>
    </section>
    <script src="../Assets/Scripts/script.js"></script>
</body>
</html>