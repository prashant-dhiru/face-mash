<?php

include("\connection.php");


class pics{
	public $id;
	public $rate;
	public $exp;
	public $weight;
	
	public $gender;
	public $k;			//no of candidates;
	
	var $sql;
	var $result;
	var $data;	
	
	//functions to use this properties;
	
	function get_rate($conn){
		$this->sql = "SELECT RATING FROM $this->gender WHERE ID=$this->id";
		$this->result = $conn->query($this->sql);
		$this->data = $this->result->fetch_assoc();
		$this->rate = $this->data["RATING"];
	}
	
	function get_expect($rate_x){
		$this->exp = 1.0/(1+(10 ** (($rate_x - $this->rate)/400)));
	}
	
	function new_rate($conn){
		$this->rate = $this->rate + $this->k*($this->weight - $this->exp);
		$this->sql = "UPDATE $this->gender SET RATING=$this->rate WHERE ID=$this->id";
		$conn->query($this->sql);
	}
	
	function cal_k(){
		if($this->gender === "boys"){
			$this->k=533;
		}else{
			$this->k=417;
		}
	}
}

$win = new pics;
$lose = new pics;
$win->gender = $_REQUEST["gender"];
$lose->gender= $_REQUEST["gender"];


$win->cal_k();
$lose->cal_k();


$win->id  = intval($_REQUEST["win"]);
$lose->id = intval($_REQUEST["lose"]);


$win ->get_rate($conn);
$lose->get_rate($conn);

$win ->get_expect($lose->rate);
$lose->get_expect($win ->rate);

$win ->weight = 1;
$lose->weight = 0;

$win->new_rate($conn);
$lose->new_rate($conn);

echo $win->k."<br>";
echo $win->gender."<br>";
echo $win->rate."<br>";
echo $win->weight."<br>";
echo $win->exp;
?>
