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
		include 'app/views/'.$file.'.php';
	}
}