<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('nama'))) {
			redirect('guestbook/read');
		}

        // memanggil model
        $this->load->model('m_article');
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 
        $data_article = $this->m_article->read();

		$output = array(
            'judul' 	   => 'Data Artikel',
            'theme_page' => 'user/v_article',
			'data_article' => $data_article
        );

		//memanggil file view
		$this->load->view('theme/user/index', $output);
	}

	public function detail()
    {

        $id     = $this->uri->segment(3);
        $detail = $this->m_article->detail($id);
        
        // mengirim data ke view
        $output = array(
            'theme_page' => 'user/v_article_detail',
            'judul'      => 'Buku yang dipinjam',
            'detail'     => $detail,
		);

        // memanggil file view
        $this->load->view('theme/user/index', $output);
    }

    public function insert() {

		$this->insert_submit();

		// memanggil file view
		$this->load->view('user/v_guestbook');
	}

	public function insert_submit() {

		if ($this->input->post('submit') == 'Submit') {

			//aturan validasi input login
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');

			if ($this->form_validation->run() == TRUE) {

				// menangkap data input dari view
				$nama	  = $this->input->post('nama');
				$nim	  = $this->input->post('nim');
				$email	  = $this->input->post('email');
		
				// mengirim data ke model
				$input = array(
								// format : nama field/kolom table => data input dari view
								'nim'  	 	=> $nim,
								'nama' 		=> $nama,
								'email' 	=> $email
							);
                            
				$data_guestbook = $this->m_guestbook->insert($input);

				// mengembalikan halaman ke function read
				$this->session->set_tempdata('message', 'Data berhasil ditambahkan !', 1);
				redirect('http://127.0.0.1:8887/');
			}

		}

	}
}
