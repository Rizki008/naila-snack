<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->pelanggan_login($email, $password);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $jenis_kelamin = $cek->jenis_kelamin;
            $no_tlpn = $cek->no_tlpn;
            $alamat = $cek->alamat;
            $password = $cek->password;
            $kode_post = $cek->kode_post;
            $email = $cek->email;

            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('jenis_kelamin', $jenis_kelamin);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('password', $password);
            $this->ci->session->set_userdata('kode_post', $kode_post);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('no_tlpn', $no_tlpn);
            $this->ci->session->set_userdata('alamat', $alamat);

            redirect('home');
        } else {
            $this->ci->session->set_flashdata('error', 'nama_pelanggan atau Password Salah');
            redirect('pelanggan/login');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', 'Maaf Anda Belum Login / Register');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('password');
        $this->ci->session->unset_userdata('jenis_kelamin');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('kode_post');
        $this->ci->session->unset_userdata('no_tlpn');
        $this->ci->session->unset_userdata('alamat');

        $this->ci->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('warga/login');
    }
}
