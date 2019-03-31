<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class T_Rig extends MY_Controller {

    private $_table     = 't_rig';
    private $_module    = 'T_Rig';
    private $_title     = 'RIG';

    private $_m_rig     = 'm_rig';
    private $_m_type    = 'm_type';

    private $_v_t_rig   = 'v_t_rig';
    private $_v_t_rig_update   = 'v_t_rig_update';

    private $_id        = 'id';
    
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
            'delete'        => site_url( $this->_module . '/deleteData'),
            'edit'          => site_url( $this->_module . '/editData'),
            'update'        => site_url( $this->_module . '/updateData'),
            'rigSource'     => site_url( $this->_module . '/getDataRig' ),
            'brgSource'     => site_url( $this->_module . '/getDataBarang' )
        );

        $this->load->view('welcome_message', $data);        
    }

    public function getData( $id = '' )
    {
        $condition = array();
        if(!empty($id)) {
            $condition = array('id_rig' => $id);
        }   
        return master::responseGetData($this->_v_t_rig, $condition);
    }

    public function getDataRig()
    {
        $params = $this->input->post('q');
        return master::getDataSelect($this->_m_rig, array('name_rig' => $params));
    }

    public function getDataType()
    {
        $params = $this->input->post('q');
        return master::getDataSelect($this->_m_type, array('name_type' => $params));
    }

    public function saveData()
    {        
        // print_debug($this->input->post());  

        // $this->form_validation->set_rules($this->_id, 'ID Tipe', 'required|is_unique['.$this->_table.'.'.$this->_id.']');
        $this->form_validation->set_rules('id_rig', 'Lokasi RIG ', 'trim|required');
        $this->form_validation->set_rules('id_barang_gpu', 'GPU ', 'trim|required');
        // $this->form_validation->set_rules('id_rig', 'Lokasi RIG ', 'trim|required');

        $data = $this->input->post();
        // print_debug($data);
        // $data = array(
        //     'id_rig'    => $this->input->post('id_rig'),
        //     'id_barang' => $this->input->post('id_barang'),
        //     'id_type'   => $this->input->post('id_type'),
        // );
        // unset($data['id_rig']);
        if ($this->form_validation->run() == TRUE ) {
            return master::saveData($data, $this->_table);
        }
    }

    public function deleteData()
    {
        $data = $this->input->post('id');
        return master::deleteData(array($this->_id => $data), $this->_table);
    }

    public function editData()
    {
        $data   = $this->input->post('id');
        return master::getDataById(array('id' => $data), $this->_v_t_rig_update);
    }

    public function updateData()
    {
       $id      = $this->input->post('id');
       $data = $this->input->post();
        return master::updateData($data, array($this->_id => $id), $this->_table);
    }

}

/* End of file M_Jenisitem.php */
