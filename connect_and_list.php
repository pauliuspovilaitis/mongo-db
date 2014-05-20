<?php

define('HOST', 'localhost');
	
class db
{
private static $db;
private static $conn;

	public function connect()
	{
		$this->conn = new Mongo(HOST);
		$this->db = $this->conn->test;
		return $this->db;
	}

	public function disconnect()
	{
		return $this->conn->close();
	}
}

$db = new db();

$collection = $db->connect()->items;
$cursor = $collection->find();

  foreach ($cursor as $obj) 
  {
    echo 'Vardas: ' . $obj['name'] . '<br/>';
    echo 'Kiekis: ' . $obj['quantity'] . '<br/>';
    echo 'Kaina: ' . $obj['price'] . '<br/><br/>';
  }


$db -> disconnect();


?>
