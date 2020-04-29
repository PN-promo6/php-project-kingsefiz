<?php

use Entity\Recipe;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
$orm = new ORM(__DIR__ . '/../Resources');
$recipeRepo = $orm->getRepository(Recipe::class);
$items = $recipeRepo->findAll();

// $user1 = new User();
// $user1->id = 1;
// $user1->username = "Lilas";
// $user1->password = "HeySoulSister";

// $user2 = new User();
// $user2->id = 2;
// $user2->username = "Dali";
// $user2->password = "Azerty";

// $user3 = new User();
// $user3->id = 3;
// $user3->username = "LocalFrost";
// $user3->password = "Azertywastaken";

// $user4 = new User();
// $user4->id = 4;
// $user4->username = "Drizzy";
// $user4->password = "Cesthonteux";

// $recepie1 = new Recepie();
// $recepie1->id = 1;
// $recepie1->title = "Recette de dessert";
// $recepie1->country = "Espagne";
// $recepie1->category = "Dessert";
// $recepie1->ingredients = "- 3 oeufs \n- Chocolat \n- Farine \n - Sel \n - Beurre";
// $recepie1->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur a voluptates asperiores. Quaerat impedit nostrum consectetur blanditiis eveniet dolorum iste vel dolor, temporibus hic culpa nihil sunt voluptatem saepe dolores.";
// $recepie1->imageUrl = "https://images.pexels.com/photos/1055272/pexels-photo-1055272.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
// $recepie1->creationDate = "Hier matin";
// $recepie1->creator = $user1;

// $recepie2 = new Recepie();
// $recepie2->id = 2;
// $recepie2->title = "Pates Carbonara";
// $recepie2->country = "Espagne";
// $recepie2->category = "Plat";
// $recepie2->ingredients = "- 3 oeufs \n- Chocolat \n- Farine \n - Sel \n - Beurre";
// $recepie2->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur a voluptates asperiores. Quaerat impedit nostrum consectetur blanditiis eveniet dolorum iste vel dolor, temporibus hic culpa nihil sunt voluptatem saepe dolores.";
// $recepie2->imageUrl = "https://images.pexels.com/photos/1030947/pexels-photo-1030947.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
// $recepie2->creationDate = "Hier matin";
// $recepie2->creator = $user4;

// $recepie3 = new Recepie();
// $recepie3->id = 3;
// $recepie3->title = "Autre recette de dessert";
// $recepie3->country = "Espagne";
// $recepie3->category = "Dessert";
// $recepie3->ingredients = "- 3 oeufs \n- Chocolat \n- Farine \n - Sel \n - Beurre";
// $recepie3->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur a voluptates asperiores. Quaerat impedit nostrum consectetur blanditiis eveniet dolorum iste vel dolor, temporibus hic culpa nihil sunt voluptatem saepe dolores.";
// $recepie3->imageUrl = "https://images.pexels.com/photos/979310/pexels-photo-979310.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
// $recepie3->creationDate = "Hier matin";
// $recepie3->creator = $user3;

// $recepie4 = new Recepie();
// $recepie4->id = 4;
// $recepie4->title = "Salade";
// $recepie4->country = "Espagne";
// $recepie4->category = "Entrée";
// $recepie4->ingredients = "- 3 oeufs \n- Chocolat \n- Farine \n - Sel \n - Beurre";
// $recepie4->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur a voluptates asperiores. Quaerat impedit nostrum consectetur blanditiis eveniet dolorum iste vel dolor, temporibus hic culpa nihil sunt voluptatem saepe dolores.";
// $recepie4->imageUrl = "https://images.pexels.com/photos/1346381/pexels-photo-1346381.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
// $recepie4->creationDate = "Hier matin";
// $recepie4->creator = $user2;

// $items = array($recepie1, $recepie2, $recepie3, $recepie4);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Cuisines du monde - Partage les recettes de ton enfance</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-content">
            <h3>Cooking in progress..</h3>
            <div id="cooking">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div id="area">
                    <div id="sides">
                        <div id="pan"></div>
                        <div id="handle"></div>
                    </div>
                    <div id="pancake">
                        <div id="pastry"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area bg-img bg-overlay" style="background-image: url(img/bg-img/header.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <div class="col-12 col-sm-6">
                        <!-- Top Social Info -->
                        <div class="top-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="#" method="post">
                                <input type="search" name="top-search" id="topSearch" placeholder="Search">
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area">
            <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
        </div>

        <!-- Navbar Area -->
        <div class="bueno-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="buenoNav">

                        <!-- Toggler -->
                        <div id="toggler"><img src="img/core-img/toggler.png" alt=""></div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Accueil</a></li>
                                    <li><a href="#">Recettes</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Healthy</a></li>
                                                <li><a href="#">Patisserie</a></li>
                                                <li><a href="#">Desserts</a></li>
                                                <li><a href="#">Meat</a></li>
                                                <li><a href="#">Fastfood</a></li>
                                                <li><a href="#">Salad</a></li>
                                                <li><a href="#">Soup</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>

                                <!-- Login/Register -->
                                <div class="login-area">
                                    <a href="#">Login / Register</a>
                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Big Posts Area Start ##### -->
    <div class="big-posts-area mb-50">
        <div class="container">
            <!-- Single Big Post Area -->
            <?php for ($i = 0; $i < count($items); $i++) {
                if ($i % 2 == 0) { ?>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="big-post-thumbnail mb-50">
                                <img src="<?php echo $items[$i]->imageUrl ?>" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="big-post-content text-center mb-50">
                                <a href="#" class="post-tag"><?php echo $items[$i]->category ?></a>
                                <a href="#" class="post-title"><?php echo $items[$i]->title ?></a>
                                <div class="post-meta">
                                    <a href="#" class="post-date"><?php echo $items[$i]->creationDate ?></a>
                                    <a href="#" class="post-author">By <?php echo $items[$i]->creator->username ?></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique justo id elit
                                    bibendum pharetra non vitae lectus. Mauris libero felis, dapibus a ultrices sed, commodo
                                    vitae odio. Sed auctor tellus quis arcu tempus, egestas tincidunt augue pellentesque.
                                    Suspendisse vestibulum sem in eros maximus, pretium commodo turpis convallis. Aenean
                                    scelerisque orci quis urna tempus, vitae interdum velit aliquet.</p>
                                <a href="#" class="btn bueno-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="big-post-content text-center mb-50">
                                <a href="#" class="post-tag"><?php echo $items[$i]->category ?></a>
                                <a href="#" class="post-title"><?php echo $items[$i]->title ?></a>
                                <div class="post-meta">
                                    <a href="#" class="post-date"><?php echo $items[$i]->creationDate ?></a>
                                    <a href="#" class="post-author">By <?php echo $items[$i]->creator->username ?></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique justo id elit
                                    bibendum pharetra non vitae lectus. Mauris libero felis, dapibus a ultrices sed, commodo
                                    vitae odio. Sed auctor tellus quis arcu tempus, egestas tincidunt augue pellentesque.
                                    Suspendisse vestibulum sem in eros maximus, pretium commodo turpis convallis. Aenean
                                    scelerisque orci quis urna tempus, vitae interdum velit aliquet.</p>
                                <a href="#" class="btn bueno-btn">Read More</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="big-post-thumbnail mb-50">
                                <img src="<?php echo $items[$i]->imageUrl ?>" alt="">
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>

        </div>
    </div>
    <!-- ##### Big Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-5">
                    <!-- Copywrite Text -->
                    <p class="copywrite-text"><a href="#">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
                <div class="col-12 col-sm-7">
                    <!-- Footer Nav -->
                    <div class="footer-nav">
                        <ul>
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Recipes</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>