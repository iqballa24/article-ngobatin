<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('email'))) {
			redirect('admin/user/login');
		}

		if ($this->session->userdata('status') == 2) {
			redirect('admin/user/login');
		}

        // memanggil model
        $this->load->model(array('m_article', 'm_category'));
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 

		if ($this->session->userdata('level') == 'author') {
			redirect('admin/article/author');
		}

		$nama  = $this->session->userdata('nama');
		$level = $this->session->userdata('level');

        $output = array(
            'theme_page' => 'admin/v_article',
            'judul' 	 => 'Data Artikel',
			'nama'		 => $nama,
			'level'		 => $level
	    );

		//memanggil file view
		$this->load->view('theme/admin/index', $output);
	}

    public function author() 
    { 

		$nama  		 = $this->session->userdata('nama');
		$id  		 = $this->session->userdata('id');
		$level 	 	 = $this->session->userdata('level');
        $data_author = $this->m_article->author($id);

        $output = array(
            'theme_page'  => 'admin/v_article_author',
            'judul' 	  => 'Data Artikel',
			'data_author' => $data_author,
			'nama'		  => $nama,
			'level'		  => $level
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
		$list = $this->m_article->get_datatables();
		$data = array();
		$no = $this->input->post('start');

		//mencetak data json
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field['title'];
			$row[] = '<img src="'.base_url('images/upload_folder/' .$field['image']).'" class="img-fluid" style="height:75px; width:55px;" alt="ini gambar">';
			$row[] = $field['category'];
			$row[] = $field['publishedAt'];
			$row[] = $field['status'] == '1' ? '<div class ="btn btn-success btn-sm disabled">Verified</div>' : '<div class="btn btn-warning btn-sm disabled">Pending</div>';
			$row[] = '
				<div class="btn-group" role="group" aria-label="Basic outlined example">
					<a href="'.site_url('admin/article/update/'.$field['id_article']). '" class="btn btn-warning btn-sm " title="Edit">
						<i class="fas fa-edit"></i> 
					</a>
					<a href="'.site_url('admin/article/delete/'.$field['id_article']).'" class="btn btn-danger btn-sm btnHapus" title="Hapus" data = "'.$field['id'].'">
						<i class="fas fa-trash-alt"></i> 
					</a>
				</div>';

			$data[] = $row;
		}

		//mengirim data json
		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->m_article->count_all(),
			"recordsFiltered" => $this->m_article->count_filtered(),
			"data" => $data,
		);

		//output dalam format JSON
		echo json_encode($output);
	}

    public function insert() {

		$this->insert_submit();

        $data_category = $this->m_category->read();
		$level = $this->session->userdata('level');
		$NAMA = $this->session->userdata('nama');
		$ID = $this->session->userdata('id');


		$output = array(
            'theme_page' 	=> 'admin/v_article_insert',
            'judul' 	 	=> 'Data Artikel',
			'data_category' => $data_category,
			'level'			=> $level,
			'nama' 			=> $NAMA,
			'id' 			=> $ID,
        );


		// memanggil file view
		$this->load->view('theme/admin/index', $output);
	}

	public function insert_submit() {

		if ($this->input->post('submit') == 'Simpan') {

			//aturan validasi input login
			$this->form_validation->set_rules('author', 'Author', 'required');
			$this->form_validation->set_rules('title', 'Judul', 'required');
			$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('content', 'Isi Konten', 'required');

			//setting library upload
            $config = array (
                'upload_path'    => './images/upload_folder/',
                'allowed_types'  => 'gif|jpg|png',
                'max_size'       => 5000
            );

            $this->load->library('upload', $config);

			if ($this->form_validation->run() == TRUE) {

				// menangkap data input dari view
				$author	  	 = $this->input->post('author');
				$title	  	 = $this->input->post('title');
				$id_category = $this->input->post('id_kategori');
				$desc	  	 = $this->input->post('description');
				$content  	 = $this->input->post('content');
				$status  	 = '2';

				//jika gagal upload
                if (!$this->upload->do_upload('userfile')) {
        
                    //mengambil daftar provinsi dari table provinsi
                    $data_category = $this->m_category->read();
                    // $NIP = $this->session->userdata('nama');
        
                    //respon alasan kenapa gagal upload
                    $response = $this->upload->display_errors();

					$output = array(
						'theme_page' => 'admin/v_article_insert',
						'judul' 	 => 'Data Artikel',
                        'response'   => $response,

						'data_category' => $data_category
					);
			
					// memanggil file view
					$this->load->view('theme/admin/index', $output);
        
                //jika berhasil upload
                } else {
                    $this->upload->do_upload('userfile');
                    $upload_data = $this->upload->data('file_name');
        
                    //mengirim data ke model
                    $input = array(
                        //format : nama field/kolom table => data input dari view
                        'id_author'   => $author,
                        'title' 	  => $title,
                        'id_category' => $id_category,
                        'description' => $desc,
                        'content'     => $content,
                        'status'      => $status,
                        'image'       => $upload_data,
                    );
    
                    //memanggil function insert pada kota model
                    //function insert berfungsi menyimpan/create data ke table buku di database
                    $data_artikel = $this->m_article->insert($input);
        
                    //mengembalikan halaman ke function read
                    $this->session->set_tempdata('message', 'Data berhasil ditambahkan', 1);
					Redirect('admin/article/read');
				}

			}

		}

	}

	public function update()
	{

		//menangkap id data yg dipilih dari view (parameter get)
		$id  = $this->uri->segment(4);

		//function read berfungsi mengambil 1 data dari table kategori sesuai id yg dipilih
		$data_article_single = $this->m_article->read_single($id);
        $data_category = $this->m_category->read();
		$level = $this->session->userdata('level');
		$nama = $this->session->userdata('nama');

		//mengirim data ke view
		$output = array(
			'judul'	 		=> 'Edit Kategori',
			'theme_page' 	=> 'admin/v_article_update',
            'data_category' => $data_category,
			'level'			=> $level,
			'nama'			=> $nama,

			//mengirim data kota yang dipilih ke view
			'data_article_single' => $data_article_single
		);

		//memanggil file view
		$this->load->view('theme/admin/index', $output);
	}

	public function update_submit()
	{

		//setting library upload
        $config['upload_path']          = './images/upload_folder/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $this->load->library('upload', $config);

		// menangkap data input dari view
		$author	  	 = $this->input->post('author');
		$title	  	 = $this->input->post('title');
		$id_category = $this->input->post('id_category');
		$desc	  	 = $this->input->post('description');
		$content  	 = $this->input->post('content');
		$status  	 = $this->input->post('status');

		//menangkap id data yg dipilih dari view (parameter get)
        $id = $this->uri->segment(4);

		//jika gagal upload
        if (!$this->upload->do_upload('userfile')) {

            //function read berfungsi mengambil 1 data dari table kota sesuai id yg dipilih
            $data_article_single = $this->m_article->read_single($id);

            //mengambil daftar provinsi dari table provinsi
            $data_category = $this->m_category->read();

            //respon alasan kenapa gagal upload
            $response = $this->upload->display_errors();

            //mengirim data ke view
            $output = array(
                'judul'         => 'Update Artikel',
                'theme_page'    => 'admin/v_article_update',
                'response'      => $response,

                //mengirim data kota yang dipilih ke view
                'data_article_single' => $data_article_single,

                //mengirim daftar provinsi ke view
                'data_category' => $data_category
            );

            //memanggil file view
            $this->load->view('theme/admin/index', $output);

         //jika berhasil upload
        } else {
            $this->upload->do_upload('userfile');
            $upload_data = $this->upload->data('file_name');

            //mengirim data ke model
            $input = array(
                //format : nama field/kolom table => data input dari view
                'id_author'	  => $author,
                'title' 	  => $title,
                'id_category' => $id_category,
                'description' => $desc,
                'content'  	  => $content,
                'status'  	  => $status,
                'image'       => $upload_data
            );

            //memanggil function insert pada kota model
            //function insert berfungsi menyimpan/create data ke table buku di database
            $data_article = $this->m_article->update($input, $id);

            //mengembalikan halaman ke function read
            $this->session->set_tempdata('message', 'Data berhasil disimpan', 1);
			Redirect('admin/article/read');
        }
	}

	public function delete() {
		// menangkap id data yg dipilih dari view
		$id = $this->uri->segment(4);

		$this->db->db_debug = false; //disable debugging queries
		
		// Error handling
		if (!$this->m_article->delete($id)) {
			$msg =  $this->db->error();
			$this->session->set_tempdata('error', $msg['message'], 1);
		}

		//mengembalikan halaman ke function read
		$this->session->set_tempdata('message','Data berhasil dihapus',1);
		Redirect('admin/article/read');
	}
}
