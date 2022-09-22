<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master_produk');
        $this->load->model('m_home');
    }

    public function index()
    {
        $data = array(
            'title' => 'Naila Snack',

            'best' => $this->m_home->produk_best(),
            'menu' => $this->m_home->menu_paket(),
            'diskon' => $this->m_home->diskon(),
            'lates' => $this->m_home->produk_lates(),


            // 'produk' => $this->m_home->produk(),
            // 'produk_baru' => $this->m_home->produk_baru(),
            // 'produk_bagus' => $this->m_home->produk_bagus(),
            // 'diskon' => $this->m_home->diskon(),
            'ketegori' => $this->m_master_produk->kategori(),
            'isi' => 'v_home'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function detail_produk($id = null)
    {
        $data = array(
            'title' => 'Detail Produk',
            'data' => $this->m_home->detail_produk($id),
            'gambar' => $this->m_home->gambar_produk($id),
            'related_produk' => $this->m_home->related_produk($id),
            'isi' => 'frontend/detail/v_detail'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    // public function kategori($id_kategori)
    // {
    //     $kategori = $this->m_home->kategori($id_kategori);
    //     $data = array(
    //         'title' => $kategori->nama_kategori,
    //         'produk' => $this->m_home->produk_kategori($id_kategori),
    //         'isi' => 'frontend/kategori/v_kategori'
    //     );
    //     $this->load->view('frontend/v_wrapper', $data, FALSE);
    // }
}
