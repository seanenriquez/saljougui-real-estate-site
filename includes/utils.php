<?php
   

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  //  GLOBAL UTILITY FUNCTIONS - because not everything should be in a class
  //
  /////////////////////////////////////////////////////////////////////
  function fixBlanks($inStg){
    return str_replace(" ","-",$inStg);
  }

  function fixDashes($inStg){
    return str_replace("-"," ",$inStg);
  }
  
  function getCitySearchButtonsByPrice($city,$proptype) {
    
    $aPrices = array(75,100,125,150,175,200,225,250,275,300,350,400,450,500,600,750,1000,20000);
        
    $i=1;
    foreach ($aPrices as $price) {
      
      if ($price == 20000) {
        break;
      } else {
        $nextPrice = $aPrices[$i++];
        
        $tag = "$ {$price}k  to $ {$nextPrice}k";
        $price=$price*1000;
        $nextPrice=$nextPrice*1000;
        $prRange = "$price-$nextPrice";
    
        require("mls/view/citySearchButtonsCol.php");
      }
    }
  }
  
  function getCitySearchButtonsByCommunity($city,$proptype) {
    
    $aPrices = array(75,100,125,150,175,200,225,250,275,300,350,400,450,500,600,750,1000,20000);
        
    $i=1;
    foreach ($aPrices as $price) {
      
      if ($price == 20000) {
        break;
      } else {
        $nextPrice = $aPrices[$i++];
        
        $tag = "$ {$price}k  to $ {$nextPrice}k";
        $price=$price*1000;
        $nextPrice=$nextPrice*1000;
        $prRange = "$price-$nextPrice";
    
        require("mls/view/citySearchButtons.php");
      }
    }
  }
  
    function getCityDD($county) {
    
    $sql="SELECT DISTINCT(city) FROM master_rets_table where county='$county' ORDER BY city asc";
        
    
    foreach ($aPrices as $price) {
      
      if ($price == 20000) {
        break;
      } else {
        $nextPrice = $aPrices[$i++];
        
        $tag = "$ {$price}k  to $ {$nextPrice}k";
        $price=$price*1000;
        $nextPrice=$nextPrice*1000;
        $prRange = "$price-$nextPrice";
    
        require("mls/view/citySearchButtons.php");
      }
    }
  }
  
  
// UGH just UGH...
$dbhost = 'localhost';
$dbuser = 'tsgfl_dbuser';
$dbpass = 'eOlqo56HsC05';
$dbname = 'tsgfl_rets';
 
    
?>
