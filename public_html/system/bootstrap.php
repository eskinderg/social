<?php

final class bootstrap{
private $registry;

	function __construct() {
        
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);
                
                

                $this->registry = new Registry();
                
                $session = new Session();
                $this->registry->set('session', $session);
                
                $request = new Request();
		$this->registry->set('request', $request);
                
                $db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                $this->registry->set('db', $db);
                
                $loader = new Loader($this->registry);
                $this->registry->set('load', $loader);
                $this->registry->set("url", $url[0]);
                
                $this->registry->set('document', new Document());
                
                $this->registry->set('user', new user($this->registry));
                $this->registry->set ('userprofile', new userprofile($this->registry));
                
                
                
                if(file_exists('controllers/'. $url[0].'/'.$url[1].'.php')){
                    $file = 'controllers/'. $url[0].'/'.$url[1].'.php';
                    require $file;
                    $controller = new $url[1]($this->registry);
                    
                    $controller->index();
                    
                 
                    if(method_exists($controller, $url[2]))
                    {
                            $method = new ReflectionMethod($controller, $url[2]);
                            if($method->getParameters()>0)
                            {
                               
                                $controller->$url[2]($url[3]);
                            }
                            else
                            {
                                $controller->$url[2]();
                            }
                    }
                    
                    
                  /*  if(method_exists($controller, $url[2]($url[3])))
                    {
                        $controller->$url[2]($url[3]);
                    }
                    */
                    /*if(has arguments)     */
                    
                    exit();
                }elseif($url[0]!='' && $url[1]!='')
                {
                    require 'controllers/pageprofile.php';
                    $profile = new pageprofile($this->registry);
                    $profile->index($url[0]);
                    
                    if (method_exists($controller, $url[1]))
                    { $controller->$url[1]();}
                    
                    $this->invoke_methods($profile, $url);
                    exit(); 
                }
                
                
                
                if( $url[0]==NULL)                     // eskinder.net
                {
                    require 'controllers/register.php';
                    $controller = new register($this->registry);
                    $controller->index();
                    exit();
                    
                }
                
                $file = 'controllers/' . $url[0] . '.php';
                
                if (file_exists($file))
                {
                    include_once $file;
                    $controller = new $url[0]($this->registry);
                    $controller->index();
                }

                else {
                    require 'controllers/pageprofile.php';
                    $profile = new pageprofile($this->registry);
                    $profile->index($url[0]);
                    $this->invoke_methods($profile, $url);
                    exit();
                    
                    
                    
                }
                    

                
            /*    
                if($url[0]!='' && $url[1]=='')  //eskinder.net/url
                    {
                       $file = 'controllers/' . $url[0] . '.php';
                
                        if (file_exists($file)) {
                                require $file;
                                $controller = new $url[0]($this->registry);
                                $controller->index();
                                exit();
                                
                        } 
                        else{
                                require_once 'controllers/pageprofile.php';              
                                $profile = new pageprofile($url[0],$this->registry);
                                //$profile->index();
                                //exit();
                        }
                    }
                if($url[0]!='' && $url[1]!='') //eskinder.net/url/url
                {
                    $file = 'controllers/' . $url[0] . '.php';
                
                    if (file_exists($file)) {
                        require $file;
                        $controller = new $url[0]($this->registry);
                        $controller->index();

                    } 
                    else{
                        require_once 'controllers/error.php';              
                        $error_controller = new Error($this->registry);
                        $error_controller->index();
                        exit();
                    }
                    
                }
                
                
                
                
                if($url[0]!='' && $url[1]!='' && $url[2]!='') //eskinder.net/url/url/url
                {
                    $file = 'controllers/' . $url[0] . '.php';
                
                    if (file_exists($file)) {
                        require $file;
                        $controller = new $url[0]($this->registry);
                        $controller->index();
                        $controller->{$url[1]}($url[2]); // call the function controller function url[1](url[2])
                        exit();
                    } 
                    else{
                        require_once 'controllers/error.php';              
                        $error_controller = new Error($this->registry);
                        $error_controller->index();
                        exit();
                    }
                    
                }
                    
                    
		
                
                
               /* if($url[0] !='' && $url[1]!='' && $url[2]!='')
                {
                    require 'controllers/pageprofile.php';
                    $controller = new pageprofile($url[1] ,$this->registry);
                    $controller->{$url[2]}();
                    
                    exit();
                }
                		
                if($url[0] !='' && $url[1]!='')
                {
                    require 'controllers/pageprofile.php';
                    $controller = new pageprofile($url[1] ,$this->registry);
                    exit();
                }
                

		if ($url[0]=='' && $url[1]=='' ) 
                    {

		}
                
                    */ 
                //$controller->index();
		// $controller->loadModel($url[0]); // this needs to be implemented.

		// calling methods

/*
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
		*/
		
	}
        
        private  function invoke_methods($controller,$url)
        {

                    
                    if (method_exists($controller, $url[1]) && $url[2]=='')
                    {
                        $controller->{$url[1]}();
                    }
                    
                    if (method_exists($controller, $url[1]) && $url[2]!='')
                    {
                        $controller->{$url[1]}($url[2]);
                    }
                    
        }
	
        
	public function error() {
                        require_once 'controllers/error.php';              
                        $error_controller = new Error($this->registry);
                        $error_controller->index();
                        exit();

                
	}

}