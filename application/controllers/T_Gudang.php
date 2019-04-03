<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class T_Gudang extends MY_Controller {

    private $_table     = 't_gudang';
    private $_module    = 'T_Gudang';
    private $_title     = 'Gudang';

    private $_id        = 'id_gudang';
    private $_v_t_gudang     = 'v_t_gudang';

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('master_model'));
    }

    public function index( $id = '' )
    {
        $data = array(
            'content'       => $this->_module . '/main',
            'title'         => $this->_title,
            'class'         => $this->_module,
            'form'          => $this->_module . '/form',
            'dataSource'    => site_url( $this->_module . '/getData/' . $id ),
            'action'        => site_url( $this->_module . '/saveData'),
            'edit'          => site_url( $this->_module . '/editData'),
            'brgSource'     => site_url( $this->_module . '/getDataBarang' ),

        );

        $this->load->view('welcome_message', $data);        
    }

    public function getData( $id = '' )
    {
        $condition = array();
        if(!empty($id)) {
            $condition = array($this->_id => $id);
        }   
        return master::responseGetData($this->_v_t_gudang, $condition);
    }
    public function editData()
    {
        $data   = $this->input->post('id');
        return master::getDataById(array($this->_id => $data), $this->_v_t_gudang);
    }

}

/* End of file M_Jenisitem.php */
