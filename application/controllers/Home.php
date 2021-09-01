<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('nama'))) {
			redirect('guestbook/read');
		}

        // memanggil model
        // $this->load->model('m_article');
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 

		$output = array(
            'theme_page' => 'user/v_home'
        );

		//memanggil file view
		$this->load->view('theme/user/index', $output);
	}
}
