<?php
     //  ----------------- Include Connection file --------------------
     include ("../conn.php");

     //  ----------------- Session start --------------------
     session_start();
     $sType = $_SESSION['sess_stype'];
     
     //------------------------- if not authenticated redirect to login page --------------------
    if(!isset($_SESSION['sess_id'])){
        echo "<script>window.location.href = '../login.php';</script>";
    } 
    
    // -------------------- specific user can access only his profile --------------------
    if($sType != 'admin'){
        echo "<script>window.location.href = '../login.php';</script>";
    }

     // -------------------- Fetch user Id from dtabase --------------------
     mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
     $unFIlteredSPData = mysqli_query($conn, "SELECT * FROM sproviders");
     $spDataRows = mysqli_num_rows($unFIlteredSPData);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="stylesheet" href="../Assets/Styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/Favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/Favicons/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <title>Admin</title>
</head>
<body>
    <nav class="glass">
        <a href="#home"><img src="../Assets/Images/infinityLoop2.gif" class="navImg" alt=""></a>
        <ul>
            <li><a href='./'>Dashboard</a></li>
            <li><a href='./orders.php'>Orders</a></li>
            <li><a href='./users.php'>Users</a></li>
            <li><a href='../logout.php'>Logout</a></li>
        </ul>
    </nav>
    <section class="mainSection">
        <div class="adminTableMainDiv">
            <h2 class="adminTableHeading">Service Providers</h2>
            <table class="adminTable boxShadow1Hover">
                <thead class="boxShadow1Hover Finished">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Service</th>
                        <th>Location</th>
                        <th>Charges</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($spDataRows!=0){
                        while($allServices = mysqli_fetch_assoc($unFIlteredSPData)){            
                    ?>
                        <tr>
                            <td><?php echo"$allServices[sname]" ?></td>
                            <td><?php echo"$allServices[smail]" ?></td>
                            <td><?php echo"$allServices[smob]" ?></td>
                            <td><?php echo"$allServices[serv]" ?></td>
                            <td><?php echo"$allServices[slocation]" ?></td>
                            <td><?php echo"$allServices[scharges]" ?></td>
                            <td><?php echo"$allServices[sdesc]" ?> star</td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../Assets/Scripts/script.js"></script>
</body>
</html>