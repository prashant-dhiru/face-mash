<!DOCTYPE html>
<?php
//include database connection to the script

include("\connection.php");
include("\algo.php");

$a = new pics ; $b = new pics;

$pick_gen = rand(0,1);

if($pick_gen == 0 ){		//select gender on random 
	$a->gender = "boys";
	$b->gender = "boys";
}else{
	$a->gender = "girls";
	$b->gender = "girls";
}
$a -> sel_dir();
$b -> sel_dir();
$a -> sel_random($conn);
$b -> sel_least($conn);	


?>

<html>
<head>
	<title>disha-bq</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script>		//use ajax to send win lose info and run php in another file
var aID,bID,gender;
aID  = "<?php echo $a->id ?>"
bID = "<?php echo $b->id ?>"
gender ="<?php echo $a->gender ?>"
 
function a_win(){
	var xhttp = new XMLHttpRequest();		//change here to send win lose info
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			window.location.reload();
		}
	};
	xhttp.open("GET","update.php?win="+aID+"&lose="+bID+"&gender="+gender, false); 
	xhttp.send();
	
}
function b_win(){
	var xhttp = new XMLHttpRequest();	//change here to send win lose info
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			window.location.reload();
		}
	};
	xhttp.open("GET","update.php?win="+bID+"&lose="+aID+"&gender="+gender, false);
	xhttp.send();

};

//    window.location.reload();


</script> 
	<h1>Disha Beauty Contest</h1>
	<p>Do we care for looks ? NO. But can we atleast judge them ? YES</p>
	<p>Which of the two have nicer pic ? Click to select</p>
	<p>
		<img class = "photo" src="<? echo $a->name ?>" alt = "<? echo $a->name ?>" onclick="a_win()"> or 
		<img class = "photo" src="<? echo $b->name ?>" alt = "<? echo $b->name ?>" onclick="b_win()">	
	</p>
	<p id = "demo"><a href="top10.php">[check out Top 10]</p>
	
</body>
</html>
