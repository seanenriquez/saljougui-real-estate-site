<?php

// eliminates the need for all those messy include files
// IMPORTANT! MUST NAME THE CLASS THE SAME AS THE FILENAME!
//
// 	example:  dbRetsModel class MUST be in model/dbRetsModel.php!
//
// IMPORTANT! MUST NAME THE CLASS THE SAME AS THE FILENAME!
spl_autoload_register(function ($class) {
    include 'mls/model/' . $class . '.php';
});

//
//  seoController gets the data for the pages as needed and spits out the SEO-ed title, descriptions, and keywords
//
class sbController {

  private $model;
  private $action;
  private $page;
  private $pagename;

  public function __construct($action) {

    $this->action = $action;
    //session_start();									// for persistant data store if needed
  }

  //
  // main controller function - this is where we connect the data/model to the view by the page
  //
  public function invoke() {

    switch ($this->action) {

      // create search buttons from database info
      case 'city-sale-search-sbCommunity':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("community");
        $this->model->setPropertyType("Residential");
        $this->model->getCommunityList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          if (($i % 4)==0) {
              
            // yes i know, its the same view for both...
            require ('mls/view/communitySearchButtonsCol.php');
          }
          else {
            require ('mls/view/communitySearchButtonsCol.php');
          }
          $i++;
          
        } while ($this->model->next());

        break;
        
      case 'city-sale-search-sbPricebeds':
       
        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("pricebeds");
        $this->model->setPropertyType("residential");
        $this->model->getPriceBedsSaleList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/salesBedsSearchButton.php');
          $i++;
          
        } while ($this->model->next());

        break;
        
      case 'city-sale-search-sbStyle':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("style");
        $this->model->setPropertyType("residential");
        $this->model->getStyleSaleList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/salesStyleSearchButton.php');
          $i++;
          
        } while ($this->model->next());

        break;
        
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      // end sales buttons
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
      
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      // start rental buttons
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
      case 'city-rental-search-sbCommunity':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("community");
        $this->model->setPropertyType("rental");
        $this->model->getCommunityList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          if (($i % 4)==0) {
            require ('mls/view/communitySearchButtonsCol.php');
          }
          else {
            require ('mls/view/communitySearchButtonsCol.php');
          }
          $i++;
          
        } while ($this->model->next());
        break;
        
      case 'city-rental-search-sbPricebeds':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("pricebeds");
        $this->model->setPropertyType("rental");
        $this->model->getPriceBedsList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/rentalBedsSearchButton.php');
 
        } while ($this->model->next());
        break;
        
        
      case 'city-rental-search-sbStyle':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("style");
        $this->model->setPropertyType("rental");
        $this->model->getStyleList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/rentalStyleSearchButtons.php');
 
        } while ($this->model->next());
        break;
        
      case 'city-rental-search-sbSeasonal':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("seasonal");
        $this->model->setPropertyType("rental");
        $this->model->getSeasonalList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/rentalSeasonalSearchButton.php');
 
        } while ($this->model->next());
        break;
        
      case 'city-rental-search-sbPets':

        $this->model = new dbSearchButtonModel();

        //  get data...
        $this->model->setCity($_GET['area']);
        $this->model->setButtonType("pets");
        $this->model->setPropertyType("rental");
        $this->model->getPetsFurnList();
        
        echo "<h3>Furnished Pet-Freindly Rentals</h3>";
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/rentalPetsFurnSearchButton.php');
 
        } while ($this->model->next());
        
        echo "<h3>Unfurnished Pet-Freindly Rentals</h3>";
        
        $this->model->getPetsUnfurnList();
        
        // process view using listing loop code...nice re-use
        $i=0;
        do {
          
          require ('mls/view/rentalPetsUnfurnSearchButton.php');
 
        } while ($this->model->next());
        break;

      case 'area':

      	//explode($_GET);
      	$this->pagename = $_GET['page'];

      	// load model need for this action
        $this->page = new dbPageModel();

        // set params for search and get data
        $this->page->setPageName($this->pagename);
        $this->page->getPage();
        $_SESSION['page'] = $this->page->row;		// store for later use in search

        // process view
        require ('mls/view/area.php');

        break;

      default:
        throw new Exception('Controller ERROR - unknown action type $this->action. Please make sure the filename WITHOUT extension matches the switch/case strings in the invoke() method.');
    }

  }
}

?>
