<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    public function check_user($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row();
    }

    public function create($id, $filename)
    {
        $data = [
            'id' => $id,
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'perusahaan' => $this->input->post('perusahaan', TRUE),
            'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
            'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            'gaji' => $this->input->post('gaji', TRUE),
            'filename' => $filename
        ];

        $this->db->insert('post', $data);
    }

    public function read($id = FALSE)
    {
        if ($id === FALSE) {
            return $this->db->get('post')->result_array();
        } else {
            $query = $this->db->get_where('post', ['id' => $id]);
            return $query->row();
        }
    }


    public function update($id, $updatedData)
    {
        $this->db->where('id', $id);
        $this->db->update('post', $updatedData);
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('post');
    }

    public function deleteAll()
    {
        $this->db->empty_table('post');
    }
}
