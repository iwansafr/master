<?php
class Database{
	public $default = [
		'host' => 'localhost',
		'username' => 'root',
		'password' => 'Dks_080308',
		'database' => 'master'
	];
	public $db;
	public function __construct()
	{
		$this->db = new mysqli($this->default['host'], $this->default['username'], $this->default['password'], $this->default['database']);
	}
	public function my_query($string ='',$param = array())
	{
		if(!empty($string))
		{
			$stmt = $this->db->stmt_init();
			$stmt->prepare($string);
			if(!empty($param))
			{
				if(is_array($param))
				{
					foreach ($param as $key => $value) 
					{
						if(is_string($value))
						{
							pr($value);
							$stmt->bind_param('s',$value);
						}else if(is_integer($value)){
							$stmt->bind_param('i',$value);
						}else{
							$stmt->bind_param('d',$value);
						}
					}
				}else{
					if(is_string($param))
					{
						$stmt->bind_param('s',$param);
					}else if(is_integer($param)){
						$stmt->bind_param('i',$param);
					}else{
						$stmt->bind_param('d',$param);
					}
				}
			}
			pr($stmt);
			$stmt->execute();
			pr($stmt);
			$result = $stmt->get_result();
			$output = [];
			if(!empty($result))
			{
				while($row = $result->fetch_assoc())
				{
					$output[] = $row;
				}
			}
			// pr($output);
			return $output;
		}
	}
	public function query($query,$args = array())
  {
      $stmt   = $this->db->prepare($query);
      $params = [];
      if(!empty($args))
      {
	      $types  = array_reduce($args, function ($string, &$arg) use (&$params) {
	          $params[] = &$arg;
	          if (is_float($arg))         $string .= 'd';
	          elseif (is_integer($arg))   $string .= 'i';
	          elseif (is_string($arg))    $string .= 's';
	          else                        $string .= 'b';
	          return $string;
	      }, '');
	      array_unshift($params, $types);

	      call_user_func_array([$stmt, 'bind_param'], $params);
      }

      $result = $stmt->execute() ? $stmt->get_result() : false;

      $stmt->close();

      return $result;
  }
}