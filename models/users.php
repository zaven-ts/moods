<?php

class Models_users extends System_model{
    
    /**
     * 
     * @param string $username
     * @param string $password
     * @return array
     */
    public function login($username, $password){
        return $this->db->select("select id,username,role from users where password='$password' AND username='$username'", 1);
    }
    
    /**
     * 
     * @return array
     */
    public function getAllUsers(){
        return $this->db->select("select id,username,name,role from users");
    }
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getUserById($id){
        return $this->db->select("select id,username,name,role from users where id=$id", 1);
    }
    
    /**
     * 
     * @param array $params
     * @return array
     */
    public function addUser($params){
        
        if(!$this->checkUsername($params['username'])){
            return ['error'=>true, 'msgs' => ['This username is in use.']];
        }
        if($this->db->insert("users", $params)){
            return ['error'=>false, 'msgs' => ''];
        }else{
            return ['error'=>true, 'msgs' => ['Oops. Unknown error.']];
        }
    }
    
    /**
     * 
     * @param array $params
     * @param int $id
     * @return array
     */
    public function editUser($params, $id){
        
        if(!$this->checkUsername($params['username'], $id)){
            return ['error'=>true, 'msgs' => ['This username is in use.']];
        }
        if($this->db->update("users", $params, "id=$id")){
            return ['error'=>false, 'msgs' => ''];
        }else{
            return ['error'=>true, 'msgs' => ['Oops. Unknown error.']];
        }
    }
    
    /**
     * 
     * @param string $username
     * @param int $owner
     * @return boolean
     */
    private function checkUsername($username, $owner=false){
        $result = $this->db->select("select id from users where username='$username'", 1);
        if(!$result || empty($result)){
            return TRUE;
        }else if($owner){
            if($owner == $result['id']){
                return TRUE;
            }
        }
        return false;
    }
}
