<?php
class Evolution_model extends CI_Model{
    public $tableName = "evolution";

    public function get_all($where = array()){
        return $this->db->where($where)->get($this->tableName)->result();
    }

    public function get($where = array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function add($data = array()){
        return $this->db->insert($this->tableName,$data);
    }

    public function update($where = array(),$data = array()){
        return $this->db->where($where)->update($this->tableName,$data);
    }

    public function delete($where = array()){
        return $this->db->where($where)->delete($this->tableName);
    }

}