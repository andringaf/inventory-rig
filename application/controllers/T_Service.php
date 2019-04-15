<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class T_Service extends MY_Controller {

    private $_table         = 't_service';
    private $_t_gudang      = 't_gudang';
    private $_t_rig         = 't_rig';
    private $_module        = 'T_Service';
    private $_title         = 'Service Barang';

    private $_v_m_full_barang    = 'v_t_full_service';
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('master_model'));
    }

    public function index()
    {
        $data = array(
            'content'       => $this->_module . '/main',
            'title'         => $this->_title,
            'class'         => $this->_module,
            'form'          => $this->_module . '/form',
            'action'        => site_url( $this->_module . '/saveData'),
            'delete'        => site_url( $this->_module . '/deleteData'),
            'edit'          => site_url( $this->_module . '/editData'),
            'update'        => site_url( $this->_module . '/updateData'),
            'typeSource'    => site_url( $this->_module . '/getDataTypeBarang'),
            'statusSource'  => site_url( $this->_module . '/getDataStatusBarang'),
            'statusLokSource'  => site_url( $this->_module . '/getDataStatusPosisi'),
        );

        $this->load->view('welcome_message', $data);        
    }

    public function getData()
    {
        return master::responseGetData($this->_v_m_full_barang);
    }

    public function saveData()
    {
        $this->form_validation->set_rules('id_type', 'Tipe', 'required');
        $this->form_validation->set_rules('count', 'Serial Number', 'trim|required');
        $this->form_validation->set_rules('name_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('stock_in', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('id_status_barang', 'Status Barang', 'required');

        // Change Format Date in php 
        // from d-m-Y to Y-m-d
        $stockIn        = DateTime::createFromFormat('d-m-Y', $this->input->post('stock_in'));
        $stockInFormat  = $stockIn->format('Y-m-d');

        // Get data from POST and unset field stock_in ( date )
        $data = $this->input->post();
        unset($data['stock_in']);

        // Insert field stock_in after re-format
        $data['stock_in'] = $stockInFormat;
        $data['inputed_by'] = '99';

        if ($this->form_validation->run() !== FALSE ) {
            return master::saveData($data, $this->_table);
        }
    }

    public function deleteData()
    {
        $data = $this->input->post('id');
        return master::deleteData(array('id_barang' => $data), $this->_table);
    }

    public function editData()
    {
        $data   = $this->input->post('id');
        return master::getDataById(array('id_barang' => $data), $this->_v_m_full_barang);
    }

    public function updateData()
    {
        $id = $this->input->post('id');
        $id_t_rig = $this->input->post('id_t_rig');
        $place = $this->input->post('place');
        $type = $this->input->post('id_type');
        $field = "";
        $cond = array('id_barang_gpu' => $this->input->post('id_barang'),'id' => $id_t_rig,'id_rig'    => $this->input->post('id_rig'));
        $data = array(
            'id_type'           => $type,
            'id_barang'         => $this->input->post('id_barang'),
            'id_rig'            => $this->input->post('id_rig'),
            'count'   => $this->input->post('count'),
            'serial_number'     => $this->input->post('serial_number'),
        );
        switch ($type) {
            case 1:
                $field = 'id_barang_psu_1';
                break;
            case 2:
                $field = 'id_barang_psu_2';
                break;
            case 3:
                $field = 'id_barang_gpu';
                break;
            case 4:
                $field = 'id_barang_ram';
                break;
            case 5:
                $field = 'id_barang_mobo';
                break;
            case 6:
                $field = 'id_barang_udb';
                break;
            case 7:
                $field = 'id_barang_ssd';
                break;
        }
      
        $exist = $this->master_model->getById($cond,$this->_t_rig);
        $row = $exist->result();
        if($exist->num_rows() > 0){
            $dataUpdate = array(
                'count_gpu'   => $row[0]->count_gpu +  $this->input->post('jumlah_gpu'),
            ); 
        }else{
           $dataUpdate = array(
            $field        => $this->input->post('id_barang'),
            'count_gpu'   => $this->input->post('count'),
           ); 
        }

        if ($place == 'gudang') {
           master::saveData($data, $this->_t_gudang);
           return master::deleteData(array('id' => $id), $this->_table);
        }else{
            master::updateData($dataUpdate, array('id' => $id_t_rig), $this->_t_rig);
            return master::deleteData(array('id' => $id), $this->_table);
        }
    }
}

/* End of file M_Jenisitem.php */
