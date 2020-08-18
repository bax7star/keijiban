<?php
class DB{
	public function connect(){
		$pdo=new PDO("mysql:dbname=Lesson01;host=localhost;","root","root");
		return $pdo;
	}
	
	public function insert(){
		return "insert into 4each_keijiban(handlename,title,comments)values(?,?,?)";
	}
	
	public function select(){
		return "select * from 4each_keijiban";
	}
}
?>