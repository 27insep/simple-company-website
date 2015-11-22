<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Test extends Main {	
	public function __construct() 
	{
		parent::__construct();
		
	}
	public function test_connection()
	{
		$conn = mysql_connect("localhost","hitera_admin","p@ssw0rd");
		//$conn = mysql_connect("localhost","root","");
		/*
		if($objConnect) 
		{
			echo "Database Connected."; 
			
			mysql_select_db("hitera");
		
			$result = mysql_query("select * from tbl_admin_user");
			
			while ($row = mysql_fetch_array($result)) {
			    echo $row[0];
			}
		}else
			{
				echo "Database Connect Failed."; 
				
			}
		*/

		if (!$conn) {
			echo "Unable to connect to DB: " . mysql_error();
			exit;
		}

		if (!mysql_select_db("hitera_HITDB")) {
			echo "Unable to select mydbname: " . mysql_error();
			exit;
		}

		$sql = "select * from tbl_admin_user";

		$result = mysql_query($sql);

		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}

		if (mysql_num_rows($result) == 0) {
			echo "No rows found, nothing to print so am exiting";
			exit;
		}

		// While a row of data exists, put that row in $row as an associative array
		// Note: If you're expecting just one row, no need to use a loop
		// Note: If you put extract($row); inside the following loop, you'll
		//       then create $userid, $fullname, and $userstatus
		while ($row = mysql_fetch_assoc($result)) {
    	foreach($row as $index=>$value)
			echo $index."=".$value."<br/>";
		}

		mysql_free_result($result);
	}
	
	public function test()
	{
		phpinfo();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */