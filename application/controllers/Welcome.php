<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_welcome', 'model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index($id = FALSE)
	{
		if ($id === FALSE) {
			$data['home_post'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else {
			$data ['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('post', $data);
			$this->load->view('footer');
		}
	}

	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		} else {
			$id = uniqid('item', true);

			$config['upload_path'] = './upload/post';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '1000000';
			$config['file_ext_tolower'] = TRUE;
			$config['filename'] = str_replace('.', '_', $id);

			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('image1')){
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('welcome/create');
			} else {
				$filename = $this->upload->data('file_name');
				$this->model->create($id, $filename);
				redirect('');
			}
		}
	}

	public function update($id) {
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('update', $data);
			$this->load->view('footer');
		} else {
			// filename variable
			$filename = null;
			// upload file check
			if (!empty($_FILES['image']['name'])) {
				// assign to variabel $post, not to $data['post']
				$post = $this->model->read($id);
	
				$config['upload_path'] = './upload/post';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1000000';
				$config['file_ext_tolower'] = TRUE;
				$config['overwrite'] = TRUE;
				// fix $post undefined
				$config['file_name'] = $post->filename;
	
				$this->load->library('upload', $config);
	
				if (!$this->upload->do_upload('image')) {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('welcome/update/' . $id);
				} else {
					$filename = $this->upload->data('file_name');
				}
			}
			// send filename to model, null is ok 
			$this->model->update($id, $filename);
			redirect('');
		}
	}

	public function delete($id = FALSE){
		$post = $this->model->read($id);
		$this->model->delete($id);

		unlink('./upload/post/*'.$post->filename);
		redirect();
	}

	public function deleteAll(){
		$this->model->deleteAll();
		$files = glob('./upload/post/*');

		foreach($files as $file){
			if(is_file($file))
			unlink($file);
		}
		redirect();
	}
}