<?php
     //  ----------------- Include Connection file --------------------
     include ("../conn.php");

     //  ----------------- Session start --------------------
     session_start();
     $userId = $_SESSION['sess_id'];
     $sType = $_SESSION['sess_stype'];

     $sp_id = "";
     $serv = "";
     $sname = "";
     
     //------------------------- if not authenticated redirect to login page --------------------
    if(!isset($_SESSION['sess_id'])){
        echo "<script>window.location.href = '../login.php';</script>";
    } 
    
    // -------------------- specific user can access only his profile --------------------
    if($sType != 'admin'){
        echo "<script>window.location.href = '../service-provider/profile.php';</script>";
    }

     // -------------------- Fetch user Id from dtabase --------------------
     mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
     $unFIlteredSPData = mysqli_query($conn, "SELECT * FROM services");
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
            <li><a href='../logout.php'>Logout</a></li>
        </ul>
    </nav>
    <section class="mainSection">
        <div class="adminTableMainDiv">
            <h2 class="adminTableHeading">Orders</h2>
            <table class="adminTable boxShadow1Hover">
                <thead class="boxShadow1Hover">
                    <tr>
                        <th>Something</th>
                        <th>Something</th>
                        <th>Something</th>
                        <th>Something</th>
                        <th>Something</th>
                        <th>Something</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($spDataRows!=0){
                    while($allServices = mysqli_fetch_assoc($unFIlteredSPData)){            
                ?>
                        <tr>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
                            <td>Data</td>
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