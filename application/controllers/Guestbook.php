<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends CI_Controller {

    public function __construct() {
		parent::__construct();

		// if (empty($this->session->userdata('NIP'))) {
		// 	redirect('petugas/login');
		// }

        // memanggil model
        $this->load->model('M_guestbook');
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 
        $guestbook	  = $this->M_guestbook->read();

		// mengirim data ke view
		$output = array(
			'guestbook' => $guestbook
		);
		
		//memanggil file view
		$this->load->view('user/v_guestbook', $output);
	}

    public function insert() {

		$this->insert_submit();
		$guestbook	  = $this->M_guestbook->read();

		// mengirim data ke view
		$output = array(
			'guestbook' => $guestbook
		);

		// memanggil file view
		$this->load->view('user/v_guestbook', $output);
	}

	public function insert_submit() {

		if ($this->input->post('submit') == 'Submit') {

			//aturan validasi input login
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('nim', 'No telepon', 'required|numeric');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');

			if ($this->form_validation->run() == TRUE) {

				// menangkap data input dari view
				$nama	  = $this->input->post('nama');
				$nim	  = $this->input->post('nim');
				$email	  = $this->input->post('email');

				//buat session user 
				$this->session->set_userdata('nama', $nama);
		
				// mengirim data ke model
				$input = array(
								// format : nama field/kolom table => data input dari view
								'nim'  	 	=> $nim,
								'nama' 		=> $nama,
								'email' 	=> $email
							);
                            
				$data_guestbook = $this->M_guestbook->insert($input);

				// mengembalikan halaman ke function read
				redirect('home/read');
			}

		}

	}
}
