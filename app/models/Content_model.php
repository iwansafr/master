<?php
class Content_model
{
	var $db;
	public function __construct()
	{
		$this->db = new Database();
	}
	public function all()
	{
		return $this->db->query('SELECT * FROM content');
	}
	public function save()
	{
		if(!empty($_POST))
		{
			$this->db->query('INSERT INTO content (`title`,`content`) VALUES(?,?)',$_POST);
		}
	}
}