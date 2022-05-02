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
     $unFIlteredSPData = mysqli_query($conn, "SELECT * FROM sproviders WHERE serv_status='$serv_status'");
     $spDataRows = mysqli_num_rows($unFIlteredSPData);
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Assets/Styles/style.css?v=<?php echo time(); ?>">
    <meta name="theme-color" content="#ffffff" />
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/Favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/Favicons/favicon-16x16.png">
    <title>Infinity Services</title>
</head>

<body>
    <nav class="glass">
        <a href="#home"><img src="../Assets/Images/infinityLoop2.gif" class="navImg" alt=""></a>
            <ul>
            <li><a href='./profile.php'>Profile</a></li>
            <li><a href='../logout.php'>Logout</a></li>
        </ul>
    </nav>
    <section class="mainSection">
        <div class="userDashbaordSearchDiv">
            <p>Some Lorem ipsum Stuff?</p>
            <div class="userDashbaordSearchDivSearchParent">
                <input type="checkbox" name="userSearchChkBx" id="userSearchChkBx" />
                <input type="text" class="inputBx boxShadow1Hover" placeholder="Search... (For Eg:- Advocate)"
                    id="userDashBoardSearchBx" />
                <div class="userDashboardSearchDropdown glass">
                    <div class="userDashboardSearchDropdownMainDiv">
                        <div class="userDashboardSearchDropdownSubDiv1">
                            <div>
                                <input type="checkbox" name="Advocates" id="Advocates" />
                                <label for="Advocates">Advocates</label>
                            </div>
                            <div>
                                <input type="checkbox" name="Painters" id="Painters" />
                                <label for="Painters">Painters</label>
                            </div>
                        </div>
                        <div class="userDashboardSearchDropdownSubDiv2">
                            <div>
                                <input type="checkbox" name="Electrician" id="Electrician" />
                                <label for="Electrician">Electrician</label>
                            </div>
                            <div>
                                <input type="checkbox" name="Mechanic" id="Mechanic" />
                                <label for="Mechanic">Mechanic</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="userDashBoardCardMainDiv">
        <?php
            if($spDataRows!=0){
                while($allServices = mysqli_fetch_assoc($unFIlteredSPData)){            
        ?>
        
            <div class="userDashBoardCard boxShadow1Hover">
                <div class="userDashBoardCardOverlay">
                    <div class="userDashBoardCardOverlaySub1">
                        <div class="userDashBoardCardOverlaySub1ButtonDiv">
                            <button class="btn" ><a href="./book_serv.php?id=<?php echo $allServices['id']?> ">Book my Service</a> </button>
                            <p class="userDashboardCardStarMainP">5 <img src="./Assets/Images/star.png" class="userDashboardCardStar" alt=""></p>
                        </div>
                        <p class="userDashboardDescription"><?php echo"$allServices[sdesc]"?></p>
                    </div>
                    <div class="userDashBoardCardOverlaySub2">
                        <h2><?php echo"$allServices[sname]"?></h2>
                        <div class="userDashboardCardOverlayBottomDiv">
                            <p><?php echo"$allServices[serv]"?></p>
                            <p>₹<?php echo"$allServices[scharges]"?> Hour</p>
                        </div>
                    </div>
                </div>
                <img src="../Assets/Images/Services/<?php echo"$allServices[serv]"?>.gif" class="userDashBoardCardBgImg" alt="" />
            </div>
        <?php
                }
            }
        ?>
        </div>
    </section>

    <script src="../Assets/Scripts/script.js"></script>
</body>

</html>