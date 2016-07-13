<?php 
$host="localhost";
$databasename="marshmallow";
$user="abhiramc";
$pass="Abhiram@24";
/**********MYSQL Settings****************/


$conn=mysql_connect($host,$user,$pass);

if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
}
else
{
    die('Not connected : ' . mysql_error());
}
		

		 
		 $eventname=$_POST['eventname'];
		 $eventdescription=$_POST['eventdescription'];
		 $eventaddress=$_POST['eventaddress'];
		 $eventstartdate=$_POST['eventstartdate'];
		 $eventstarttime=$_POST['eventstarttime'];
        	
			
					 
			$sql="INSERT INTO events(eventname,eventdescription,eventaddress,eventstartdate,eventstarttime) VALUES('$eventname','$eventdescription','$eventaddress','$eventstartdate','$eventstarttime')";
			$result=mysql_query($sql);
			if(!$result)
			{
				$response["error"] = TRUE;
			     $response["error_msg"] = "Error in Post Uploading";
			}
            
			            			
			$response["error"] = FALSE;
			$response["error_msg"] = "Post Upload Successfully";
			
			echo json_encode($response);  
		  
		
		
?>