<?php

class Models_logs extends System_model{
    
    /**
     * 
     * @param string $type
     * @param string $desc
     * @return boolean
     */
    public function record($type, $desc){
        return $this->db->insert("logs", ['type'=>$type, 'description'=>$desc]);
    }
    
    /**
     * 
     * @return array
     */
    public function getLogs(){
        return $this->db->select("select * from logs order by created_at desc");
    }
}
