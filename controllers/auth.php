<?php

class Auth extends System_controller{
    public function login(){
        $this->view->error = false;
        $log = new Models_logs;
        
        if($this->post('submit')){
            $username = trim($this->post('username'));
            $password = trim($this->post('password'));
            if(!empty($username) && !empty($username)){
                $model_users = new Models_users;
                $result = $model_users->login($username, md5($password));
                if($result){
                    if($result['role'] == 1){
                        //this is admin
                        $_SESSION['user_id'] = $result['id'];
                        $_SESSION['user_role'] = 'admin';
                        $_SESSION['username'] = $result['username'];
                        $log->record('sign-in', $result['username']." logged in as admin");
                        $this->redirect('/admin');
                    }else{
                        //this is a user
                        $_SESSION['user_id'] = $result['id'];
                        $_SESSION['user_role'] = 'user';
                        $_SESSION['username'] = $result['username'];
                        $log->record('sign-in', $result['username']." logged in as user");
                        $this->redirect('/');
                    }
                }else{
                    $this->view->error = ['Invalid Username and/or Password.'];
                }
            }else{
                $this->view->error = ['Username and Password are required.'];
            }
        }
        
        $this->view->render('auth/login');
    }
    
    public function logout(){
        session_destroy();
        $this->redirect('/auth/login');
    }
}
