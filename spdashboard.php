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
                        <input type="text" name="sname" id="sname">
                    </div>
                    <div>
                        <label for="smail">enter Your email :</label>
                        <input type="email" name="smail" id="smail">
                    </div>
                    <div> <label for="mobno">Enter Your Mobile :</label>
                        <input type="tel" name="mobno" id="mobno">
                    </div>
                    <div> <label for="serv">Which Service Do You Provide ?</label>
                        <input type="text" name="serv" id="serv">
                    </div>
                    <div> <label for="loc">From Where Do You Serve ?</label>
                        <input type="text" name="loc" id="loc">
                    </div>
                    <div> <label for="time">May I know Your Time of available ?</label>
                        <input type="time" name=ftime id="time">
                        <input type="time" name=ttime id="time">
                    </div>
                    <div>
                        <label for="rate">What's Your Service Charges ?</label>
                        <input type="number" name="rate" id="rate">
                    </div>
                    <div>
                        <button type="submit" name="add_prof">Add Profile</button>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
    <?php
     include('conn.php');
     session_start();
     $usr = $_SESSION['sess_user'];

     mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
     $id = mysqli_query($conn, "SELECT id FROM login WHERE user_id='$usr'");
    if (isset($_POST['add_prof'])) {
     $sname = $_POST['sname'];
     $smail = $_POST['smail'];
     $mobno = $_POST['mobno'];
     $serv = $_POST['serv'];
     $loc = $_POST['loc'];
     $ftime = $_POST['ftime'];
     $ttime = $_POST['ttime'];
     $rate = $_POST['rate'];
        if (!empty($_POST['sname']) && !empty($_POST['smail']) && !empty($_POST['mobno']) && !empty($_POST['serv']) && !empty($_POST['loc']) && !empty($_POST['ftime']) && !empty($_POST['ttime']) && !empty($_POST['rate'])) {
           
            $idrows = mysqli_num_rows($id);
            if ($idrows != 0) {
                while ($id2 = mysqli_fetch_assoc($id)) {
                    mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
                    $sprof = mysqli_query($conn, "INSERT INTO sproviders (id,sname,smail,smob,service,slocation,stime,etime,scharges) VALUES ('$id2[0]','$sname','$smail','$mobno','$serv','$loc','$ftime','$ttime','$rate')");
                }
            }
            if ($sprof) {
                echo '<script>';
                echo 'alert("Profile Added !")';
                echo '</script>';
            }
        } else {
            echo "<script>confirm('all fields are mandatory !')</script>";
        }
    }

    $id2=mysqli_fetch_assoc($id);
    $sp_data = mysqli_query($conn, "SELECT * FROM sproviders WHERE id=$id2[id]");
    $sprows = mysqli_num_rows($sp_data);
    if ($sprows != 0) {
        while ($row = mysqli_fetch_assoc($sp_data)) {
            echo "SP Id :$row[id] <br>";
            echo "Full Name :$row[sname]<br>";
            echo " Email ID :$row[smail] <br>";
            echo " Mobile No :$row[smob] <br>";
            echo "Service :$row[serv] <br>";
            echo "At Location :$row[slocation] <br>";
            echo "Available From $row[stime]";
            echo " To :$row[etime]<br>";
            echo "Service Charges :$row[scharges]";
        }
    }

    ?>
</body>

</html>