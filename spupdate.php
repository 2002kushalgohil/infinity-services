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
    $btnText = "Update";
    $headingText = "Update Your Profile";
    // if $spData is empty the make it as an empty array
    if(!$spData){
        $spData['sname'] = "";
        $spData['smail'] = "";
        $spData['smob'] = "";
        $spData['serv'] = "";
        $spData['slocation'] = "";
        $spData['stime'] = "";
        $spData['etime'] = "";
        $spData['scharges'] = "";
        $spData['sdesc'] = "";
        $btnText = "Create Profile";
        $headingText = "Create Profile";
    }

    // ------------------ Sending Data to server as per condition --------------------
    if(isset($_POST['add_prof'])){
        $sname = $_POST['sname'];
        $smail = $_POST['smail'];
        $mobno = $_POST['mobno'];
        $serv = $_POST['serv'];
        $loc = $_POST['loc'];
        $ftime = $_POST['ftime'];
        $ttime = $_POST['ttime'];
        $rate = $_POST['rate'];
        $desc = $_POST['sdesc'];
        if(empty($sname) || empty($smail) || empty($mobno) || empty($serv) || empty($loc) || empty($ftime) || empty($ttime) || empty($rate)|| empty($desc)){
            echo "<script>alert('Please fill all the fields')</script>";
        }
        else{
            if($spData['sname'] == ""){
                $insertSP = mysqli_query($conn, "INSERT INTO sproviders (id, sname, smail, smob, serv, slocation, stime, etime, scharges, sdesc) VALUES ('$id2[id]', '$sname', '$smail', '$mobno', '$serv', '$loc', '$ftime', '$ttime', '$rate', '$desc')");
                if($insertSP){
                    echo "<script>window.location.href='spdashboard.php'</script>";
                }
                else{
                    echo "<script>alert('Something Went Wrong')</script>";
                }
            }else{
                $updateSP = mysqli_query($conn, "UPDATE sproviders SET sname='$sname', smail='$smail', smob='$mobno', serv='$serv', slocation='$loc', stime='$ftime', etime='$ttime', scharges='$rate' , sdesc='$desc' WHERE id='$id2[id]'");
                if($updateSP){
                    echo "<script>window.location.href='spdashboard.php'</script>";
                }
                else{
                    echo "<script>alert('Something Went Wrong')</script>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./Assets/Styles/style.css?v=<?php echo time(); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service provider @ infinity</title>
</head>

<body>
    <section class="lsSection">
        <div class="lsModal boxShadow1">
            <div class="lsModalSec1">
                <form action="" method="POST" class="lsModelForm">
                    <h2><?php echo"$headingText" ?></h2>
                        <input class="inputBx boxShadow1Hover" placeholder="Full Name" type="text" name="sname" value="<?php echo"$spData[sname]" ?>">
                        <input class="inputBx boxShadow1Hover" placeholder="Email Address" type="email" name="smail" value="<?php echo"$spData[smail]" ?>">
                        <input class="inputBx boxShadow1Hover" placeholder="Mobile Number" type="tel" name="mobno" value="<?php echo"$spData[smob]" ?>">
                        <input class="inputBx boxShadow1Hover" placeholder="Description" type="text" name="sdesc" value="<?php echo"$spData[sdesc]" ?>">
                        <input class="inputBx boxShadow1Hover" placeholder="Service" type="text" name="serv" value="<?php echo"$spData[serv]" ?>">
                        <input class="inputBx boxShadow1Hover" placeholder="Location" type="text" name="loc" value="<?php echo"$spData[slocation]" ?>">
                        <input class="inputBx inputBxHalf boxShadow1Hover" type="time" name="ftime" value="<?php echo"$spData[stime]" ?>">
                        <input class="inputBx inputBxHalf boxShadow1Hover" type="time" name="ttime" value="<?php echo"$spData[etime]" ?>">
                        <input class="inputBx boxShadow1Hover" placeholder="Charges per Hour" type="number" name="rate" value="<?php echo"$spData[scharges]" ?>">
                        <div class="lsModelFormBottom">
                            <a href="./spdashboard.php">I will do it later !</a>
                            <button class="btn boxShadow1" type="submit" name="add_prof"><?php echo"$btnText" ?></button>
                        </div>
                </form>
            </div>
            <div class="lsModalSec2">
                <img src="./Assets/Images/updateAccount.gif" alt="" />
            </div>
        </div>
    </section>
</body>

</html>