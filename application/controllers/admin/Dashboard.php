<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('email'))) {
			redirect('admin/user/login');
		}

        if ($this->session->userdata('status') == 2) {
			redirect('admin/user/login');
		}

        // memanggil model
        $this->load->model('m_guestbook');
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 

		$nama = $this->session->userdata('nama');
		$level = $this->session->userdata('level');

        $output = array(
            'theme_page' => 'admin/v_dashboard',
            'judul' 	 => 'Data Buku Tamu',
            'level'      => $level,
            'nama'       => $nama
        );

		//memanggil file view
		$this->load->view('theme/admin/index', $output);
	}
}
