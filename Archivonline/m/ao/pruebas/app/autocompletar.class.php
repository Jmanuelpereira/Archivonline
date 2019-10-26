<?php
class Autocompletar
{

	private $dbh;

	public function __construct()
	{
		$this->dbh = new PDO("mysql:host=localhost;dbname=archivo", "root", "");
	}

	public function findData($search)
	{
		$query = $this->dbh->prepare("SELECT Nombre, Contador FROM usuarios WHERE Nombre LIKE :search");
        $query->execute(array(':search' => '%'.$search.'%'));
        $this->dbh = null;
        if($query->rowCount() > 0)
        {
        	echo json_encode(array('res' => 'full', 'data' => $query->fetchAll()));
        }
        else
        {
        	echo json_encode(array('res' => 'empty'));
        }
	}
}