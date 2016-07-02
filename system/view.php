<?php

class System_view {

    public function render($name, $layout = true){
        if(file_exists('views/'.$name.'.php')){
                if($layout){
                    include 'views/layout/header.php';
                    include 'views/'.$name.'.php';
                    include	'views/layout/footer.php';
                }else{
                    include 'views/'.$name.'.php';
                }
        }else{
            echo 'view not found';
        }
    }
}