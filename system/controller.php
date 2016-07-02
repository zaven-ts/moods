<?php

class System_controller {
        public $view;
        function __construct(){
            $this -> view = new System_view();
        }
        
        protected function redirect($url){
            header("Location:$url");
        }
        
        protected function post($index = false){
            if($index){
                if(isset($_POST[$index])){
                    return filter_var($_POST[$index], FILTER_SANITIZE_STRING);
                }
                return false;
            }
            return $_POST;
        }
}