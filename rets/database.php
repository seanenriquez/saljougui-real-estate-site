<?php
$configDB = array(
  'DB_HOST' => 'localhost',
  'DB_NAME' => 'admin_lvluxe',
  'DB_USER' => 'admin_lvluxe',
  'DB_PASS' => 'CQTXTvwB6O',
  'DB_DRIVER' => 'mysql'
);

echo "Connecting to database..";
mysql_connect($configDB['DB_HOST'], $configDB['DB_USER'], $configDB['DB_PASS']) or die(mysql_error());
mysql_select_db($configDB['DB_NAME']) or die(mysql_error());

// Get State Abbreviation
function getState($state = '', $postal_code = '')
{
    
    if(!empty($postal_code))
    {
        
    $zipcode_sql = "SELECT * FROM zipcode_lookup WHERE Zipcode = '{$postal_code}' AND LocationType = 'Primary'";
    $query_result = mysql_query($zipcode_sql);
    
    while($rows = mysql_fetch_array($query_result))
    {
      $zipcode_lookup = $rows;
    }
    
    return $zipcode_lookup['State'];
  
  }
  elseif(!empty($state))
  {
    
    $state_abb_sql = "SELECT * FROM states_abbreviation WHERE State = '{$state}'";
    $query_result = mysql_query($state_abb_sql);
    
    while($rows = mysql_fetch_array($query_result))
    {
      $state_abb_lookup = $rows;
    }
    
    return $state_abb_lookup['Abbreviation'];
  }
    
    return false;
    
}

// Get County
function getCounty($postal_code = '', $city = '')
{
    
    if(!empty($postal_code))
    {
      
    $county_results = mysql_query("SELECT * FROM `zipcode_county_lookup` WHERE `zip_code` = '{$postal_code}' LIMIT 1");
    if(mysql_num_rows($county_results) > 0)
    {
      $row_1 = mysql_fetch_assoc($county_results);
      return $row_1['county'];
    }
  
  }
  elseif(!empty($city))
  {
    
    $county_results = mysql_query("SELECT * FROM `zipcode_county_lookup` WHERE `city` = '{$city}' LIMIT 1");
    if(mysql_num_rows($county_results) > 0)
    {
      $row_1 = mysql_fetch_assoc($county_results);
      return $row_1['county'];
    }
  }
    
    return false;
}