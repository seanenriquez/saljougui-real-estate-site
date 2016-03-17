<?php

include_once('mls/model/pdoConfig.php');

// hold the RETS data in this class
class dbPage extends PDOConfig {

  public  $row;
  public  $isCity;

  public function __construct(){

    parent::__construct( );

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getter methods to expose class data cleanly
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getPageCity () {
   return $this->row['city'];
  }
  
  public function getPageSubdiv () {
   return $this->row['subdivision_area_name'];
  }

	public function getPageName () {
	 return $this->row['community_type'];
	}

	public function getPageType () {
	 return $this->row['community_type'];
	}

	public function getPageUrl() {
	 return $this->row['page_url'];
	}
  
  public function getPageHeadline() {
   return $this->row['headline'];
  }

	public function getPageTitle() {
		return "insert City level SEOed Title";
	}

	public function getPageKeywords() {
		return $this->row['keywords'];
	}
  
  public function getPageYouTubeId() {
    return $this->row['youtube_id'];
  }

  public function getPageYouTubeKeys() {
    return $this->row['youtube_keywords'];
  }
  public function getPageYouTubeDesc() {
    return $this->row['youtube_desc'];
  }
  
  public function getPageSaleHits() {
    return $this->row['youtube_keywords'];
  }
  
  public function getPageRentalHits() {
    return $this->row['youtube_keywords'];
  }

	public function getPageContent() {
		return $this->row['content'];
	}

	public function getPageText() {
		return $this->row['content'];
	}

	public function getPageYTId() {
		return $this->row['youtube_id'];
	}

	public function isImageValid() {
    
    $path="files/subdivisions_areas/images";
    
    if ($this->isCity) {
      $path="files/cities/images/";
    }
    
		if ($this->row['file_name']!="" && file_exists(BASE_PATH.$path.$this->row['file_name'])) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getImageFn() {
      
    $path="/files/subdivisions_areas/images/";
    
    if ($this->isCity) {
      $path="/files/cities/images/";
    }

		if ($this->row['file_name']!="" && file_exists(BASE_PATH.$path.$this->row['file_name'])) {
			return $path.$this->row['file_name'];
		}
		else {
			return false;
		}
	}
	
	//
  //  these functions work for both city and community pages
  //
  
  public function getPageCurrentHits () {
   return $this->row['current_hits'];
  }

  public function getPageClosedAvgDOM () {
   return $this->row['avg_dom'];
  }
  
  public function getPageClosedAvgPrice () {
   return number_format($this->row['avg_closed_price'],0);
  }  
 
  public function getPageClosedHits () {
   return $this->row['closed_hits'];
  } 
  
  public function getPageClosedHiPrice () {
   return number_format($this->row['hi_closed_price']);
  } 
  
  public function getPageClosedLoPrice () {
   return number_format($this->row['lo_closed_price']);
  } 
 
  public function getPageAgent () {          
   
     switch ($this->row['agent_id']) {
       
       case "2":
       
        return '
        
        <div class="widget">
      
              <h3>...</h3>
            
                <div class="col-md-6 col-md-offset-3">
                      
                  <div class="post-container post-noborder">
                    <div class="post-img post-img-circle" style="background: url(img/debbibizcardpic.png);"></div>
                    <div class="post-content list-agent">
                      <div class="heading-title">
                        <h3><a href="#">Debbi</a></h3>
                      </div>
                      <div class="post-meta">
                        <span><i class="fa fa-envelope-o"></i> debbi@theshattowgroup.com</span><br>
                        <span><i class="fa fa-phone"></i> 561-xxx-xxxx</span>
                      </div>
                    </div>
                  </div>
                </div>
            </div>';
        break;
        
       case "0":
       
            return '
            
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="post-container post-noborder">
                  <div class="post-img post-img-circle" style="background: url(img/stevebizcard.jpg);"></div>
                  <div class="post-content list-agent">
                    <div class="heading-title">
                      <h3><a href="#">Steve</a></h3>
                    </div>
                    <div class="post-meta">
                      <span><i class="fa fa-envelope-o"></i> steve@theshattowgroup.com</span><br>
                      <span><i class="fa fa-phone"></i> 561-xxx-xxx</span>
                    </div>
                  </div>
                </div>
              </div>';
       
        break;
        
       case "kathy":
        break;
        
       default:
        return '
        
          <div class="row">
            <div class="widget">
         
                <div class="col-md-8 col-md-offset-2">
                
                 <h3>Your Home Team Agent for the City of '.$this->getPageCity().'</h3>
                      
                  <div class="post-container post-noborder">
                    <div class="post-img post-img-circle" style="background: url(../../img/debbibizcardpic.png);"></div>
                    <div class="post-content list-agent">
                      <div class="heading-title">
                        <h3><a href="#">Debbi Shattow</a></h3>
                      </div>
                      <div class="post-meta">
                        <span><i class="fa fa-envelope-o"></i> debbi@theshattowgroup.com</span><br>
                        <span><i class="fa fa-phone"></i> 561-xxx-xxxx</span>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>';
          
        break;
       
     }
  }
}

// do the sql searching in this class
class dbPageModel extends dbPage {

  // vars to handle internal row management
  private $rows;
  private $rowIdx;
  private $count;
  private $stm;

  // search fields
  private $page_name;
  private $id;
  private $city;
  private $subdiv;

  public function __construct(){

    parent::__construct( );

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // setter methods to set internal search fields
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function setPageName ($inStg) {
		$this->page_name=PDO::quote($inStg);
  }

  public function setId ($inStg) {
		$this->id=PDO::quote($inStg);
  }
  
  public function setCity ($inStg) {
    $this->city=fixDashes(PDO::quote($inStg));
  }

  public function setSubdiv ($inStg) {
    $this->subdiv=fixDashes(PDO::quote($inStg));
  }
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function loadCityPage () {

    // check class data and load page data accordingly
      
    if ($this->city == "") {
			throw new Exception("dbPageSearch :: getPage :: Invalid Search - please check to make sure the city is set.");
    }

    $this->isCity = true;
    $sql = 'SELECT
            city_information.*,
            cities_files.file_name
            FROM
            city_information
            INNER JOIN cities_files ON city_information.id = cities_files.cities_id
            WHERE
            city_information.city = '.$this->city.' ';
            
    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
  	if ($this->count == 0) {
			throw new Exception("dbPageSearch :: getPage :: Empty Results - please check to make sure page exists in admin backend.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];
    
    $stm=$this->prepare($sql);
    
    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();

  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function loadSubdivPage () {

    if ($this->city == "" || $this->subdiv=="") {
      throw new Exception("dbPageSearch :: getPage :: Invalid Search - city and subdiv must me set to get community page information.");
    }
    
    $this->isCity = false;
    $sql = 'SELECT * FROM community_area_information
            WHERE (city = '.$this->city.' AND subdivision_area_name = '.$this->subdiv.') ';
  

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbPageSearch :: getPage :: Empty Results - please check to make sure page exists in admin backend.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];
    
    // $this->loadImagePage($this->row['id']);
   

  }
  
  public function loadImagePage($id) {
     
     $sql = 'SELECT * FROM community_area_files
            WHERE ( subdivision_area_id = '.$id.' ) ';
            
      $stm = $this->prepare($sql);
      $stm->execute();
      $row= $stm->fetchAll(PDO::FETCH_ASSOC);
      
      $this->row['file_name']=$row[0]['file_name'];
            
   }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // next() loads next record (if search returns dataset) in dataset
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function next() {

    if ($this->rowIdx < $this->count) {
      $this->row=$this->rows[$this->rowIdx++];
      return true;
    }
    else {
      $this->rowIdx=0;
      return false;
    }

  }

}

?>
