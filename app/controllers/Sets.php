<?php

class Sets extends Controller
{
	
	
	public function index()
	{
		$sets=$this->model('sets');
		print_r($sets->all());
		//echo "sets/index";
	}
	
}