<?php

/**
 * File to handle all API requests
 * Accepts REQUEST and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data

  /**
 * check for POST request 
 */
if (isset($_REQUEST['tag']) && $_REQUEST['tag'] != '') 
{
    // get tag
    $tag = $_REQUEST['tag'];

    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

   //Beginning of Login 


   
	if ($tag=='events')
	{  
       
		$getevents=$db->getevents();
		if($getevents)
		{
			for($i=0;$i<count($getevents); $i++)
					{	
					  foreach($getevents[$i] as $key => $value)
					  {
						
						if($key == "eventid")
						{
						$response["getevents"][$i]["eventid"] = $getevents[$i]["eventid"];
						}
						if($key == "eventdescription")
						{
						$response["getevents"][$i]["eventdescription"] = $getevents[$i]["eventdescription"];
						}
						if($key == "eventaddress")
						{
						$response["getevents"][$i]["eventaddress"] = $getevents[$i]["eventaddress"];
						}
						if($key == "eventstartdate")
						{
						$response["getevents"][$i]["eventstartdate"] = $getevents[$i]["eventstartdate"];
						}
						if($key == "eventstarttime")
						{
						$response["getevents"][$i]["eventstarttime"] = $getevents[$i]["eventstarttime"];
						}
						
					  }
					}
		}
		else
		{
			$response["error"]=FALSE;
			$response["error_msg"]="No Discovery";
		}
		
		echo json_encode($response);
	}
	else 
		{
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknow 'tag' value.";
        echo json_encode($response);
		}
} 
	else 
	{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
	}
	

?>
