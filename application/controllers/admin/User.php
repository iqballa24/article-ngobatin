<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //memanggil model
        $this->load->model(array('M_user'));
    }


    public function index()
    {
        //mengarahkan ke function read
        $this->login();
    }

    public function read()
    {

        $nama = $this->session->userdata('nama');
        $level = $this->session->userdata('level');

        if ($level == 'author') {
            $this->session->set_tempdata('error', "Anda tidak memiliki hak akses", 0);
            redirect($_SERVER['HTTP_REFERER']);
        }

        // mengirim data ke view
        $output = array(
            'theme_page' => 'admin/v_user',
            'judul'      => 'User management',
            'level'      => $level,
            'nama'       => $nama 
        );

        // memanggil file view
        $this->load->view('theme/admin/index', $output);
    }

    // fungsi menampilkan data dalam bentuk json
    public function datatables()
    {
        //menunda loading (bisa dihapus, hanya untuk menampilkan pesan processing)
        // sleep(2);

        //memanggil fungsi model datatables
        $list = $this->M_user->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        //mencetak data json
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field['nama'];
            $row[] = $field['email'];
            $row[] = $field['level'];
            $row[] = $field['status'] == '1' ? '<div class ="btn btn-success btn-sm disabled">Active</div>' : '<div class="btn btn-danger btn-sm disabled">Non Active</div>';
            $row[] = '
                <div class="btn-group" role="group" aria-label="Basic outlined example">
					<a href="' . site_url('admin/user/update/' . $field['id']) . '" class="btn btn-warning btn-sm " title="Edit">
						<i class="fas fa-pencil-alt"></i>
					</a>
					<a href="' . site_url('admin/user/delete/' . $field['id']) . '" class="btn btn-danger btn-sm btnHapus" title="Hapus" data = "' . $field['id'] . '">
						<i class="fas fa-trash-alt"></i>
					</a>
                    <a href="' . site_url('admin/user/defaultPassword/' . $field['id']) . '" class="btn btn-info btn-sm btnReset" title="Reset password" data = "' . $field['id'] . '">
						<i class="fas fa-key"></i> Reset
					</a>
                </div>';

            $data[] = $row;
        }

        //mengirim data json
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_user->count_all(),
            "recordsFiltered" => $this->M_user->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
    }

    public function insert()
    {

        $this->insert_submit();
        $nama = $this->session->userdata('nama');
		$level = $this->session->userdata('level');


        // mengirim data ke view
        $output = array(
            'theme_page'     => 'admin/v_user_insert',
            'judul'          => 'Kelola User',
            'level'          => $level,
            'nama'           => $nama
        );

        // memanggil file view
        $this->load->view('theme/admin/index', $output);
    }

    public function insert_submit()
    {

        if ($this->input->post('submit') == 'Simpan') {

            //aturan validasi input login
            $this->form_validation->set_rules('nama', 'Nama', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('level', 'Level', 'required');

            if ($this->form_validation->run() == TRUE) {

                // menangkap data input dari view
                $nama             = $this->input->post('nama');
                $email            = $this->input->post('email');
                $level            = $this->input->post('level');
                $password         = $this->input->post('email');
                $password_encrypt = md5($password);
                $status           = '1';

                // mengirim data ke model
                $input = array(
                    // format : nama field/kolom table => data input dari view
                    'nama'      => $nama,
                    'email'     => $email,
                    'level'     => $level,
                    'password'  => $password_encrypt,
                    'status'    => $status,
                );

                // memanggil function insert pada anggota_model.php
                // function insert berfungsi menyimpan/create data ke table anggota di database
                $data_user = $this->M_user->insert($input);

                // mengembalikan halaman ke function read
                $this->session->set_tempdata('message', 'Data berhasil ditambahkan !', 1);
                redirect('admin/user/read');
            }
        }
    }

    public function login()
    {

        //memanggil fungsi login submit	(agar di view tidak dilihat fungsi login submit)
        $this->login_submit();

        //mengirim data ke view
        $output = array( 
            'judul' => 'Login'
        );

        //memanggil file view
        $this->load->view('admin/v_login', $output);
    }

    private function login_submit()
    {

        //proses jika tombol login di submit
        if ($this->input->post('submit') == 'Login') {

            //aturan validasi input login
            $this->form_validation->set_rules('email', 'Email', 'required|callback_login_check');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

            //jika validasi sukses 
            if ($this->form_validation->run() == TRUE) {

                redirect('admin/dashboard/read');
            }
        }
    }

    public function login_check()
    {
        //menangkap data input dari view
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //password encrypt
        $password_encrypt = md5($password);

        //check username & password sesuai dengan di database
        $data_user = $this->M_user->read_single($email, $password_encrypt);

        //jika cocok : dikembalikan ke fungsi login_submit (validasi sukses)
        if (!empty($data_user)) {

            //buat session user 
            $this->session->set_userdata('id', $data_user['id']);
            $this->session->set_userdata('email', $data_user['email']);
            $this->session->set_userdata('nama', $data_user['nama']);
            $this->session->set_userdata('level', $data_user['level']);
            $this->session->set_userdata('status', $data_user['status']);

            return TRUE;

            //jika tidak cocok : dikembalikan ke fungsi login_submit (validasi gagal)
        } else {

            //membuat pesan error
            $this->form_validation->set_message('login_check', 'Username & password tidak tepat');

            return FALSE;
        }
    }

    public function register()
    {

        $this->register_submit();

        // memanggil file view
        $this->load->view('admin/v_user_register');
    }

    public function register_submit()
    {

        if ($this->input->post('submit') == 'Register') {

            //aturan validasi input login
            $this->form_validation->set_rules('nama', 'Nama', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_register_check');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');   
            $this->form_validation->set_rules('confpassword', 'Konfirmasi password', 'required|matches[password]');

            if ($this->form_validation->run() == TRUE) {

                // menangkap data input dari view
                $nama             = $this->input->post('nama');
                $email            = $this->input->post('email');
                $level            = 'author';
                $password         = $this->input->post('password');
                $password_encrypt = md5($password);
                $status           = '2';

                // mengirim data ke model
                $input = array(
                    // format : nama field/kolom table => data input dari view
                    'nama'      => $nama,
                    'email'     => $email,
                    'level'     => $level,
                    'password'  => $password_encrypt,
                    'status'    => $status,
                );

                // memanggil function insert pada anggota_model.php
                // function insert berfungsi menyimpan/create data ke table anggota di database
                $data_user = $this->M_user->insert($input);

                // mengembalikan halaman ke function read
                $this->session->set_tempdata('message', 'Data berhasil ditambahkan !', 1);
                redirect('admin/user/login');
            }
        }
    }

    public function register_check()
	{

		//Menangkap data input dari view
		$email = $this->input->post('email');

		//check data di database
		$data_user = $this->M_user->read_check($email);

		if (!empty($data_user)) {
            //membuat pesan error
            $this->form_validation->set_message('register_check', 'Alamat email sudah terdaftar');

			return FALSE;
		}
		return TRUE;
	}

    public function logout()
    {
        //hapus session user
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('status');

        //mengembalikan halaman ke function read
        redirect('admin/user/login');
    }

    public function reset()
    {

        $this->reset_submit();
        $nama = $this->session->userdata('nama');
		$level = $this->session->userdata('level');

        //mengirim data ke view
        $output = array(
            'theme_page'   => 'admin/v_reset_password',
            'judul'        => 'Reset password',
            'level'		 => $level,
			'nama'		 => $nama
        );

        //memanggil file view
        $this->load->view('theme/admin/index', $output);
    }

    private function reset_submit()
    {

        if ($this->input->post('submit') == 'Simpan') {

            //aturan validasi input login
            $this->form_validation->set_rules('password_lama', 'Current Password', 'required|alpha_numeric|callback_reset_check');
            $this->form_validation->set_rules('password_baru', 'New Password', 'required|alpha_numeric|min_length[5]|differs[password_lama]');
            $this->form_validation->set_rules('password_baru_ulangi', 'Confirm New Password', 'required|alpha_numeric|matches[password_baru]');

            if ($this->form_validation->run() == TRUE) {

                //menangkap data input dari view
                $newPassword = $this->input->post('password_baru');

                //password encrypt
                $Password = md5($newPassword);

                //session user
                $id = $this->session->userdata('id');

                //mengirim data ke model
                $input = array(
                    //format : nama field/kolom table => data input dari view
                    'password' => $Password,
                );

                //memanggil function insert pada user model
                $data = $this->M_user->update($input, $id);

                //redirect ke provinsi (bisa dirubah ke controller & fungsi manapun)
                $this->session->set_tempdata('message', 'Password berhasil diubah !', 1);
                redirect('admin/dashboard');
            }
        }
    }

    public function reset_check()
    {
        //menangkap data input dari view
        $currentPassword = $this->input->post('password_lama');

        //password encrypt
        $currentPassword = md5($currentPassword);

        //check username & password sesuai dengan di database
        $data_user = $this->M_user->password($currentPassword);

        //jika data user sesuai dengan di database
        if (empty($data_user)) {

            //membuat pesan error
            $this->form_validation->set_message('reset_check', 'Wrong Current Password');
            return FALSE;
        }

        //jika tidak cocok : dikembalikan ke fungsi login_submit (validasi gagal)
        return TRUE;
    }

    public function defaultPassword()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(4);

        // menangkap data input dari view
        $password         = '12345';
        $password_encrypt = md5($password);

        // mengirim data ke model
        $input = array(
            // format : nama field/kolom table => data input dari view
            'password'  => $password_encrypt
        );

        //memanggil function update pada kategori model
        $this->M_user->update($input, $id);

        //mengembalikan halaman ke function read
        $this->session->set_tempdata('message', 'Password berhasil di Reset !', 1);
        redirect('admin/user/read');
      
	}

    public function update()
    {

        $this->update_submit();
        // $this->load->library('encryption');

        //menangkap id data yg dipilih dari view (parameter get)
        $id  = $this->uri->segment(4);

        //function read berfungsi mengambil 1 data dari table kategori sesuai id yg dipilih
        $data_user_single = $this->M_user->read_single_id($id);
		$level = $this->session->userdata('level');
        $nama = $this->session->userdata('nama');

        //mengirim data ke view
        $output = array(
            'judul'         => 'Edit User',
            'theme_page'    => 'admin/v_user_update',
            'level'         => $level,
            'nama'          => $nama,

            //mengirim data kota yang dipilih ke view
            'data_user_single' => $data_user_single
        );

        //memanggil file view
        $this->load->view('theme/admin/index', $output);
    }

    public function update_submit()
    {

        if ($this->input->post('submit') == 'Simpan') {

            if ($this->form_validation->run() == FALSE) {

    			$this->form_validation->set_rules('nama', 'Nama', 'required');
    			$this->form_validation->set_rules('email', 'Email', 'required');
    			$this->form_validation->set_rules('level', 'Level', 'required');
    			$this->form_validation->set_rules('status', 'Status', 'required');


                //menangkap id data yg dipilih dari view
                $id = $this->uri->segment(4);

                // menangkap data input dari view
                $nama     = $this->input->post('nama');
                $email    = $this->input->post('email');
                $level    = $this->input->post('level');
                $status   = $this->input->post('status');

                // mengirim data ke model
                $input = array(
                    // format : nama field/kolom table => data input dari view
                    'nama'      => $nama,
                    'level'     => $level,
                    'status'    => $status,
                    'email'     => $email,
                    'level'     => $level
                );

                //memanggil function update pada kategori model
                $data_user = $this->M_user->update($input, $id);

                //mengembalikan halaman ke function read
                $this->session->set_tempdata('message', 'Data berhasil disimpan !', 1);
                redirect('admin/user/read');
            }
        }
    }

    public function delete()
    {
        // menangkap id data yg dipilih dari view
        $id = $this->uri->segment(4);

        // memanggil petugas_model
        $this->M_user->delete($id);

        //mengembalikan halaman ke function read
        $this->session->set_tempdata('message', 'Data berhasil dihapus', 1);
        redirect('admin/user/read');

    }
}
