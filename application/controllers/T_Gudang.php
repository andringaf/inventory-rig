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
        $selectStatus = array(
            array('id' => 1, 'text' => 'OUT'),
            array('id' => 2, 'text' => 'SERVICE')
        );

        $data = array(
            'content'       => $this->_module . '/main',
            'title'         => $this->_title,
            'class'         => $this->_module,
            'form'          => $this->_module . '/form',
            'dataSource'    => site_url( $this->_module . '/getData/' . $id ),
            'action'        => site_url( $this->_module . '/saveData'),
            'update'        => site_url( $this->_module . '/updateData'),
            'brgSource'     => site_url( $this->_module . '/getDataBarang' ),
            'selectStatus'  => $selectStatus,

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
    public function updateData()
    {
        $id = $this->input->post('id_gudang');
        $data = array(
            'status'         => $this->input->post('id_status'),
        );
         return master::updateData($data, array($this->_id => $id), $this->_table);
       
    }

}

