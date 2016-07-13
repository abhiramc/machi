<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    
	
	public function getevents()
	{
	$query = mysql_query("SELECT * from events ORDER BY eventid DESC");
          $data_result = array();
			if($query)
			{
				while ($row = mysql_fetch_array($query)) {
					array_push($data_result, $row);
				}
				return $data_result;
			
				
			} 
		
		else
		{
			
			return false;
		}	
          
	}
	
}

?>
