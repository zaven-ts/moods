<?php

class Libs_db {

    private $con;
    function __construct($host, $user, $pass, $db_name){
            $this -> con = new Mysqli($host, $user, $pass, $db_name);
            if($this -> con -> connect_errno){
                echo $this -> con -> connect_error;
                exit;
            }
    }
    //			Select
    public function select($query, $c=0){
            $result = $this -> con -> query($query);
            if(!$result)
                return [];
            if($c == 1){
                return $result -> fetch_assoc();
            }else{
                $data = [];
                while($row = $result -> fetch_assoc()){
                        $data[] = $row;
                }
            }
            return $data;
    }
    //			Insert
    public function insert($table,$data){
            $fields=[];
            $values=[];
            foreach($data as $k => $v){
                    $fields[] = $k;
                    $values[] = "'".$this->con->escape_string($v)."'";
            }
            $fields = join(',',$fields);
            $values = join(',',$values);

            $result = $this -> con -> query("insert into ".$table."(".$fields.") values (".$values.")");

            return $result;
    }
    //			Update
    public function update($table, $data, $where){
            $set=[];
            foreach($data as $k => $v){
                    $set[] = $k."='".$this->con->escape_string($v)."'";
            }
            $set = join(',',$set);

            return $this -> con -> query("update $table set $set where $where");
    }
    //			Delete
    public function delete($table, $where){
            return $this -> con -> query("delete from $table where $where");
    }
}
