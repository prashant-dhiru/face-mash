<?php
//login details
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "disha";
// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//find file to upload details
$dir = "C:\www\dp\boys";											// boy or girl
$file_name = array_diff(scandir($dir),array('..','.'));
echo "<pre>";

foreach($file_name as $value){
	if(file_exists($dir."\\".$value)){
		if($conn->connect_error){
			die("connection failed : ".$conn->connect_error);
		}
		
		$sql = "INSERT INTO boys(NAME) VALUES ('$value')";			//boy or girl
		
		if($conn->query($sql) === TRUE){
			echo "$value inserted<br>";
		}else{
			echo "Error : ".$sql."<br>".$conn->error;
		}
	}
}	
?> 
