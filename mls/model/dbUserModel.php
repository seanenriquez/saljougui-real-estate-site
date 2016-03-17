<?php

include_once('mls/model/pdoConfig.php');

// hold the RETS data in this class
class dbUser extends PDOConfig {

  public  $row;

  public function __construct(){

    parent::__construct( );

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getter methods to expose class data cleanly
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getPWHash () {
   return $this->row['pwhash'];
  }

  public function getUserId () {
   return $this->row['id'];
  }

  public function getUserEmail() {
   return $this->row['email'];
  }

}

// do the sql searching in this class
class dbUserModel extends dbUser {

  // vars to handle internal row management
  private $rows;
  private $rowIdx;
  private $count;
  private $stm;

  // search fields
  private $user_name;
  private $id;

  public function __construct(){

    parent::__construct( );

  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // setter methods to set internal search fields
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function setUserEmail ($inStg) {
    $this->email=PDO::quote($inStg);
  }

  public function setId ($inStg) {
    $this->id=PDO::quote($inStg);
  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //
  // getPage() loads class vars with data from database wia search
  //
  ///////////////////////////////////////////////////////////////////////////////////////
  public function getUser () {

    // check class data
    if (($this->email == "") && ($this->id == "")) {
      throw new Exception("dbPageSearch :: getPage :: Invalid Search - please check to make sure search terms are set.");
    }

    $sql = 'SELECT * FROM user
            WHERE (email = '.$this->email.') ';

    if (!empty($this->id)) {
     $sql .= 'OR (id = '.$this->id.')';
    }

    $this->stm = $this->prepare($sql);

    $this->stm->execute();
    $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
    $this->count = $this->stm->rowCount();
    if ($this->count == 0) {
      throw new Exception("dbEmailSearch :: getUser :: Empty Results - please check to make sure user exists in database.");
    }

    $this->rowIdx = 0;

    // set row to first
    $this->row=$this->rows[$this->rowIdx++];

  }
  
  public function logoffUser() {
    
    session_destroy();
    
  }
  
  public function loginUser() {
    
    $email = $_POST['email'];
    $_SESSION["loggedin"]=true;
    $_SESSION["email"]=$email;
    
  }
  
  
  
  public function addUser() {
    
    $email = $_POST['email'];
    $pwhash = md5($email);
    $phone =  $_POST['phone'];
    
    $data = array(':email'=>$email,
                  ':pw_hash'=>$pwhash,
                  ':phone'=>$phone);
                      
    $sql = "INSERT INTO user SET email = :email, pw_hash = :pw_hash, phone = :phone";
    
    $this->stm = $this->prepare($sql);
    $this->stm->execute($data);
    $_SESSION["loggedin"]=true;
    $_SESSION["email"]=$email;
    
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
