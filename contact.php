<?php
session_start();
error_reporting(E_ALL);
include('mls/controller/retsController.php');

$action=basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$page_title = "Las Vegas Luxe Realty - Luxury Las Vegas, Nevada Real Estate";
$page_desc = "Real estate agents specializing in Las Vegas and Henderson Nevada Homes and Condos For Sale";
$page_keys = "real estate, for sale, for rent";

$homepage = false;

include('includes/header.php');
?>
<body>

    <div id="container" class="main">
        <div id="out">                         

            <!-- turn top notification bar on here by removing this comment

            <div class="notify-bar">
            <div class="container">
            <div class="row">
            <div class="col-md-11">
            <p>Optional notification bar for displaying important messages to your site vistors. It only shows when you want it to.</p>
            </div>
            <div class="col-md-1"><a href="#" class="notify-close"><i class="icon-remove-sign"></i></a></div>
            </div>
            </div>
            </div>

            -->
            <?php

            include('includes/nav-bar_new.php');

            ?>




         <?php include('includes/contact.php');  ?>

        </div>
        <div id="empty"></div>
        <br>
    </div>

    <!-- begin footer -->
    <?php
    include('includes/footer_new.php'); 
    ?>
    <!-- /end footer -->

    <!-- Javascript/bootstrap + all other scripts -->
    <?php
    include('includes/bottom_scripts_new.php'); 
    ?>
    <!-- /End Scripts -->
</body>

</html>