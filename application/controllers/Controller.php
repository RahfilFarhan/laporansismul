<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{
	private function check_login()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('controller/login');
		}
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model', 'model');
		$this->load->helper(['url', 'form']);
		$this->load->library(['session', 'form_validation']);
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('auth/login');
		$this->load->view('footer');
	}

	public function process_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->model->check_user($username);

		if ($user) {
			if (password_verify($password, $user->password)) {
				$this->session->set_userdata('logged_in', true);
				$this->session->set_userdata('username', $user->username);
				redirect('/');
			} else {
				$this->session->set_flashdata('error', 'Username atau Password Salah!');
				redirect('controller/login');
			}
		} else {
			$this->session->set_flashdata('error', 'Username atau Password Salah!');
			redirect('controller/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('/');
	}

	public function index($id = FALSE)
	{
		if ($id === FALSE) {
			$data['home_post'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('detail', $data);
			$this->load->view('footer');
		}
	}

	public function create()
	{
		$this->check_login();
		$this->form_validation->set_rules('judul', 'Judul Loker', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Loker', 'required');
		$this->form_validation->set_rules('perusahaan', 'Nama Perusahaan', 'required');
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Dibuka', 'required');
		$this->form_validation->set_rules('tanggal_selesai', 'Tanggal Berakhir', 'required');
		$this->form_validation->set_rules('kota', 'Kota Perusahaan', 'required');
		$this->form_validation->set_rules('gaji', 'Gaji', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		} else {
			$id = uniqid('item', true);

			$config['upload_path'] = './upload/post';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '1000000';
			$config['file_ext_tolower'] = TRUE;
			$config['file_name'] = str_replace('.', '_', $id);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image1')) {
				$filename = null;
			} else {
				$filename = $this->upload->data('file_name');
			}

			$this->model->create($id, $filename);
			redirect('');
		}
	}

	public function update($id)
	{
		
	}

	public function delete($id = FALSE)
	{
		
	}

	public function deleteAll()
	{
		
	}
}
