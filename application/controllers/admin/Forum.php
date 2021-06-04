<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('email'))) {
			redirect('admin/user/login');
		}

        // memanggil model
        $this->load->model('M_forum');
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 

		$nama = $this->session->userdata('nama');
		$level = $this->session->userdata('level');

        if ($level == 'author') {
            $this->session->set_tempdata('error', "Anda tidak memiliki hak akses", 0);
            redirect($_SERVER['HTTP_REFERER']);
        }

        $output = array(
            'theme_page' => 'admin/v_forum',
            'judul' 	 => 'Data Forum',
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
		$list = $this->M_forum->get_datatables();
		$data = array();
		$no = $this->input->post('start');

		//mencetak data json
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field['title'];
			$row[] = $field['text'];
			$row[] = $field['nama'];
			$row[] = $field['category'];
			$row[] = $field['time'];
			$row[] = $field['isPositif'] == '1' ? '<div class ="btn btn-success btn-sm disabled">Verified</div>' : '<div class="btn btn-warning btn-sm disabled">Pending</div>';
			$row[] = '
				<div class="btn-group" role="group" aria-label="Basic outlined example">
					<a href="'.site_url('admin/forum/update/'.$field['id_forum']). '" class="btn btn-warning btn-sm " title="Edit">
						<i class="fas fa-edit"></i> 
					</a>
					<a href="'.site_url('admin/forum/delete/'.$field['id_forum']).'" class="btn btn-danger btn-sm btnHapus" title="Hapus" data = "'.$field['id'].'">
						<i class="fas fa-trash-alt"></i> 
					</a>
				</div>';

			$data[] = $row;
		}

		//mengirim data json
		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->M_forum->count_all(),
			"recordsFiltered" => $this->M_forum->count_filtered(),
			"data" => $data,
		);

		//output dalam format JSON
		echo json_encode($output);
	}

    public function insert() {

		$this->insert_submit();
		$nama = $this->session->userdata('nama');
		$level = $this->session->userdata('level');

		$output = array(
            'theme_page' => 'admin/v_category_insert',
            'judul' 	 => 'Data Kategori',
			'level'		 => $level,
			'nama'		 => $nama
        );


		// memanggil file view
		$this->load->view('theme/admin/index', $output);
	}

	public function insert_submit() {

		if ($this->input->post('submit') == 'Simpan') {

			//aturan validasi input login
			$this->form_validation->set_rules('category', 'Kategori', 'required|callback_insert_check');

			if ($this->form_validation->run() == TRUE) {

				// menangkap data input dari view
				$category	  = $this->input->post('category');
		
				// mengirim data ke model
				$input = array(
								'category' 		=> $category,
							);
                            
				$data_category = $this->m_category->insert($input);

				// mengembalikan halaman ke function read
				$this->session->set_tempdata('message', 'Data berhasil ditambahkan !', 1);
				redirect('admin/category/read');
			}

		}

	}

	public function insert_check()
	{

		//Menangkap data input dari view
		$category = $this->input->post('category');

		//check data di database
		$data_user = $this->m_category->read_check($category);

		if (!empty($data_user)) {

			//membuat pesan error
			$this->form_validation->set_message('insert_check', "Kategori " . $category . " sudah ada dalam database");
			$this->session->set_tempdata('error', "Tidak dapat memasukan data yang sama", 1);
			return FALSE;
		}
		return TRUE;
	}

	public function update()
	{

		$this->update_submit();
		//menangkap id data yg dipilih dari view (parameter get)
		$id  = $this->uri->segment(4);

		//function read berfungsi mengambil 1 data dari table kategori sesuai id yg dipilih
		$data_forum_single = $this->M_forum->read_single_insert($id);
		$level = $this->session->userdata('level');
		$nama = $this->session->userdata('nama');

		//mengirim data ke view
		$output = array(
			'judul'	 		=> 'Edit Kategori',
			'theme_page' 	=> 'admin/v_forum_update',
			'level'			=> $level,
			'nama'			=> $nama,

			//mengirim data kota yang dipilih ke view
			'data_forum_single' => $data_forum_single
		);

		//memanggil file view
		$this->load->view('theme/admin/index', $output);
	}

	public function update_submit()
	{

		if ($this->input->post('submit') == 'Simpan') {

            //aturan validasi input login
			$this->form_validation->set_rules('status', 'Status', 'required');

			if ($this->form_validation->run() == TRUE) {

		        $id  = $this->uri->segment(4);

				// menangkap data input dari view
				$status	  = $this->input->post('status');

				// mengirim data ke model
				$input = array(
					// format : nama field/kolom table => data input dari view
					'isPositif'		=> $status
				);

				//memanggil function update pada kategori model
				$data_forum = $this->M_forum->update($input, $id);

				//mengembalikan halaman ke function read
				$this->session->set_tempdata('message', 'Data berhasil disimpan !', 1);
				redirect('admin/forum/read');
			}
		}
	}

	public function delete() {
		// menangkap id data yg dipilih dari view
		$id = $this->uri->segment(4);

		$this->db->db_debug = false; //disable debugging queries
		
		// Error handling
		if (!$this->M_forum->delete($id)) {
			$msg =  $this->db->error();
			$this->session->set_tempdata('error', $msg['message'], 1);
		}

		//mengembalikan halaman ke function read
		$this->session->set_tempdata('message','Data berhasil dihapus',1);
		redirect('admin/forum/read');
	}
}
