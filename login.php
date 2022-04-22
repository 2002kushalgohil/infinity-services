<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./Assets/Styles/style.css?v=<?php echo time(); ?>">
  <meta name="theme-color" content="#ffffff" />
  <link rel="icon" type="image/png" sizes="32x32" href="./Assets/Favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./Assets/Favicons/favicon-16x16.png">
  <title>Infinity Services Login</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./Assets/Favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./Assets/Favicons/favicon-16x16.png">
  <title>Login @ Infinity</title>
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
          <h2>Login</h2>
          <form action="" method="POST">
            <input type="text" class="inputBx boxShadow1Hover" placeholder="Enter Username" name="user" />
            <input type="password" class="inputBx boxShadow1Hover" placeholder="Enter Password" name="password" />
            <select class="inputBx boxShadow1Hover" name="stype">
              <option value="" selected>I am A ...</option>
              <option value="user">Service User</option>
              <option value="sp">Service Provider</option>
              <option value="admin">Admin</option>
            </select>
            <div class="lsModelFormBottom">
              <a>Join with us</a>
              <button class="btn boxShadow1" type="submit" name="login" value="login">Login</button>
            </div>
          </form>
        </div>
        <div class="lsModalTermsDiv">
          <a>Terms</a>
          <a>Privacy-Policy</a>
        </div>
      </div>
      <div class="lsModalSec2">
        <img src="./Assets/Images/lsImg4.gif" alt="" />
      </div>
    </div>
  </section>
  <script src="./Assets/Scripts/script.js"></script>
</body>

</html>
<?php
if (isset($_POST['login'])) {
  if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['stype'])) {
    $usr = strtolower($_POST['user']);
    $pswd = $_POST['password'];
    $stype = strtolower($_POST['stype']);
    include('conn.php');
    mysqli_select_db($conn, 'infinity') or die(mysqli_error($conn));
    $query = mysqli_query($conn, "SELECT * FROM login WHERE `user_id`='{$usr}'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        $db_stype = $row['stype'];
        $db_pswd = $row['password'];
      }
      if ( $db_pswd == $pswd && $db_stype==$stype) {
        
        session_start();
        $_SESSION['sess_user'] = $usr;
        switch($usr){
         case 'user':header("location:userdashboard.php");
         break;
         case 'sp':header("location:spdashboard.php");
         break;
         case 'admin':header("location:admindashboard.php");
         break;
        }
        
      } else {
        echo '<script>';
        echo 'alert("Invalid username or password")';
        echo '</script>';
      }
    } else {
      echo '<script>';
      echo 'alert(" User Not Found")';
      echo '</script>';
    }
  } else {
    echo '<script>';
    echo ' alert("All fields are required")';
    echo '</script>';
  }
}
?>