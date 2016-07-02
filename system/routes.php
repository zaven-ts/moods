<?php

class System_routes {

    function __construct($path){
        $path = explode('/', substr($path,1));
        $this->run($path);
    }
   
    private function run($path){
        global $config;
        if(isset($path[0]) && !empty($path[0])){

            $ctrl = $path[0];
            if(file_exists('controllers/'.$ctrl.'.php')){
                include('controllers/'.$ctrl.'.php');

                if(class_exists($ctrl, false)){
                    $ctrl = ucfirst($ctrl);
                    $ctrl_obj = new $ctrl;

                    if(isset($path[1]) && !empty($path[1])){

                        $method = $path[1];
                        if(method_exists($ctrl_obj, $method)){
                                if(isset($path[2]) && !empty($path[2])){
                                    $params = array_slice($path, 2);
                                    call_user_func_array([$ctrl_obj, $method], $params);

                                }else{
                                    $ctrl_obj -> $method();
                                }
                        }else{
                            echo 'method not found';
                        }
                    }else{
                        $ctrl_obj -> index();
                    }
                }else{
                    echo 'class not found';
                }
            }else{
                echo 'file not found';
            }
	}else{
            $d_ctrl = $config['default_controller'];
            include 'controllers/'.$d_ctrl.'.php';
            
            $d_ctrl = ucfirst($d_ctrl);
            $default = new $d_ctrl;
            $default -> index();
        }
    }
}