<?php

class Models_mood extends System_model{
    
    /**
     * 
     * @return array
     */
    public function getRandomMood(){
        return $this->db->select("SELECT moodtext FROM moods ORDER BY RAND() LIMIT 1", 1);
    }
    
    /**
     * 
     * @param string $text
     * @return boolean
     */
    public function addMood($text){
        return $this->db->insert('moods', ['moodtext'=>$text]);
    }
    

}
