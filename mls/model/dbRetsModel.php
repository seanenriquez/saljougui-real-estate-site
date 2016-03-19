<?php

include_once('mls/model/pdoConfig.php');
include_once('includes/utils.php');
include_once('includes/pagination.php');

//include_once('mls/model/areazone.php');


// hold the data in this class
class dbRets extends PDOConfig {

  public  $row;
  public  $count;

  const MLS_TABLENAME = 'master_rets_table';

  public function __construct(){
    parent::__construct( );
  }

  //
  public function getPropertyType () {
    return $this->row['property_type'];
  }

  public function getPropertyTypeTag () {

    switch ($this->row['property_sub_type']) {
      case "Single Family Detach":
        return "Single Family House";
        break;
      default:
        return $this->row['property_sub_type'];
    }

  }

  public function getAgentId () {
    return $this->row['agent_id'];
  }

  public function getStreetAddress() {
    $str = $this->row['street_number']." ".$this->row['street_dir']." ".$this->row['street_name']." ".$this->row['street_suffix'];
    if ($str=="   ")
      $str="No Address Found";
    return $str;
  }

  public function getCityStZip() {
    return $this->row['city'].", FL ".$this->row['postal_code'];
  }

  public function getMLS() {
    return $this->row['listing_id'];
  }

  public function getSqFt() {
    return number_format($this->row['sqft_living']);
  }

  public function getCity() {
    // return $this->row['city'].(strlen($this->row['city'])<=8?"&nbsp;&nbsp;&nbsp;&nbsp;":"");
    return $this->row['city'];
  }

  public function getCityDashes() {
    // return $this->row['city'].(strlen($this->row['city'])<=8?"&nbsp;&nbsp;&nbsp;&nbsp;":"");
    return fixBlanks($this->row['city']);
  }

  public function getCitiesNameAndCount() {
    return $this->row['city']." [".$this->row['current_hits']."]";   
  }

  public function getBaths() {
    return ($this->row['bathrooms'].".".$this->row['halfbaths']);
  }

  public function getLat() {
    return $this->row['latitude'];
  }

  public function getLong() {
    return $this->row['longitude'];
  }

  public function getHalfBaths() {
    return $this->row['halfbaths'];
  }

  public function getPrice() {
    return "$".number_format($this->row['listing_price']);
  }
  public function getPriceRaw() {
    return number_format($this->row['listing_price']);
  }

  public function getBeds() {
    return $this->row['bedrooms'];
  }

  public function getNumPics() {
    return $this->row['photo_count'];
  }

  public function getHomeStyle() {
    return $this->row['home_style'];
  }

  public function getShortDesc($inLen=66) {
    return substr($this->row['remarks'],0,$inLen)."...";
  }

  public function getShortUCDesc($inLen=66) {
    return ucfirst (strtolower(substr($this->row['remarks'],0,$inLen)."..."));
  }

  public function getThumbSmallFn() {
    return "mls/thumbs200/".$this->row['sysid']."-1.jpg";
  }

  public function getThumbFn() {
    return "/mls/thumb/".$this->row['sysid']."-1.jpg";
  }

  public function getFrontPicFn() {
   // return "/mls/photos/".$this->row['sysid']."-1.jpg";
    return "http://dev.webwarephpdevelopment.com/mls/photos/".$this->row['sysid']."-1.jpg";    
  }


  public function getExtFeats() {
    return $this->row['exterior_features'];
  }

  public function getIntFeats() {
    return $this->row['interior_features'];
  }

  public function getEquipApp() {
    return $this->row['equipment_appliances'];
  }

  public function getTaxAmount() {
    return "$".number_format($this->row['tax_amount']);
  }

  public function getHOADues() {
    return "$".number_format($this->row['hoa_dues']);
  }

  // generic data function to grab fields directly
  public function getData($inFld) {
    return str_replace(",",", ",$this->row[$inFld]);
  }


  public function notEmpty($inFld) {
    if (empty($this->row[$inFld]))
      return false;
    else
      return true;
  }

  // functions to build quicksearch links
  public function getMLSLink() {
    return "/".$this->getMLS().".mls";
  }
  // functions to build quicksearch links
  public function getImageDisplayList() {

    $images = $this->getImageArray();

    $first = true;
    foreach ($images as $image) {

      if ($first==true) $stg = "active"; else $stg = "";

      $img = substr($image,16);

      echo "<div class='item $stg'><img src='$img' alt=''></div>";

      $first = false;

    }

  }

  public function getExtFeatsList() {

    $extFeats = explode(",",$this->row['exterior_features']);   
    foreach ($extFeats as $feat) {
      echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
    } 
  }

  public function getIntFeatsList() {

    $extFeats = explode(",",$this->row['interior_features']);
    foreach ($extFeats as $feat) {
      echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";  
    }

  }  
  public function getEquipApplList() {

    $extFeats = explode(",",$this->row['equipment_appliances']);
    foreach ($extFeats as $feat) {     
      echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
    } 
  }

  public function getAmenityList() {

    $extFeats = explode(",",$this->row['amenities']);
    foreach ($extFeats as $feat) {     
      echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
    } 
  }

  public function getUtilityList() {

    $extFeats = explode(",",$this->row['utilities']);
    foreach ($extFeats as $feat) {     
      echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $feat</li>";
    } 
  }

  public function getHOAList() {

    echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> {$this->row['hoa']} </li>";  
    echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> \${$this->row['hoa_dues']}</li>";
    // echo "<li><i class='fa fa-check' style='color: green;text-shadow: 1px 1px 1px #ccc;'></i> $this->row['hoa']</li>";

  }

  public function getGMapsAddress() {

    return $this->row['street_number']."+".$this->row['street_dir']."+".$this->row['street_name']."+".$this->row['street_suffix']."+".$this->row['city']."+FL";
  }


}

// do the sql searching in this class
class dbRetsModel extends dbRets {

  // vars to handle internal row management
  private $rows;
  public $rowIdx;
  private $stm;
  private $vars;
  private $paging;

  // search fields
  private $mls_id;
  private $property_type;
  private $property_subtype;
  private $agent_id;
  private $city;
  private $subdiv;
  private $cityname;
  
  private $min_price;
  private $max_price;
  private $min_bath;
  private $max_bath;
  
  private $date_from;
 	private $tag;
  
  public $pagination;
  private $recs_per_page=20;

  public function __construct(){
    parent::__construct( );
  }

  // the search "title" is at the search level, not row level
  public function getDisplayTitle () {

  	if (!(isset($_GET['page']))) {
  		if ($this->tag=="")
  			return $this->count." ".$this->getPropertyTypeTag()." Listings for ".$this->cityname;
  		else
  			return $this->count." ".$this->tag." ".$this->getPropertyTypeTag()." Listings for ".$this->cityname;
		}
		else {
      
			switch ($_GET['page']) {

				case 2:
					$tag.=" 251 - 500";
					break;
				case 3:
					$tag.=" 501 - 750";
					break;
				case 4:
					$tag.=" 751 - 1000";
					break;
				case 5:
					$tag.=" 1001 - 1250";
					break;

				// add more if needed...

			}
			return "Showing $tag of $this->count ".$this->getPropertyTypeTag()." Listings for ".$this->cityname;
		}
  }
     
  public function isFirst() {
    return ($this->rowIdx==1?"1":"0");
  }

  // set functions for searches
  public function setPropertyType ($inStg) {
  	$this->property_type=PDO::quote($inStg);
  }

  public function setPropertySubType ($inStg) {
  	$this->property_subtype=PDO::quote($inStg);
  }

  public function setAgentId ($inStg) {
  	$this->agent_id=PDO::quote($inStg);
  }

  public function setMLS ($inStg) {
  	$this->mls_id=PDO::quote($inStg);
	}
  
  public function setCity ($inStg) {
    $this->cityname=PDO::quote($inStg);
  }
  
  
  public function setCommunity ($inStg) {
    $this->community=fixDashes(PDO::quote($inStg));
    $this->subdiv=fixDashes(PDO::quote($inStg));
  }
    

  public function setArea ($inStg) {
    
    if (strtolower($inStg)=="all") {
      return;
    }
    
  	if ($inStg=="today" || $inStg=="thisweek") {
			$this->date_from = ($inStg=="today" ? date("Y-m-d", strtotime( '-1 days' )): date("Y-m-d", strtotime( '-7 days' ) ))." 00:00:00";
			return;
  	}
  	if ($inStg=="commercial" ) {
  		$this->setPropertyType("commercial");
  		return;
  	}
  	$area=fixDashes($inStg);
  	if ($this->isCity($area)) {
			$this->city=PDO::quote($area);
		}
		else {
			$this->subdiv=PDO::quote($area);
		}
  }

  /******************************************************************************************************************/
  // start search methods
  /******************************************************************************************************************/
  public function getIndexProps() {

    // check class data
    if ($this->cityname == "") {
     throw new Exception("dbRetsSearch :: getIndexProps :: Invalid City - please make sure you set city class variable");
    }
    
    // grad
    $sql = "SELECT subdivision_area_name,current_hits FROM community_area_information
            WHERE city = '".trim($this->cityname)."'
            ORDER BY current_hits DESC";
            
    $this->stm = $this->prepare($sql);   
    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    
    $rowcnt = 0;
    foreach ($this->rows as $row) {
     
      $this->subdiv = $row['subdivision_area_name'];
      
      $sql = "SELECT subdivision_area_name,current_hits FROM community_area_information
        WHERE city = '".trim($this->cityname)."'
        ORDER BY current_hits DESC";
               
      if ($rowcnt++ == 6) {
        break;
      }
      
    }
      
  }
  
  public function getSubdivCounts () {
      
    $results = array();
    
    // check class data
    if ($this->cityname == "") {
     throw new Exception("dbRetsSearch :: getSubdivCounts :: Invalid City - please make sure you set city class variable");
    }

    $sql = "SELECT subdivision_area_name AS subdiv_name,current_hits AS hits,city FROM community_area_information
            WHERE city = ".trim($this->cityname)."
            ORDER BY subdivision_area_name ASC";
         
    $this->stm2 = $this->prepare($sql);   
    $this->stm2->execute();
    $this->rows= $this->stm2->fetchAll(PDO::FETCH_ASSOC);
    
    $this->count = $this->stm2->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  public function getSingleProperty () {

    // check class data
    if ($this->mls_id == "") {
     throw new Exception("dbRetsSearch :: getProperty :: Invalid mls_id");
    }

    $sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
            WHERE listing_id = '.$this->mls_id.'
            ORDER BY listing_price DESC';

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }   
  
  public function getRandomProperty() {

       
    $sql = "(select *
               from master_rets_table
               where property_type = 'Residential' and city = 'JUNO BEACH' and listing_price > 500000 and listing_price <= 1500000
               AND index_photo = 1
               order by rand()
               limit 1
              ) union all
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'palm beach gardens' and listing_price > 500000 and   listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'North Palm Beach' and listing_price > 500000 and   listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all             
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Palm Beach' and listing_price > 500000 and   listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all             
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Boynton Beach' and listing_price > 500000 and   listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all              
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Delray Beach' and listing_price > 500000 and   listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all  
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'jupiter' and listing_price > 500000 and listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'WEST PALM BEACH' and listing_price > 500000 and  listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Boca Raton' and listing_price > 500000 and  listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              ) union all
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Singer Island' and listing_price > 500000 and  listing_price <= 1500000
                AND index_photo = 1
               order by rand()
               limit 1
              )";            


    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  public function getCitySearchButtonTag($city,$proptype,$searchtype) {
    
    $propsearchstg = ($proptype=="Homes"?"Single Family Detach":$proptype);
    $typesearchstg = ($searchtype=="Sale"?"residential":"rental");
       
    $sql = "select count(*) as cnt
               FROM master_rets_table
               WHERE city = '$city'
               AND property_sub_type = '$propsearchstg' 
               AND property_type = '$typesearchstg' ";            

    $stm = $this->prepare($sql);

    $stm->execute();
    $row= $stm->fetch();
    
    $rval = "Search $city<br>$proptype for $searchtype [$row[cnt]]";
    
    // set row to first
    return($rval);

  }
  
  public function getCityDesc($city) {
       
    $sql = "select *
               from city_information
               where city = '$city'";            


    $stm = $this->prepare($sql);

    $stm->execute();
    $row= $stm->fetch();
    
    // set row to first
    return($row['content']);

  }

  
  public function getFeaturedListingProps() {
    
    $sql = 'SELECT * from master_rets_table 
            WHERE listing_price > 700000 AND listing_price > 1400000 ORDER BY listing_entry_timestamp DESC LIMIT 9';
                                     
    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
   
  public function getCarouselProps() {
    
    $sql = 'SELECT * from master_rets_table 
            WHERE listing_id IN (SELECT listing_id from custom_listings)'; 

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  public function getNewestPropertyByCity($inStg) {
    
    $sql = "select *
               from master_rets_table
               WHERE property_type = 'Residential' and city = '$inStg' and listing_price > 400000 and listing_price <= 1200000
               AND sqft_living > 1000
               order by listing_entry_timestamp DESC
               limit 2";
    
    
    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];
  }
  
  public function getNewestProperties() {
    
    $sql = "SELECT * FROM master_rets_table 
    				WHERE  (DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= listing_entry_timestamp) 
    				AND property_type='Residential' 
    				AND listing_price > 300000 and county='palm beach' 
    				group by city 
    				order by  CITY asc, listing_entry_timestamp DEsc";
    
    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];
    
  }
  
   
  public function getNewestProperty() {
   
     $sql = "(select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Jupiter' and listing_price > 300000 and listing_price <= 1000000
               AND index_photo = 1
               order by listing_entry_timestamp DESC
               limit 2
              ) UNION ALL
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'palm beach gardens' and listing_price > 500000 and   listing_price <= 1000000
                AND index_photo = 1
               order by listing_entry_timestamp DESC
               limit 2
              ) UNION ALL
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'WEST PALM BEACH' and listing_price > 500000 and listing_price <= 1000000
                AND index_photo = 1
              order by listing_entry_timestamp DESC
               limit 2
              ) UNION ALL
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Boyton Beach' and listing_price > 500000 and  listing_price <= 1000000
                AND index_photo = 1
               order by listing_entry_timestamp DESC
               limit 2
              ) UNION ALL
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Delray Beach' and listing_price > 500000 and  listing_price <= 1000000
                AND index_photo = 1
               order by listing_entry_timestamp DESC
               limit 2
              ) UNION ALL
              (select *
               from master_rets_table
               where property_type = 'Residential' and city = 'Boca Raton' and listing_price > 500000 and  listing_price <= 1000000
                AND index_photo = 1
               order by listing_entry_timestamp DESC
               limit 2
              )";            


    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  
  public function getCityCounts() {
      
    $sql = 'SELECT * from city_information
              ORDER BY city ASC';            
    
    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }

  public function getClientSummaryListings () {

    // check class data
    if (($this->property_type == "") || ($this->agent_id == "")) {
     throw new Exception("dbRetsSearch ::getClientSummaryListings :: Invalid property_type or agent_id");
    }

    $sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
            WHERE property_type = '.$this->property_type.'  AND agent_id = '.$this->agent_id.'
            ORDER BY listing_price DESC';
    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }

  public function getAreaListings () {

    // check class data
    if (($this->city == "") && ($this->subdiv == "") &&
    		($this->date_from == "") && ($this->property_type == "")) {
			throw new Exception("dbRetsSearch:: getAreaListings - empty city, subdiv or starting date for search");
    }

    if ($this->city != "" ) {
	    $sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
	            WHERE city = '.$this->city.'
	            ORDER BY listing_price DESC';
		}
		
    if ($this->subdiv != ""){
      
	    $sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
	            WHERE subdivision REGEXP '.$this->subdiv.' 
              AND city = '.$this->city.'
	            ORDER BY listing_price DESC';
		}
		else if ($this->date_from != "") {

	    $sql = "SELECT * FROM MLS_TBLNAME WHERE (listing_entry_timestamp > '$this->date_from' ) ORDER BY listing_price DESC";

		}
		else if ($this->property_type != "") {

	    $sql = 'SELECT * FROM '.self::MLS_TABLENAME. '
	    				WHERE property_type = '.$this->property_type.'
	    				ORDER BY listing_price DESC ';

		}

    $this->stm = $this->prepare($sql);
		$this->stm->execute();

    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }

  public function getSearchHeaderInfo () {

      // check class data
    $sql = $this->buildQuery(true);

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];
    $this->count = $this->row['cnt'];

	}

  public function getCityDropDownInfo () {

      // check class data
    $sql = "SELECT DISTINCT city FROM ".self::MLS_TABLENAME." where city <> '' AND county <> 'Palm Beach' OR county='Martin' ORDER BY city ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    foreach ($this->stm->fetchAll(PDO::FETCH_ASSOC) as $row) {
			$retval.="<option value='".str_replace(' ','-',$row['city'])."'> ".$row['city']."</option>";
    }

    echo $retval;

	}
  
  public function getCityDropDown($county) {

      // check class data
    $sql = "SELECT DISTINCT city FROM ".self::MLS_TABLENAME." where  county = '$county' ORDER BY city ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    
    $retval="";
    
    foreach ($this->stm->fetchAll(PDO::FETCH_ASSOC) as $row) {
      $retval.="<option value='".str_replace(' ','-',$row['city'])."'>".$row['city']."</option>";
    }

    echo $retval;

  }

  public function doSearch () {

    // check class data
    $sql = $this->buildQuery();

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    
    // adding pagination
    
    $this->pagination = new zPagination();
    $this->pagination->records($this->count);
    $this->pagination->records_per_page($this->recs_per_page);
    $this->pagination->method('url');
    $this->pagination->base_url("",false);
    
    $this->rows = array_slice(
      $this->rows,
      (($this->pagination->get_page() - 1) * $this->recs_per_page),
      $this->recs_per_page);
      
    $this->count=count($this->rows);
    
    $this->rowIdx = 0;

    // set row to first
    if ($this->count > 0)
      $this->row=$this->rows[$this->rowIdx++];

  }
  /******************************************************************************************************************/
  // end search methods
  /******************************************************************************************************************/

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
  
  ///////////////////////////////////////////////////////////////////////////////
  //
  //  class utility funcs...
  //
  ///////////////////////////////////////////////////////////////////////////////

	// get all city names in database and check for match
	public function isCity($area) {
    
    if (strtolower($area)=="all") {
      return false;
    }
    
		$sql = 'SELECT distinct(city) FROM '.self::MLS_TABLENAME.' WHERE county = "Palm Beach" OR county = "Martin" ';
    $stm = $this->prepare($sql);
    $stm->execute();
    $cities= $stm->fetchAll(PDO::FETCH_COLUMN, 0);
    
   // $citiesnew = array_map('trim', $cities['city']);
    $area = trim(ucwords($area));
    
    if (in_array($area,$cities))
    	return true;
    else
    	return false;

	}

  /******************************************************************************************************************/
	//  in order to save time, i cut-n-pasted this crappy-yet-working SQL logic from dbasile.com - please forgive me - marke
  /******************************************************************************************************************/
	public function buildQuery($countFlag=false) {

	    // grab "tag" string for use in titles/seo
    if (isset($_GET['tag'])) {
      $this->tag = ucwords(fixDashes($_REQUEST['tag']));
    }

    
    // jump out of here if an MLS # is discovered /////////////////////////////////////////////////////////////////////////////////////////////////
    if (!empty($_GET['mlsid'])) {
      return "SELECT * FROM ".self::MLS_TABLENAME." WHERE listing_id = '$_GET[mlsid]' ";
    }
       
    if (!empty($_GET['id'])) {
       return "SELECT * FROM ".self::MLS_TABLENAME." WHERE listing_id = '$_GET[id]' ";
    }   
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		$area = strtolower($_GET['area']);
    
    if ($this->isCity($area)) {
      $city = $this->cityname = ucwords($area);  
      $sql_or[] = "city = '$city'";
    }
    
    if (!empty($this->subdiv))
      $sql_or[] = "subdivision REGEXP '$this->subdiv'";

		// throw city into the search becuz sometimes the data has a blank listing_area....sigh - marke
		if (!empty($_GET['city']))
		  $sql_or[] = "city = '$city'";


		// create multi-city OR sql statement...implode() magic - marke
		if (!empty($sql_or))
			$orsql = '('.implode(" OR ", $sql_or).')';

    $sql_addition = array();
    
    //
    //  process the search and property type info ////////////////////////////////////////////  
    //
    if (strtolower($_REQUEST['searchtype']) == "rental") {
      $sql_addition[] = " property_type='rental' ";
      $mult=1;
    }
    else {
      $sql_addition[] = " property_type='residential' ";
      if (isset($_GET['pricerange']) && !isset($_GET['url'])) $mult=1000; else $mult=1;      
    }
   
		$this->setPropertyType($_GET['proptype']);
    
		switch (strtolower($_GET['proptype'])) {

		  // kludge-y way to deal with property_type search - ugh sorry
		  case "homes":
          case "house":
		    $type = " property_sub_type = 'Single Family Detach' ";
		    $isComm = false;
		  break;
      
      case "villa":
		  case "townhome":
		  case "townhomes":
		  case "townhouse":
		    $type = " ( property_sub_type='townhouse' OR property_sub_type = 'villa' ) ";
		  break;

		  case "condo":
		  case "condos":
		    $type = " property_sub_type='Condo/Coop' ";
		  break;
      
      case "new":
        $type = " (DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= listing_date) ";
      break;

		  case "industrial":
		    $type = "property_type='commercial' AND property_sub_type='industrial' ";
		  break;

		  case "commercial":
		    $type = "property_type='commercial' AND property_sub_type='commercial' ";
		    if (isset($srch) && $srch=="sale")
    			$isComm = true;
		  break;

		  case "vacantland":
		    $type = "property_type='vacantland'";
		  break;

		  case "listings":
		  default:
		  	// ALL proptype falls here
		  break;
		} // end proptype switch
    
		if (!empty($type))
			$sql_addition[] = $type;
      
    //
    //  end process top level type data ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //


		// quickie hack to filter commercial prop searches by sale or lease
		if (!empty($_GET['srch'])) {
		  $sql_addition[] = " sale_lease = '$srch' ";
		}
    
    // quickie hack to filter commercial prop searches by sale or lease
   
    if (!empty($_GET['subdiv'])) {
      $_GET['subdiv']=fixDashes($_GET['subdiv']);
      $sql_addition[] = " subdivision REGEXP '$_GET[subdiv]'";
    }
    
    if (isset($_REQUEST['bedrange']) && !empty($_REQUEST['bedrange'])) {
      list($_GET['bedrooms_from'],$_GET['bedrooms_to']) = explode("-",$_REQUEST['bedrange']);
    }
    
    if (isset($_REQUEST['pricerange']) && !empty($_REQUEST['pricerange'])) {
      list($_GET['minprice'],$_GET['maxprice']) = explode("-",$_REQUEST['pricerange']);
    }
 
    //
    //  processing search prices based on subsearch and chekcbox info /////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    
    if(empty($_GET['searchsubtype'])) {
      
      if(!empty($_GET['seasonal'])) {
        
        if(!empty($_GET['minprice'])) {
          $price_from = $_GET['minprice']*$mult;
          $sql_addition[] = " furn_ann_rent >= $price_from ";
        }

        if(!empty($_GET['maxprice'])) {
          $price_to = $_GET['maxprice']*$mult;
          $sql_addition[] = " furn_ann_rent <= $price_to ";
        }
      }
      else {
      
        if(!empty($_GET['minprice'])) {
          $price_from = $_GET['minprice']*$mult;
          $sql_addition[] = " listing_price >= $price_from ";
        }

		    if(!empty($_GET['maxprice'])) {
			    $price_to = $_GET['maxprice']*$mult;
			    $sql_addition[] = " listing_price <= $price_to ";
		    }
      }
    }
    
    else {
    
      if ($_GET['searchsubtype']=="petfurn") {
      
        if(!empty($_GET['minprice'])) {
          $price_from = $_GET['minprice'];
          $sql_addition[] = " furn_ann_rent >= $price_from ";
        }

        if(!empty($_GET['maxprice'])) {
          $price_to = $_GET['maxprice'];
          $sql_addition[] = " furn_ann_rent <= $price_to ";
        }
      }        
        
      if ($_GET['searchsubtype']=="petunfurn") {
      
        if(!empty($_GET['minprice'])) {
          $price_from = $_GET['minprice'];
          $sql_addition[] = " listing_price >= $price_from ";
        }

        if(!empty($_GET['maxprice'])) {
          $price_to = $_GET['maxprice'];
          $sql_addition[] = " listing_price <= $price_to ";
        }
      }        
          
    }
      
    if(!empty($_GET['price_from'])) {
      $price_from = $_GET['price_from']*$mult;
      $sql_addition[] = " listing_price >= $price_from ";
    }

      
    if(!empty($_GET['price_to'])) {
      $price_to = $_GET['price_to']*$mult;
      $sql_addition[] = " listing_price <= $price_to ";
    }
    
    //
    //  end process price search  ///////////////////////////////////////////////////////////////////////////
    //
    
    if(!empty($_GET['beds']) && ($_GET['beds']=="4+")){
      $_GET['bedrooms_from']=4;
      $_GET['bedrooms_to']=20;
      unset($_GET['beds']);
    }
    if(!empty($_GET['beds'])) {
      $bedrooms = $_GET['beds'];
      $sql_addition[] = " bedrooms =$bedrooms ";
    }

		if(!empty($_GET['bedrooms_from'])) {
			$bedrooms_from = $_GET['bedrooms_from'];
		  $sql_addition[] = " bedrooms >=$bedrooms_from ";
		}
    
    if(!empty($_GET['bedrooms_to'])) {
      $bedrooms_to= $_GET['bedrooms_to'];
      $sql_addition[] = " bedrooms <=$bedrooms_to ";
    }
    
    if(!empty($_GET['baths']) && ($_GET['baths']=="4+")){
      $_GET['bathrooms_from']=4;
      $_GET['bathrooms_to']=20;
      unset($_GET['baths']);
    }
    if(!empty($_GET['baths'])) {
      $baths = $_GET['baths'];
      $sql_addition[] = " bathrooms = $baths ";
    }

		if(!empty($_GET['bathrooms_from'])) {
			$bathrooms_from = $_GET['bathrooms_from'];
		  $sql_addition[] = " bathrooms >=$bathrooms_from ";
		}

		if(!empty($_GET['bathrooms_to'])) {
			$bathrooms_to = $_GET['bathrooms_to'];
		  $sql_addition[] = " bathrooms <=$bathrooms_to ";
		}

		/* FOOTAGE */
		if(!empty($_GET['sqft_from'])) {
			$footage_from = $_GET['sqft_from'];
		  $sql_addition[] = " sqft_living >=$footage_from ";
		}

		if(!empty($_GET['sqft_to'])) {
			$footage_to  = $_GET['sqft_to'];
		  $sql_addition[] = " sqft_living <=$footage_to ";
		}

		if(!empty($_GET['dwelling'])) {
			$dwelling = $_GET['dwelling'];
		  $sql_addition[] = " dwelling_view LIKE '%$dwelling%' ";
		}

		if(!empty($_GET['year_from'])) {
			$year_from = $_GET['year_from'];
		  $sql_addition[] = "year_built >= $year_from";
		}

		if(!empty($_GET['year_to'])) {
			$year_to = $_GET['year_to'];
		  $sql_addition[] = "year_built <=$year_to";
		}

		if(!empty($_GET['pool'])) {
      
			$pool = $_GET['pool'];
		  if ($pool=="on") {
		  	$sql_addition[] = " private_pool = 'Yes' ";
		  } else {
		  	$sql_addition[] = " private_pool = 'No' OR private_pool = '' ";
		  }
		}

		if(!empty($_GET['over55'])) {
			
		  $sql_addition[] = " ( remarks REGEXP 'adult' OR remarks REGEXP '55' ) ";
		}
    
    if(!empty($_GET['reo'])) {
      
      $sql_addition[] = " ( reo = 'Yes' ) ";
    }

    if(!empty($_GET['pets'])) {
      
      $sql_addition[] = " ( pets = 'Yes' OR pets = 'Restricted' ) ";
    }   
    
    if(!empty($_GET['gated'])) {  
      $sql_addition[] = " security REGEXP 'gate' ";
    }

		/* FORECLOSURE */
		if(!empty($_GET['shortsale'])) {
		  $sql_addition[] = " short_sale = 'Yes' ";
		}
    
    if(!empty($_GET['waterfront'])) {
      $sql_addition[] = " waterfront <> 'None' ";
    }

		//  seo quicksearch stuff to process searches - me
		if (isset($street) && $street != ""){
		  $street=str_replace("-"," ",$street);
		  $sql_addition[] = " street_name LIKE '%". $street ."%' ";
		}

		if (isset($zipcode) && $zipcode != ""){
		  $sql_addition[] = " postal_code = '". $zipcode ."' ";
		}

		/* WATER */
		if (!empty($watertype) && $watertype != ""){
		  $watertype = fixDash($watertype);
		  $sql_addition[] = " water_type LIKE '%". $watertype ."%' ";
		}

		$andsql = implode(" AND ", $sql_addition);

		if (isset($orsql)) {
		  if(!empty($andsql)) $andsql = ' AND ' . $andsql;
		}
    else $orsql="";

		if ($countFlag)
			return "SELECT count(*) as cnt,property_sub_type,city,postal_code FROM ".self::MLS_TABLENAME. " WHERE $orsql $andsql ORDER BY listing_price DESC";
		else
			return "SELECT * FROM ".self::MLS_TABLENAME." WHERE $orsql $andsql ORDER BY listing_price DESC";
	}
  
  protected function getImageArray() {
    
    include_once('includes/global.php');
    
    $listing_id = str_replace("'", "", $this->mls_id);

    $image_count = 0;
    $images = array();

    $fnArray1 = glob($base_image_dir.$listing_id."-?.jpg");
    if ($fnArray1==false) {
      $fnArray1 = array();
    }

    // fix the fact the glob sometimes doens't return an array type...
    $fnArray2 = glob($base_image_dir.$listing_id."-??.jpg");
    if ($fnArray2==false) {
      $fnArray2 = array();
    }

    // added for props with over 100 images...sigh..agents need to chill with that shit - marke
    $fnArray3 = glob($base_image_dir.$listing_id."-???.jpg");
    if ($fnArray3==false) {
      $fnArray3 = array();
    }

    // merge the arrays and get count
    $images1 = array_merge($fnArray2 , $fnArray3 );
    $images = array_merge($fnArray1 , $images1 );
    $image_count = count($images);

    return $images;

}

}





