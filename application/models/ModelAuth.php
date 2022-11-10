<?php
class Model extends CI_Model{
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

    public function insert($table, $data){
        $this->db->insert($table, $data);
    }


}