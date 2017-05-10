<?php
//session_start();
error_reporting(E_ALL);
include('mls/controller/retsController.php');

$action=basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$page_title = "Las Vegas Luxe Realty - ";
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
        <?php include('includes/nav-bar_new.php'); ?>

        <!-- begin featured listings summary block -->    
        <div class="container">
            <div class="row">
                <!-- begin real estate agents promo block -->
                <div class="col-sm-12 col-ms-12">                            
                    <div class="wide-block">
                        <div class="featured-listings">
                            <div class="row">
                                <div id="featured-listings_marker"></div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- edit featured listings headline here -->
                                    <h2 class="block-title styler_color sr-header">
                                        <?= $city ?> MLS Listings
                                    </h2>
                                </div>
                            </div>
                            <!-- row #1 featured listings summary block --> 
                            <div id="featured-listings_marker"></div>
                            <div class="row">
                                <?php

                                    $controller = new retsController('all-search');    // register controller with page action and parameter
                                    $controller->invoke();                              // invokde controller to get view

                                ?> 
                            </div>
                        </div>
                        <!-- /end featured listings summary block -->

                        <!-- featured property #1 details start here -->
                                                 
                        <?php

                    //        $controller = new retsController('city-property-item'); // register controller with page action and parameter
                    //        $controller->invoke();                           // invokde controller to get view

                        ?>
    
                        <!-- ==========================MLS Search form starts here=======================================-->
                        <!-- Disabled php, remove the "//" before include to activate -->

                        <?php //include('includes/search-form.php'); ?>                                             

                        <!-- MLS Search form ends here -->
                        
                        <?php include('includes/accordion.php'); ?>
                        
                        

                        <?php include('includes/search-form.php'); ?>


                    </div>
                </div>
            </div>
        </div>
        <div id="empty"></div>
        <br>
    </div>
    </div>
    <!-- begin footer --> 
    
    <?php include('includes/footer_new.php');  ?>
    <!-- /end footer -->

    <!-- Javascript/bootstrap + all other scripts -->
    <?php include('includes/bottom_scripts_new.php'); ?>
    <!-- /End Scripts -->
</body>

</html>