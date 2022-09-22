<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'isi' => 'v_pemilik'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }

    //user
    public function user()
    {
        $data = array(
            'title' => 'Data User',
            'user' => $this->m_admin->user(),
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'isi' => 'pemilik/user/v_user'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
    public function add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_admin->add($data);
        $this->session->set_flashdata('pesan', 'Berhasil Tambah User');
        redirect('pemilik/user');
    }
    public function update($id_user = null)
    {
        $data = array(
            'id_user' => $id_user,
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $this->m_admin->update($data);
        $this->session->set_flashdata('pesan', 'Berhasil Diupdate');
        redirect('pemilik/user');
    }
    public function delete($id_user = null)
    {
        $data = array(
            'id_user' => $id_user,
        );
        $this->m_admin->delete($data);
        $this->session->set_flashdata('pesan', 'Berhasil Dihapus');
        redirect('pemilik/user');
    }

    public function analisis_pelanggan()
    {
        $data = array(
            'title' => 'Analisis Pelanggan Loyal',
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'isi' => 'pemilik/analisis/v_pelanggan'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
}
