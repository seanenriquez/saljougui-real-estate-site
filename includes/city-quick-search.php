
<!-- begin:city quick search --> 

<div id="the-search"> 
    <div class="container">      
        <div class="row">        
            <ul class="nav nav-tabs nav-justified" id="city-search-tab">

                <li class="active"><a href="#homesforsale" data-toggle="tab">Search <?= $city ?> Homes For Sale</a></li>
                <li><a href="#homesforrent" data-toggle="tab">Search <?= $city ?> Rentals</a></li>
                <!--   <li><a href="#condos" data-toggle="tab">Search Condos By Price</a></li>
                <i><a href="#townhomes" data-toggle="tab">Search Townhomes By Price</a></li>  -->

            </ul>
        </div>
        <div class="row"> 
            <div class="tab-content">

                <div class="tab-pane fade in active" id="homesforsale">
                    <h3><?= $city ?> Homes For Sale One-Button Search<sup>tm</sup></h3> 


                    <?php 

                    $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
                    $controller = new retsController('city-sale-search');    // register controller with page action and parameter
                    $controller->invoke();                            // invokde controller to get view

                    ?>

                </div> 

                <div class="tab-pane fade in " id="homesforrent">
                    <h3><?= $city ?> Rental One-Button Search<sup>tm</sup></h3>        

                    <?php 

                    $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
                    $controller = new retsController('city-rental-search');    // register controller with page action and parameter
                    $controller->invoke();                            // invokde controller to get view

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:city quick search -->