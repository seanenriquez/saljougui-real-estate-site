<?php

session_start();                  
error_reporting(E_ALL);
include('mls/controller/retsController.php');

$action=basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$page_title = "Las Vegas Luxe Realty - Epic Las Vegas and Henderson Nevada Real Estate";
$page_desc = "Real estate agents specializing in Las Vegas and Henderson Nevada Homes and Condos For Sale";
$page_keys = "real estate, for sale, mls, las vegas, henderson";

$homepage = false;


include('includes/header.php');
?>

<body>

    <div id="container" class="main">
        <div id="out">
            
           
            <?php include('includes/nav-bar_new.php'); ?>


            <div class="container">
                <div class="row">
                        <!-- begin featured listings summary block -->                                

                            <div class="featured-listings">
                                <div class="row">
                                    <div id="featured_marker"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- edit featured listings headline here -->
                                        <h2 class="block-title styler_color sr-header">
                                             MLS Listings
                                        </h2>
                                    </div>
                                </div>
                                <!-- row #1 featured listings summary block --> 
                                <div id="featured-listings_marker"></div>
                                <div class="row">
                                    <?php

                                        $controller = new retsController('featured-listing'); // register controller with page action and parameter
                                        $controller->invoke();                            // invokde controller to get view

                                    ?> 
                                </div>
                            </div>
                            <!-- /end featured listings summary block -->

                            <!-- featured property #1 details start here -->
                            <?php

                                $controller = new retsController('property-item'); // register controller with page action and parameter
                                $controller->invoke();                           // invokde controller to get view

                            ?>

                            <?php

                                $controller = new retsController('contact-modal');        // register controller with page action and parameter
                                $controller->invoke();                            // invokde controller to get view

                            ?>
                            
                        <!-- ==========================MLS Search form starts here=======================================-->
                        <!-- Disabled php, remove the "//" before include to activate -->

                        <?php //include('includes/search-form.php'); ?>

                        <!-- MLS Search form ends here -->

 
                </div>
            </div>


        </div>
        <div id="empty"></div>
    </div>

    <!-- begin footer -->
    <?php include('includes/footer_new.php'); ?>
    <!-- /end footer -->

    <!-- Javascript/bootstrap + all other scripts -->
    <?php include('includes/bottom_scripts_new.php');  ?>
    <!-- /End Scripts -->

</body>

</html>