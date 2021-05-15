<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('email'))) {
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

		$level = $this->session->userdata('level');
		$nama = $this->session->userdata('nama');

        if ($level == 'author') {
            $this->session->set_tempdata('error', "Anda tidak memiliki hak akses", 0);
            redirect($_SERVER['HTTP_REFERER']);
        }

        $output = array(
            'theme_page' => 'admin/v_guestbook',
            'judul' 	 => 'Data Buku Tamu',
			'level'		 => $level,
			'nama'		 => $nama
        );

		//memanggil file view
		$this->load->view('theme/admin/index', $output);
	}

	//fungsi menampilkan data dalam bentuk json
	public function datatables()
	{
		//menunda loading (bisa dihapus, hanya untuk menampilkan pesan processing)
		// sleep(2);

		//memanggil fungsi model datatables
		$list = $this->m_guestbook->get_datatables();
		$data = array();
		$no = $this->input->post('start');

		//mencetak data json
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field['nama'];
			$row[] = $field['nim'];
			$row[] = $field['email'];
			$row[] = $field['date'];
			$data[] = $row;
		}

		//mengirim data json
		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->m_guestbook->count_all(),
			"recordsFiltered" => $this->m_guestbook->count_filtered(),
			"data" => $data,
		);

		//output dalam format JSON
		echo json_encode($output);
	}
}
