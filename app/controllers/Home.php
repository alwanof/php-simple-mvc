<?php

/**
 * 
 */
class Home extends Controller
{
	
	public function index($x=null)
	{
		$sets=$this->model('Set');

		print_r($sets->all());
		/*foreach ($user->all() as $item) {
			echo $item->email;
			echo "<br>";
		}*/
		
		//$data=['user'=>'murad','email'=>'free1soft@gmail.com'];
		//$this->view('home/welcome',$data);

	}
	
}