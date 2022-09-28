<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_transaksi');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_produk' => $this->m_admin->total_produk(),
            'total_pesanan' => $this->m_admin->total_pesanan(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'total_transaksi' => $this->m_admin->total_transaksi(),
            'grafik' => $this->m_admin->grafik(),
            'grafik_pelanggan' => $this->m_admin->grafik_pelanggan(),
            'grafik_uang' => $this->m_admin->grafik_uang(),
            // 'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
            'isi' => 'v_admin'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    // List all your items
    public function user($offset = 0)
    {
        $data = array(
            'title' => 'Data User',
            'user' => $this->m_admin->get_all_data(),
            'isi' => 'backend/user/v_user'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add_user()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_admin->add_user($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('admin/user');
    }

    //Update one item
    public function edit_user($id_user = NULL)
    {
        $data = array(
            'id_user' => $id_user,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_admin->edit_user($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
        redirect('admin/user');
    }

    //Delete one item
    public function delete_user($id_user = NULL)
    {
        $data = array('id_user' => $id_user);
        $this->m_admin->delete_user($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('admin/user');
    }
}

/* End of file Admin.php */
