<?
error_reporting(E_ALL);
include('includes/globals.php');
include('mls/controller/retsController.php');
include('mls/controller/pageController.php');

// load 
//$page_title = $this->page->getPageTitle();
$page_desc = "<insert page desc here>";
//$page_keys = $this->page->getPageKeywords();

$homepage = false;

//$controller = new retsController('loadmls');        // register controller with page action and parameter
//$controller->invoke();

include('includes/header.php');   
?>
<body>

    <div id="container" class="main">
    
        <div id="out">
                     
            <?php include('includes/nav-bar_new.php'); ?>
      
            <!-- <div class="container">  -->
                <div class="container" >
                
                        <!-- begin featured listings summary block -->                                

                    
                        <?php

                            $controller = new retsController('showmls'); // register controller with page action and parameter
                            $controller->invoke();                            // invokde controller to get view

                        ?> 
                     
                        <!-- /end featured listings summary block -->

                        
                    <!-- ==========================MLS Search form starts here=======================================-->

                    <?php //include('includes/search-form.php'); ?>

                    <!-- MLS Search form ends here -->
                </div>
                  
         <!--   </div>  -->
            
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
