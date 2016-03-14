<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
           <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Homes For Sale by Community </button>
        </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
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
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Homes For Sale by Price / Bedrooms </button>
        </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
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
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
         <button type="button" class="btn btn-material-lightgreen" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion"> Search <?= $city ?>, FL Homes For Sale By Style</button>
        </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
                         
          $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
          $sbcontroller = new sbController($action.'-sbStyle');    // register controller with page action and parameter
          $sbcontroller->invoke();                            // invokde controller to get view

        ?> 
      </div>
    </div>
  </div>
</div>