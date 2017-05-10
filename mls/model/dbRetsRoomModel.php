<?php

include_once('mls/model/pdoConfig.php');
include_once('includes/utils.php');

//include_once('mls/model/areazone.php');


// hold the data in this class
class dbRetsRoom extends PDOConfig {

	public  $row;
	public  $count;
    public  $room_type_array;

	const MLS_TABLENAME = 'glvar_propertysubtype_rooms';
    
	public function __construct(){
		parent::__construct( );
	}
    
    // generic data function to grab fields directly
    public function getData($inFld) {
        return str_replace(",",", ",$this->row[$inFld]);
    }       
}

// do the sql searching in this class
class dbRetsRoomModel extends dbRetsRoom {

	// vars to handle internal row management
	private $rows;
	public  $rowIdx;
	private $stm;
	private $vars;
	private $paging;

	// search fields
	private $mls_id;

	public $pagination;
	private $recs_per_page=40;

	public function __construct($mlsid=""){
		
        parent::__construct( );
        
        if ($mlsid != "") {
            
            $this->load_single_prop_rooms($mlsid);
                
        }
	}
    
    public function load_single_prop_rooms($sysid) {
        
        $sql = "SELECT * FROM glvar_propertysubtable_room
                WHERE listing_mui='$sysid' ";
                
        $this->process_sql($sql);
        $this->build_rooms_array();
        
    }
    
    public function set_room_info($room_type) {
        
        foreach ($this->rows as $row) {
            
            if ($row['Room_Type']==$row_type) {
                $this->row = $row;   
                return true;             
            }
            return false;
            
        }
    }
    
    public function build_rooms_array() {
        
        $this->room_type_array = array();
        
        foreach ($this->rows as $row) {
            
           $this->room_type_array[ $row['Room_Type'] ] = array($row['Room_Description'],$row['Room_Dimensions']);
            
        }
        
        
    }
    
    public function process_sql($sql) {
            
        $this->stm = $this->prepare($sql);

        $this->stm->execute();
        $this->rows= $this->stm->fetchAll(PDO::FETCH_ASSOC);
        $this->count = $this->stm->rowCount();
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

}





