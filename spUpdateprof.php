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
        $spData['smail'] = "";
        $spData['smob'] = "";
        $spData['serv'] = "";
        $spData['slocation'] = "";
        $spData['stime'] = "";
        $spData['etime'] = "";
        $spData['scharges'] = "";
        $spData['sdesc'] = "";
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
                    echo "<script>alert('Profile Added Successfully')</script>";
                    echo "<script>window.location.href='spdashboard.php'</script>";
                }
                else{
                    echo "<script>alert('Profile Not Added')</script>";
                }
            }else{
                $updateSP = mysqli_query($conn, "UPDATE sproviders SET sname='$sname', smail='$smail', smob='$mobno', serv='$serv', slocation='$loc', stime='$ftime', etime='$ttime', scharges='$rate' , sdesc='$desc' WHERE id='$id2[id]'");
                if($updateSP){
                    echo "<script>alert('Profile Updated Successfully')</script>";
                    echo "<script>window.location.href='spdashboard.php'</script>";
                }
                else{
                    echo "<script>alert('Profile Not Updated')</script>";
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

    <div>
        <div>
            My Profile
        </div>
        <div>
            <form action="" method="POST">
                <fieldset>
                    <div><label for="sname">What is your full name ?</label>
                        <input type="text" name="sname" id="sname" value="<?php echo"$spData[sname]" ?>">
                    </div>
                    <div>
                        <label for="smail">enter Your email :</label>
                        <input type="email" name="smail" id="smail"value="<?php echo"$spData[smail]" ?>">
                    </div>
                    <div> <label for="mobno">Enter Your Mobile :</label>
                        <input type="tel" name="mobno" id="mobno"value="<?php echo"$spData[smob]" ?>">
                    </div>
                    <div> <label for="mobno">Enter Your Description :</label>
                        <input type="tel" name="sdesc" id="mobno"value="<?php echo"$spData[sdesc]" ?>">
                    </div>
                    <div> <label for="serv">Which Service Do You Provide ?</label>
                        <input type="text" name="serv" id="serv"value="<?php echo"$spData[serv]" ?>">
                    </div>
                    <div> <label for="loc">From Where Do You Serve ?</label>
                        <input type="text" name="loc" id="loc"value="<?php echo"$spData[slocation]" ?>">
                    </div>
                    <div> <label for="time">May I know Your Time of available ?</label>
                        <input type="time" name=ftime id="time"value="<?php echo"$spData[stime]" ?>">
                        <input type="time" name=ttime id="time"value="<?php echo"$spData[etime]" ?>">
                    </div>
                    <div>
                        <label for="rate">What's Your Service Charges ?</label>
                        <input type="number" name="rate" id="rate"value="<?php echo"$spData[scharges]" ?>">
                    </div>
                    <div>
                        <button type="submit" name="add_prof">Add Profile</button>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
    

    <?php 
        
    ?>
</body>

</html>