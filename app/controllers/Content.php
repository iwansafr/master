<?php
class Content{
	public function __construct()
	{
		load_model('Content_model');
	}

	public function list($id = 0)
	{
		$content = new Content_model();
		$data = $content->all();
		view('content/list',['data'=>$data]);
	}
	public function edit($id = 0)
	{
		$content = new Content_model();
		$content->save();
		view('content/edit');
	}
	public function delete($id = 0)
	{
		header('location: list');
	}
	public function upload()
	{
		view('content/upload');
	}
}