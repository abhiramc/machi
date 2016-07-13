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
       
		$getevents1=$db->getevents1();
		if($getevents1)
		{
			for($i=0;$i<count($getevents1); $i++)
					{	
					  foreach($getevents1[$i] as $key => $value)
					  {
						
						if($key == "eventid")
						{
						$response["getevents1"][$i]["eventid"] = $getevents1[$i]["eventid"];
						}
						if($key == "eventdescription")
						{
						$response["getevents1"][$i]["eventdescription"] = $getevents1[$i]["eventdescription"];
						}
						if($key == "eventaddress")
						{
						$response["getevents1"][$i]["eventaddress"] = $getevents1[$i]["eventaddress"];
						}
						if($key == "eventstartdate")
						{
						$response["getevents1"][$i]["eventstartdate"] = $getevents1[$i]["eventstartdate"];
						}
						if($key == "eventstarttime")
						{
						$response["getevents1"][$i]["eventstarttime"] = $getevents1[$i]["eventstarttime"];
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
