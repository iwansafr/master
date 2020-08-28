<?php

define('APP', 'app');
define('HELPER','app/helpers');
$config = [];
foreach(glob(HELPER.'/*.php') AS $key)
{
	include_once($key);
}
include_once('app/config/Database.php');
$uri = '';
pr($_SERVER);
if(!empty($_SERVER['PATH_INFO']))
{
	$uri = explode('/',$_SERVER['PATH_INFO']);
}

if(!empty($uri['1']))
{
	foreach(glob(APP.'/controllers/*.php') AS $key)
	{
		$name = explode('/', $key);
		$name = end($name);
		if($uri['1'].'.php' == strtolower($name))
		{
			include_once($key);
			$name = str_replace('.php', '', $name);
			$CI = new $name();
			if(!empty($uri['2']))
			{
				if(method_exists($CI, $uri['2']))
				{
					$param = [];
					foreach ($uri as $key => $value)
					{
						if($key>2)
						{
							$param[] = $value;
						}
					}
					call_user_func_array([$CI, $uri['2']],$param);
				}else{
					e404('method tidak diketahui');
				}
			}
		}
	}
}