<?php

include_once('mls/model/pdoConfig.php');

// hold the RETS data in this class
class dbSearchButton extends PDOConfig {

  public  $row;

  public function __construct(){

  parent::__construct( );

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getter methods to expose class data cleanly
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getCityName () {
    return fixBlanks($this->row['city']);
  }

  public function getStyle () {
    
    switch (strtolower($this->row['style'])) {
      
      case 'single family detach':
        return "House";
        break;
      case 'condo/coop':
        return "Condo";
        break;
      case 'townhouse|villa':
        return "Townhouse/Villa";
        break;
      default:
        return $this->row['style'];
    }
  }


  public function getBeds () {
    return fixBlanks($this->row['beds']);
  }

  public function getTierCount ($inStg) {
    return fixBlanks($this->row[$inStg]);
  }

  public function getCommunityName () {
    return fixBlanks($this->row['subdivision_area_name']);
  }

  public function getButtonLabel () {
    return $this->row['subdivision_area_name']. " [".$this->row['hits']."] ";
  }


  public function getSearchType () {
    return $this->searchtype;
  }


}

// do the sql searching in this class
class dbSearchButtonModel extends dbSearchButton {

  // vars to handle internal row management
  private $rows;
  private $rowIdx;
  private $count;
  private $stm;

  // search fields
  public $proptype;
  private $city;
  public $searchtype;
  private $buttype;

  public function __construct(){

    parent::__construct( );

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // setter methods to set internal search fields
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function setPropertyType ($inStg) {
		$this->proptype=PDO::quote($inStg);
    $this->searchtype = $inStg;
  }

  public function setButtonType ($inStg) {
		$this->buttype=PDO::quote($inStg);
  }

  public function setCity ($inStg) {
    $this->city=fixDashes(PDO::quote($inStg));
  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getCommunityList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getCommunityButtons :: Invalid Search - please check to make sure search terms are set.");
    }
  
    if (($this->searchtype) == "rental") {
      
      $tag = "current_rental_hits";
      
    } else {
      
      $tag = "current_hits";
    }

    $sql = "SELECT subdivision_area_name, $tag as hits, city FROM community_area_information
            WHERE (city = ".$this->city.") 
            ORDER BY subdivision_area_name ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getCommunityButtons :: Empty Results - please check to make sure page exists in database.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // 
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getStyleSaleList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getStyleSaleList :: Invalid Search - please check to make sure search terms are set.");
    }

    $sql = "SELECT * FROM style_sales
            WHERE (city = ".$this->city.") 
            ORDER BY style ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getStyleSaleList :: Empty Results - please check to make sure page exists in database.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // 
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getPriceBedsSaleList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getPriceBedsSaleList :: Invalid Search - please check to make sure search terms are set.");
    }

    $sql = "SELECT * FROM beds_sales
            WHERE (city = ".$this->city.") 
            ORDER BY beds ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getPriceBedsSaleList :: Empty Results - please check to make sure page exists in database.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // 
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getPriceBedsList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getPriceBedsList :: Invalid Search - please check to make sure search terms are set.");
    }
  
    if (($this->searchtype) == "rental") {
      
      $tag = "current_rental_hits";
      
    } else {
      
      $tag = "current_hits";
    }

    $sql = "SELECT * FROM annual_rentals
            WHERE (city = ".$this->city.") 
            ORDER BY beds ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getCommunityButtons :: Empty Results - please check to make sure page exists in database.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getStyleList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getStyleList :: Invalid Search - please check to make sure search terms are set.");
    }
  
    $sql = "SELECT * FROM style_rentals
            WHERE (city = ".$this->city.") 
            ORDER BY style ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getStyleList :: Empty Results - please check to make sure data exists in database table style_rentals.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getSeasonalList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getSeasonalList :: Invalid Search - please check to make sure search terms are set.");
    }
  
    $sql = "SELECT * FROM seasonal_rentals
            WHERE (city = ".$this->city.") 
            ORDER BY beds ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getSeasonalList :: Empty Results - please check to make sure data exists in database table style_rentals.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getPetsFurnList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getPetFurnList :: Invalid Search - please check to make sure search terms are set.");
    }
  
    $sql = "SELECT * FROM pet_furn_rentals
            WHERE (city = ".$this->city.") 
            ORDER BY beds ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getPetFurnList :: Empty Results - please check to make sure data exists in database table style_rentals.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getPetsUnfurnList () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
      throw new Exception(" dbSearchButtonModel :: getPetUnfurnList :: Invalid Search - please check to make sure search terms are set.");
    }
  
    $sql = "SELECT * FROM pet_unfurn_rentals
            WHERE (city = ".$this->city.") 
            ORDER BY beds ASC";

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbSearchButtonModel :: getPetUnfurnList :: Empty Results - please check to make sure data exists in database table style_rentals.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }




  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getButtons () {

    // check class data
    if (($this->proptype == "") && ($this->city == "")) {
			throw new Exception(" dbSearchButtonModel :: getButtons :: Invalid Search - please check to make sure search terms are set.");
    }

    $sql = 'SELECT * FROM pages
            WHERE (page_name = '.$this->page_name.') ';

    if (!empty($this->id)) {
     $sql .= 'OR (id = '.$this->id.')';
    }

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
  	if ($this->count == 0) {
			throw new Exception("dbPageSearch :: getPage :: Empty Results - please check to make sure page exists in database.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

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
