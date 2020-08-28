<?php

function pr($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}
function e404($msg)
{
	echo $msg;
	die();
}
function load_model($file = '')
{
	if(!empty($file))
	{
		$path_file = 'app/models/'.$file.'.php';
		if(file_exists($path_file))
		{
			include_once($path_file);
		}else{
			e404('file model '.$file.' tidak ditemukan');
		}
	}
}
function view($file = '', $data = array())
{
	if(!empty($file))
	{
		if(!empty($data))
		{
			foreach($data AS $key => $value)
			{
			 $$key = $value;
			}
		}
		$path_file = 'app/views/'.$file.'.php';
		if(file_exists($path_file))
		{
			include $path_file;
		}else{
			e404('file '.$file.'.php tidak ditemukan');
		}
	}
}