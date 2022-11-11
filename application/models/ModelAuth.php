<?php
class ModelAuth extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    public function login($data){
        $condition = "USERNAME =" . "'" . $data['username'] . "' AND " . "PASSWORD =" . "'" . $data['password'] . "'";
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where($condition);
        $this -> db -> limit(1);
        
        return $this -> db -> get();
    }

    public function insert($data){
        if ($this->db->insert("user", $data)){
            return true;
        } else {
            return false;
        };
    }
}