<?php 

/**
 * 
 */
class App 
{
	protected $controller='Home';
	protected $method='index';
	protected $params=[];

	function __construct()
	{
		$url=$this->parseUrl();

		if(file_exists('../app/controllers/'.ucfirst($url[0]).'.php'))
		{
			$this->controller=ucfirst($url[0]);
			unset($url[0]);
		}

		require_once '../app/controllers/'.$this->controller.'.php';

		if(isset($url[1]))
		{
			if(method_exists($this->controller,$url[1]))
			{
				$this->method=$url[1];
				unset($url[1]);
			}
		}

		
		$this->params=$url ?array_values($url):[];
		

		/*echo $this->controller."<br>";
		echo $this->method."<br>";
		echo "<hr>";
		print_r($this->parama);*/

		$route=new $this->controller;

		call_user_func_array([$route,$this->method], $this->params);

		
		
	}

	public function parseUrl()
	{
		if(isset($_GET['url'])){
			return explode('/', filter_var (rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));	
		}

		return null;
	}
	
	
}