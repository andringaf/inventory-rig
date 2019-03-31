<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MY_Model extends CI_Model {

        public function getAll($table, $condition = array())
        {
            $this->db->select('*');
            $this->db->from($table);
            if(!empty($condition)) {
                $this->db->where($condition);
            }
            return $this->db->get();
        }

        public function getById($condition = array(), $table = '')
        {
            $this->db->select('*');
            $this->db->from($table);
            if(!empty($condition)) {
                $this->db->where($condition);
            }
            return $this->db->get();
        }

        public function getLike($table = '', $condition = array(), $where_condition = array())
        {
            $this->db->select('*');
            $this->db->from($table);
            if(!empty($condition)) {
                $this->db->like($condition);
            }
            if(!empty($where_condition)) {
                $this->db->where($where_condition);
            }
            return $this->db->get();
        }

        public function save($data = array(), $table = '')
        {
            return $this->db->insert($table, $data);
        }

        public function update($data = array(), $condition = array(), $table = '')
        {
            if(!empty($condition)) {
                return $this->db->update($table, $data, $condition);
            }
        }

        public function delete($condition = array(), $table = '')
        {
            if(!empty($condition)) {
                $this->db->where($condition);
                return $this->db->delete($table);
            }
        }
    }
    /* End of file ModelName.php */
?>