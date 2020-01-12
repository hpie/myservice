<?php
class DB {
public $connect;
	public function getConnection()
	{		
            
            $ip = explode(".", $_SERVER['HTTP_HOST']);                        
            if($ip[0]=='192' ||$_SERVER['HTTP_HOST']=='localhost')
                $con=mysqli_connect("localhost","root","","myservice");
            else 
                $con=mysqli_connect("localhost","s7hpiein_myservice","hp#t@xD8","s7hpiein_myservice"); 
		// Check connection
		if (mysqli_connect_errno())
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
		return $con;
	}	
	public function closeConnection($con)
	{
            //mysql_close($con);
            mysqli_close($con);
	}
}
?>