<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bueno | Les recettes de votre enfance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginVendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginVendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginVendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginVendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginVendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginVendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="container-login100" style="background-image: url('/img/bg-img/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="/register">
                <span class="login100-form-title p-b-37">
                    Sign Up
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="confirmPass" placeholder="confirm password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Sign Up
                    </button>
                </div>

                <div class="text-center p-t-57 p-b-20">
                    <p class="txt2 hov1"> <span class="txt1">Already have an account ? </span><a href="/login">Login</a></p>
                </div>
                <?php
                // Display Error message
                if (!empty($errorMsg)) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Error!</strong> <?= $errorMsg ?>
                    </div>
                <?php
                }
                ?>
            </form>

        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/loginVendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/loginVendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/loginVendor/bootstrap/js/popper.js"></script>
    <script src="/loginVendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/loginVendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/loginVendor/daterangepicker/moment.min.js"></script>
    <script src="/loginVendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/loginVendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/js/login.js"></script>

</body>

</html>