<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	private $_m_rig 	= 'm_rig';
	private $_v_count_barang = 'v_count_barang';
	private $_module 	= 'Welcome';

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			'content'		=> 'layouts/dashboard',
			'rig_result'	=> site_url( $this->_module . '/loadRigData' ),
			'count_result'	=> site_url( $this->_module . '/countDataBarang' ),
			'user'			=> $this->ion_auth->user()->row()->first_name,
		);

		$this->load->view('welcome_message', $data);
	}

	public function loadRigData()
	{
		return master::responseGetData($this->_m_rig);
	}
	public function countDataBarang()
	{
		return master::responseGetData($this->_v_count_barang);
	}
}
