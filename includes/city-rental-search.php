<div class="panel-group" id="accordion2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
           <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Rentals by Community </button>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
      
        <?php 
                         
          $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
          $sbcontroller = new sbController($action.'-sbCommunity');    // register controller with page action and parameter
          $sbcontroller->invoke();                            // invokde controller to get view

        ?>
              
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Rentals by Price / Bedrooms </button>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
      
        <?php 
                         
          $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
          $sbcontroller = new sbController($action.'-sbPricebeds');    // register controller with page action and parameter
          $sbcontroller->invoke();                            // invokde controller to get view

        ?>    

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
         <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Rentals By Style</button>
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
                         
          $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
          $sbcontroller = new sbController($action.'-sbStyle');    // register controller with page action and parameter
          $sbcontroller->invoke();                            // invokde controller to get view

        ?>    

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
          <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Seasonal Rentals </button>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
                         
          $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
          $sbcontroller = new sbController($action.'-sbSeasonal');    // register controller with page action and parameter
          $sbcontroller->invoke();                            // invokde controller to get view

        ?>    
        
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
         <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Pet Freindly Rentals </button>
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
                         
          $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
          $sbcontroller = new sbController($action.'-sbPets');    // register controller with page action and parameter
          $sbcontroller->invoke();                            // invokde controller to get view

        ?>   
        
      </div>
    </div>
  </div>
</div>
