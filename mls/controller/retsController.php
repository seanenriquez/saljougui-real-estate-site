<?php

define("DS","/",true);
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT'].DS,true);

// eliminates the need for all those messy include files
// IMPORTANT! MUST NAME THE CLASS THE SAME AS THE FILENAME!
// IMPORTANT! MUST NAME THE CLASS THE SAME AS THE FILENAME!
//
// 	example:  dbRetsModel class MUST be in model/dbRetsModel.php!
//
// IMPORTANT! MUST NAME THE CLASS THE SAME AS THE FILENAME!
// IMPORTANT! MUST NAME THE CLASS THE SAME AS THE FILENAME!

spl_autoload_register(function ($class) {
	include 'mls/model/' . $class . '.php';
});

include_once('includes/utils.php');

class retsController {

	private $model;
	private $user;
	private $action;
	private $page;
	private $pagename;

	public function __construct($action) {

		$this->action = $action;
		//  session_start();									// for persistant data store
	}

	//
	//  invoke() holds the business logic that connects the data to the view for each page in the switch() conditional
	//
	public function invoke() {

		switch ($this->action) {

			// site landing page...get random properties for display
			case 'adduser':

				$this->user = new dbUserModel();

				//  get data...
				$this->user->addUser();

				header("location: /index.php");

				break;

			case 'loginuser':

				$this->user = new dbUserModel();

				//  get data...
				$this->user->addUser();

				header("location: /index.php");

				break;

			case 'logoffuser':

				$this->user = new dbUserModel();

				//  get data...
				$this->user->logoffUser();

				header("location: /index.php");

				break;

				// site landing page...get random properties for display
			case 'carousel':

				$this->model = new dbRetsModel();

				//  get data...
				$this->model->getCarouselProps();

				// process view
				do {
					require ('mls/view/carousel.view.php');
				} while ($this->model->next());

				break;

				// site landing page...get random properties for display
			case 'featured-listing':

				$this->model = new dbRetsModel();

				//  get data...
				$this->model->getFeaturedListingProps();

				// process view

				do {
					require ('mls/view/featured-listing.view.php');
				} while ($this->model->next());

				break;

				// site landing page...get display data for properties!
			case 'property-item':

				$this->model = new dbRetsModel();

				//  get data...
				$this->model->getFeaturedListingProps();

				// process view

				do {
					require ('mls/view/property-item.view.php');
				} while ($this->model->next());

				break;

				// Dynamic Contact Modal for details tablet
			case 'contact-modal':

				$this->model = new dbRetsModel();

				$this->model->getFeaturedListingProps();

				// process view

				do {
					require ('mls/view/contact_modal.view.php');
				} while ($this->model->next());

				break;



			case 'index-random':

				$this->model = new dbRetsModel();

				//  get data...
				$this->model->setCity('jupiter');
				$this->model->getIndexProps();

				// process view
				do {
					require ('mls/view/index-random.php');
				} while ($this->model->next());

				break;

			case 'index-loop':

				// load model need for this action
				$this->model = new dbRetsModel();

				// set params for search and get data
				$this->model->getRandomProperty();

				// process view using listing loop code...nice re-use
				do {
					require ('mls/view/indexLoop.php');
				} while ($this->model->next());

				break;

			case 'index-cities':

				// load model needed for this action
				$this->model = new dbRetsModel();

				// set params for search and get data
				$this->model->getCityCounts();

				// process view using listing loop code...nice re-use
				do {
					require ('mls/view/indexCities.php');
				} while ($this->model->next());

				break;


			case 'index-newloop':

				// load model need for this action
				$this->model = new dbRetsModel();

				$aCities = array("Jupiter","Palm Beach Gardens","West Palm Beach","Delray Beach","Boca Raton","Boynton Beach","Juno Beach","North Palm Beach","Palm Beach","Singer Island");
				sort($aCities);

				/*
				foreach ($aCities as $city) {
				// set params for search and get data
				$this->model->getNewestPropertyByCity($city);
				require ('mls/view/indexNewListingHeader.php');

				// process view using listing loop code...nice re-use
				do {
				require ('mls/view/indexNewLoop.php');
				} while ($this->model->next());

				*/

				// set params for search and get data
				$this->model->getNewestProperties();

				// process view using listing loop code...nice re-use
				do {
					require ('mls/view/indexNewLoop.php');
				} while ($this->model->next());      

				break;

			case 'subdiv-counts':

				$this->model = new dbRetsModel();

				//  get data...
				$this->model->setCity($_GET['city']);
				$this->model->getSubdivCounts();

				// process view
				do {
					require ('mls/view/subdiv-counts.php');
				} while ($this->model->next());

				break;

			case 'search-loop':

				// load model need for this action
				$this->model = new dbRetsModel();

				// set params for search and get data
				$this->model->setArea($_GET['area']);
				$this->model->doSearch();

				// process view using listing loop code...nice re-use
				if ($this->model->count > 0) {
					do {
						require ('mls/view/searchLoop.php');
					} while ($this->model->next());
				}
				else {
					require ('mls/view/searchNoFound.php');

				}

				echo $this->model->pagination->render();

				break;

			case 'community-search':

				// load model need for this action
				$this->model = new dbRetsModel();

				$city = fixDashes($_GET['area']);
				$subdiv = fixDashes($_GET['subdiv']);

				// set params for search and get data
				$this->model->setArea($_GET['area']);
				$this->model->setCommunity($_GET['subdiv']);
				$this->model->getAreaListings();

				// process view using listing loop code...nice re-use
				if ($this->model->count > 0) {
					do {
						require ('mls/view/searchLoop.php');
					} while ($this->model->next());
				}
				else {
					require ('mls/view/searchNoFound.php');

				}

				break;

			case 'quick-search-cities':

				// load model needed for this action
				$this->model = new dbRetsModel();

				$this->model->getCityDropDown("palm beach");


				break;   

			case 'city-search':

				// load model need for this action
				$this->model = new dbRetsModel();

				$city = fixDashes($_GET['city']);
				$this->model->setCity($city);
				$this->model->getAreaListings();

				if ($this->model->count > 0) {
					do {
						require ('mls/view/city-listing.view.php');
					} while ($this->model->next());
				}
				else {
					require ('mls/view/searchNoFound.php');

				}

				//require ('includes/city-quick-search.php');
				break;
				
			// for the city-search loop
			case 'city-property-item':

				$this->model = new dbRetsModel();

				//  get data...
				//$this->model->getFeaturedListingProps();

				// process view
            do {
					require ('mls/view/property-item.view.php');
					require ('mls/view/contact_modal.view.php');
				} while ($this->model->next());


				break;



			case 'city-sale-search':

				// load model need for this action
				//$this->model = new dbRetsModel();

				$city = fixDashes($_GET['area']);

				require ('includes/city-sale-search.php');


				break;

			case 'city-rental-search':

				// load model need for this action
				//$this->model = new dbRetsModel();

				$city = fixDashes($_GET['area']);

				require ('includes/city-rental-search.php');


				break;

				//  handle news data retreval and display ////////////////////////////////////////////////////////////////////////
			case 'shownews':

				$this->model = new dbNewsModel();

				//  get data...
				$this->model->setId($_GET['id']);
				$this->model->getNewsItem();

				// process view
				require ('mls/view/shownews.php');

				break;

			case 'news-loop':

				$this->model = new dbNewsModel();

				//  get data...no params needed
				$this->model->getNewsListings();

				// process view
				do {
					require ('mls/view/newsLoop.php');
				} while ($this->model->next());

				break;
				// end news //////////////////////////////////////////////////////////////////////////////////////////////////////


			case 'listings-loop':

				$this->model = new dbRetsModel();

				// set params for search and get data
				$this->model->setPropertyType("residential");
				$this->model->setAgentId("20130716175942774876000000");
				$this->model->getClientSummaryListings();

				// process view
				do {
					require ('mls/view/listingLoop.php');
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

			case 'area-loop':

				// load model need for this action
				$this->model = new dbRetsModel();
				$area = $_SESSION['page']['page_name'];

				// set params for search and get data
				$this->model->setArea($area);
				$this->model->getAreaListings();

				// process view
				do {
					require ('mls/view/areaLoop.php');
				} while ($this->model->next());

				break;

			case 'search-results':

				// load model need for this action
				$this->model = new dbRetsModel();

				// set params for search and get data
				if (!empty($_GET['area']))
					$this->model->setArea($_GET['area']);
				else if (!empty($_GET['area_deep_resi']))
					$this->model->setArea($_GET['area_deep_resi']);
					else if (!empty($_GET['area_deep_rent']))
						$this->model->setArea($_GET['area_deep_rent']);

						$this->model->getSearchHeaderInfo();

				// process view
				require ('mls/view/search.php');

				break;

			case 'showmls':
			case 'single':

			// load model need for this action
			$this->model = new dbRetsModel();

			// set params for search and get data
			$this->model->setMLS($_GET['mls']);
			$this->model->getSingleProperty();

			// process view
			switch ($this->model->getPropertyType()) {

				case "Residential":
				case "residential":
					require ('mls/view/mlsDetail/showRes.php');
					break;
				case "Rental":
				case "rental":
					require ('mls/view/mlsDetail/showRent.php');
					break;

			}

			break;

			default:
				throw new Exception('Controller ERROR - unknown action type {'.$this->action.'} Please make sure the filename WITHOUT extension matches the switch/case strings in the invoke() method.');
		}

	}
}

?>
