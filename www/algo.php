<?php

/*
 * we will use class to get details about he pics
 * where the basic data will be stored in member variables var $var
 * and to access this variable we will use member fuction 
 * all hail OOP for simple solutions
 */
 
 /*
 * SELECT * FROM boys order by NOI asc limit 1; --least shown
 * SELECT * FROM boys order by RAND()  limit 1; --random access
 */
class pics{
	public $gender;
	public $id;
	public $name;
	public $NOI;
	public $dir;
	
	var $sql;
	var $result;
	var $data;
	
	function sel_least($conn){
		$this->sql = "SELECT NAME,ID,NOI FROM $this->gender order by NOI asc limit 1";
		$this->result = $conn->query($this->sql);
		$this->data = $this->result ->fetch_assoc();
		$this->name = ($this->dir).$this->data["NAME"];
		$this->id = $this->data["ID"];
		$this->NOI = $this->data["NOI"];
		$this->NOI = ($this->NOI + 1);
		$this->sql = "UPDATE $this->gender SET NOI= $this->NOI WHERE ID= $this->id ";
		$conn->query($this->sql);
		
	}

	function sel_random($conn){
		$this->sql = "SELECT NAME,ID,NOI FROM $this->gender order by RAND() limit 1";
		$this->result = $conn->query($this->sql);
		$this->data = $this->result ->fetch_assoc();
		$this->name = ($this->dir).$this->data["NAME"];
		$this->id = $this->data["ID"];
		$this->NOI = $this->data["NOI"];
		$this->NOI = ($this->NOI + 1);
		$this->sql = "UPDATE $this->gender SET NOI= $this->NOI WHERE ID= $this->id ";
		$conn->query($this->sql);
		
	}
	function sel_dir(){
		if($this->gender == "boys")
			$this->dir="/dp/boys/";
		else
			$this->dir="/dp/girls/";
	}
	
}