<? 
//find files from del folder
	$del_count = 0;
	$nd = 0;
	$del = 'C:\www\del';
//array of files to be deleted from dp/girls and dp/boys
	$del_arr = array_diff(scandir($del),array('..','.'));
//delete files from dp/girls and dp/boys using array from del folder
//and count the no. of deletion
 	foreach($del_arr as $value){
		if(file_exists('C:\www\dp\girls\\'.$value)){
			unlink('C:\www\dp\girls\\'.$value);
			$del_count++;
		}
		elseif(file_exists('C:\www\dp\boys\\'.$value)){
			unlink('C:\www\dp\boys\\'.$value);
			$del_count++;
		}else{
			echo "could not del -> ". $value."<br>";
			$nd++;
		}
	}
?>
<html>
<head><title>fuck yeah!!!</title><head>
<body>
<h1> removal of b.ed- 1 students from the dp list</h1>
<? echo $nd;
?>
</p>
</body>
</html>