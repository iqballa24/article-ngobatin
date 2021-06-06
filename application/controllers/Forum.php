<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if (empty($this->session->userdata('nama'))) {
			redirect('guestbook/read');
		}
        // memanggil model
        $this->load->model(array('M_forum','M_category'));
    }

	public function index()
	{
        $this->read();
	}

    public function read() 
    { 
		// ambil data keyword
		if($this->input->post('submit')){

			if($this->input->post('keyword') == null){
				$data_forum   	 = $this->M_forum->read();
			}else{
				$data 		= $this->input->post('keyword');
				$data_forum = $this->M_forum->search($data);
			}
		}else {
			$data_forum   	 = $this->M_forum->read();
		}

		// $getTotalAllComment = $this->M_forum->getTotalAllComment();

        $output = array(
            'theme_page' 	=> 'user/v_forum',
            'judul' 	 	=> 'Data Artikel',
			'data_forum' 	=> $data_forum,
			// 'totalComment'	=> $getTotalAllComment
	    );

		//memanggil file view
		$this->load->view('theme/user/index', $output);
	}

	public function discussion()
	{
		$this->discussion_insert();

		$id  		   		= $this->uri->segment(3);
        $data_forum_single  = $this->M_forum->read_single($id);
		$data_forum    		= $this->M_forum->discus($id);
		$total_comment 		= $this->M_forum->getTotalComment($id);

        $output = array(
            'theme_page' 		=> 'user/v_forum_discuss',
            'judul' 			=> 'Data Artikel',
			'total_comment' 	=> $total_comment,
			'data_forum_single' => $data_forum_single,
			'data_forum' 		=> $data_forum,
			'id'				=> $id
	    );

		//memanggil file view
		$this->load->view('theme/user/index', $output);
	}

	public function discussion_insert() {

		if ($this->input->post('submit') == 'Kirim') {

			//aturan validasi input login
			$this->form_validation->set_rules('content', 'Content', 'required');
			$id      = $this->input->post('id');

			if ($this->form_validation->run() == TRUE) {

				// menangkap data input dari view
				$nama 	 = $this->session->userdata('nama');
				$content = $this->input->post('content');

		
				// mengirim data ke model
				$input = array(
								'comment' 	=> $content,
								'user'		=> $nama,
								'forum'		=> $id
							);
                            
				$data_discuss = $this->M_forum->discussion($input);

				// mengembalikan halaman ke function read
				$this->session->set_tempdata('message', 'Komentar berhasil di tambahkan', 1);
				redirect('forum/discussion/'. $id);
			}else {
				$this->session->set_tempdata('error', 'Komentar Kosong !', 1);
				redirect('forum/discussion/'. $id);
			}
		}

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

        $data_category = $this->M_category->read();
		$NAMA = $this->session->userdata('nama');

		$output = array(
            'theme_page' => 'user/v_forum_insert',
			'data_category' => $data_category,
			'nama' 			=> $NAMA,
        );


		// memanggil file view
		$this->load->view('theme/user/index', $output);
	}

	public function insert_submit() {

		if ($this->input->post('submit') == 'Kirim') {

			//aturan validasi input login
			$this->form_validation->set_rules('question', 'Pertanyaan', 'required');
			$this->form_validation->set_rules('detail_question', 'Uraian Pertanyaan', 'required');
			$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

			if ($this->form_validation->run() == TRUE) {

				$nama = $this->session->userdata('nama');

				// menangkap data input dari view
				$Category	  = $this->input->post('id_kategori');
				$Nama	 	  = $nama;
				$Question	  = $this->input->post('question');
				$Uraian		  = $this->input->post('detail_question');
				$isPositif	  = '2';
		
				// mengirim data ke model
				$input = array(
								'kategori' 		=> $Category,
								'title'			=> $Question,
								'text'			=> $Uraian,
								'user'			=> $Nama,
								'isPositif'		=> $isPositif,
							);
                            
				$data_category = $this->M_forum->insert($input);

				// mengembalikan halaman ke function read
				$this->session->set_tempdata('message', 'Forum akan tampil setelah disetujui admin', 1);
				redirect('forum/read');
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
