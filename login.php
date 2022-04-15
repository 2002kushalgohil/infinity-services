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
</head>

<body>
  <section class="lsSection">
    <div class="lsModal boxShadow1">
      <div class="lsModalSec1">
        <div class="lsModalLogoDiv">
          <img src="./Assets/Images/logo.png" class="lsModalLogo" alt="" />
          <p>Infinity Services</p>
        </div>
        <div class="lsModelForm">
          <h2>Login</h2>
          <input type="text" class="inputBx boxShadow1Hover" placeholder="Enter Email" />
          <input type="password" class="inputBx boxShadow1Hover" placeholder="Enter Password" />
          <select class="inputBx boxShadow1Hover">
            <option selected>Dropdown</option>
            <option>Dropdown 2</option>
            <option>Dropdown 3</option>
          </select>
          <div class="lsModelFormBottom">
            <a>Join with us</a>
            <button class="btn boxShadow1">Login</button>
          </div>
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