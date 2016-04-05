<?php

require('database.php');
  
$sql= " DROP table IF EXISTS mrt_bu";
mysql_query($sql) or die(mysql_error() . $sql); 

$sql= "RENAME TABLE master_rets_table TO mrt_bu";
mysql_query($sql) or die(mysql_error() . $sql); 

$sql= "RENAME TABLE master_rets_table_update TO master_rets_table";
mysql_query($sql) or die(mysql_error() . $sql); 

$sql= "CREATE TABLE master_rets_table_update LIKE mrt_bu"; 
mysql_query($sql) or die(mysql_error() . $sql); 
  
?>