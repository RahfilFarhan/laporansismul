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
            redirect('controller/index');
        }
    }

    
public function update($id)
{
    $this->check_login(); 

    $this->load->library('form_validation');
    $this->form_validation->set_rules('judul', 'Judul Loker', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi Loker', 'required');
    $this->form_validation->set_rules('perusahaan', 'Nama Perusahaan', 'required');
    $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Dibuka', 'required');
    $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Berakhir', 'required');
    $this->form_validation->set_rules('kota', 'Kota Perusahaan', 'required');
    $this->form_validation->set_rules('gaji', 'Gaji', 'required');

    if ($this->form_validation->run() == FALSE) {
        $data['post'] = $this->model->read($id);
        $this->load->view('header');
        $this->load->view('update', $data);
        $this->load->view('footer');
    } else {
        $updatedData = [
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'perusahaan' => $this->input->post('perusahaan', TRUE),
            'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
            'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            'gaji' => $this->input->post('gaji', TRUE)
        ];

        // cek upload file baru
        if (!empty($_FILES['image1']['name'])) {
            $config['upload_path'] = './upload/post/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1000000;
            $config['file_ext_tolower'] = TRUE;
            $config['overwrite'] = TRUE;

            $post = $this->model->read($id); // ambil filename lama
            $config['file_name'] = $post->filename;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image1')) {
                $upload_data = $this->upload->data();
                $updatedData['filename'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('controller/update/' . $id);
                return;
            }
        }

        $this->model->update($id, $updatedData);
        redirect('controller/index');
    }
}


    public function delete($id = FALSE)
    {
        $this->check_login();
        if ($id) {
            $this->model->delete($id);
            redirect('controller/index');
        } else {
            show_404();
        }
    }

    public function deleteAll()
    {
        $this->check_login();
        $this->model->deleteAll();
        $this->session->set_flashdata('success', 'Semua data berhasil dihapus!');
        redirect('controller/index');
    }
}
