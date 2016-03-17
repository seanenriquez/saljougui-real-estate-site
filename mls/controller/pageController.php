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
class pageController {

  private $page;
  private $action;
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

      // c
      case 'city':

        $this->page = new dbPageModel();

        //  get data...
        $this->page->setCity($_GET['area']);
        $this->page->loadCityPage();
                
        require "mls/view/city.php";
        
        break;
        
      case 'community':
       
        $this->page = new dbPageModel();

        //  get data...
        $this->page->setCity($_GET['area']);
        $this->page->setSubdiv($_GET['subdiv']);
        $this->page->loadSubdivPage();
        
        require "mls/view/community.php";
        
        break;
        
        
      default:
        throw new Exception('Controller ERROR - unknown action type $this->action. Please make sure the filename WITHOUT extension matches the switch/case strings in the invoke() method.');
    }

  }
}

?>
