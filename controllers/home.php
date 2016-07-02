<?php

class Home extends System_controller {
    function __construct() {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
            $this->redirect('/auth/login');
        }
    }
    
    public function index(){
        $model_mood = new Models_mood();
        $this->view->error = false;
        $this->view->mood = false;

        if($this->post('gogo')){
            $name = trim($this->post('name'));
            if(empty($name)){
                $this->view->error = ['Name is required'];
            }else{
                $result = $model_mood->getRandomMood();
                if(!$result || empty($result)){
                    $this->view->error = ['Oops'];
                }else{
                    $log = new Models_logs;
                    $mood = str_replace('%name%', $name, $result['moodtext']);
                    $this->view->mood = $mood;
                    $log->record('phrase', $_SESSION['username']." phrase: '$mood'");
                }
            }
            
        }


        $this->view->render('home/index');
    }
	
}
