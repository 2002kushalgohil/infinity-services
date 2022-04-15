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
    <title>Infinity Services</title>
</head>

<body>
    <nav>
        <img src="./Assets/Images/logo.png" alt="" />
        <input type="checkbox" name="navCheckBx" id="navCheckBx" />
        <label for="navCheckBx">
            <img src="./Assets/Images/user.svg" class="navUserIcon" alt="" />
        </label>
        <div class="navDropDownDiv glass">
            <a href="#">Previous Order</a>
            <a href="#">Cart</a>
        </div>
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
            <div class="userDashBoardCard boxShadow1Hover">
                <div class="userDashBoardCardOverlay">
                    <div class="userDashBoardCardOverlaySub1">
                        <div class="userDashBoardCardOverlaySub1ButtonDiv">
                            <button class="btn">Book my Service</button>
                            <p>5 Reviews</p>
                        </div>
                        <p>
                            I am ______ having 5 years of experience in this Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit. Eos, quia?
                        </p>
                    </div>
                    <div class="userDashBoardCardOverlaySub2">
                        <h2>Varun Anand</h2>
                        <div class="userDashboardCardOverlayBottomDiv">
                            <p>Advocate</p>
                            <p>₹399 Hour</p>
                        </div>
                    </div>
                </div>
                <img src="./Assets/Images/advocate.gif" class="userDashBoardCardBgImg" alt="" />
            </div>
            <div class="userDashBoardCard boxShadow1Hover">
                <div class="userDashBoardCardOverlay">
                    <div class="userDashBoardCardOverlaySub1">
                        <div class="userDashBoardCardOverlaySub1ButtonDiv">
                            <button class="btn">Book my Service</button>
                            <p>50 Reviews</p>
                        </div>
                        <p>
                            I am ______ having 5 years of experience in this Lorem ipsum
                            dolor sit amet,x consectetur adipisicing elit. Eos, quia?
                        </p>
                    </div>
                    <div class="userDashBoardCardOverlaySub2">
                        <h2>Kushal Gohil</h2>
                        <div class="userDashboardCardOverlayBottomDiv">
                            <p>Electrician</p>
                            <p>₹299 Hour</p>
                        </div>
                    </div>
                </div>
                <img src="./Assets/Images/electrician.gif" class="userDashBoardCardBgImg" alt="" />
            </div>
            <div class="userDashBoardCard boxShadow1Hover">
                <div class="userDashBoardCardOverlay">
                    <div class="userDashBoardCardOverlaySub1">
                        <div class="userDashBoardCardOverlaySub1ButtonDiv">
                            <button class="btn">Book my Service</button>
                            <p>10 Reviews</p>
                        </div>
                        <p>
                            I am ______ having 5 years of experience in this Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit. Eos, quia?
                        </p>
                    </div>
                    <div class="userDashBoardCardOverlaySub2">
                        <h2>Abhinav Bankar</h2>
                        <div class="userDashboardCardOverlayBottomDiv">
                            <p>Mechanic</p>
                            <p>₹199 Hour</p>
                        </div>
                    </div>
                </div>
                <img src="./Assets/Images/mechanic.gif" class="userDashBoardCardBgImg" alt="" />
            </div>
        </div>
    </section>

    <script src="./Assets/Scripts/script.js"></script>
</body>

</html>