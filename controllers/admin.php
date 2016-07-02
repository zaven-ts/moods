<?php

class Admin extends System_controller{
    public function __construct() {
        parent::__construct();
        
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin' ){
            $this->redirect('/');
        }
    }
    
    public function index(){
        $this->view->error = false;
        
        if($this->post('submit')){
            $moodtext = trim($this->post('moodtext'));
            if(empty($moodtext)){
                $this->view->error = ['Empty mood'];
            }else{
                $model_mood = new Models_mood();
                $result = $model_mood->addMood($moodtext);
                if($result){
                    
                }else{
                    $this->view->error = ['Oops.'];
                }
            }
        }
        $this->view->render('admin/index');
    }
    
    public function adduser(){
        $this->view->error = false;
        $model_users = new Models_users();
        
        if($this->post('submit')){
            $name = $this->post('name');
            $username = $this->post('username');
            $pass = $this->post('password');
            $role = $this->post('role');
            if(empty($name) || empty($username) || empty($pass)){
                $this->view->error = ['Please, fill all fields.'];
            }else{
                $params = [
                    'name' => $name,
                    'username' => $username,
                    'password' => md5($pass),
                    'role' => $role == 1 ? 1 : 2
                ];
                $result = $model_users->addUser($params);
                
                if($result['error']){
                     $this->view->error = $result['msgs'];
                }
            }
        }
        
        $this->view->users = $model_users->getAllUsers();
        $this->view->render('admin/adduser');
    }
    
    public function edituser($id = false){
        if(!$id || (int)$id < 1){
            $this->redirect('/admin/adduser');
        }
        
        $this->view->error = false;
        $model_users = new Models_users();
        
        if($this->post('submit')){
            $name = $this->post('name');
            $username = $this->post('username');
            $pass = $this->post('password');
            $role = $this->post('role');
            if(empty($name) || empty($username)){
                $this->view->error = ['Please, fill username and name.'];
            }else{
                $params = [
                    'name' => $name,
                    'username' => $username,
                    'role' => $role == 1 ? 1 : 2
                ];
                
                if(!empty($pass)){
                    $params['password'] = md5($pass);
                }
                
                $result = $model_users->editUser($params, $id);
                
                if($result['error']){
                     $this->view->error = $result['msgs'];
                }else{
                    $this->redirect('/admin/adduser');
                }
            }
        }
        
        $this->view->user = $model_users->getUserById($id);
        $this->view->render('admin/edituser');
    }
    
    public function logs(){
        $model_logs = new Models_logs;
        
        $this->view->logs = $model_logs->getLogs();
        $this->view->render('admin/logs');
    }
}
