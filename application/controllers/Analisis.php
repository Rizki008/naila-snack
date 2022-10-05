<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Analisis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_analisis');
        $this->load->model('m_transaksi');
    }

    public function produk()
    {
        $data = array(
            'title' => 'Data Analisis Produk',
            'isi' => 'backend/analisis/v_analisis'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function produk_hari()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Analisis Produk Perhari',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis' => $this->m_analisis->produk_hari($tanggal, $bulan, $tahun),
            'isi' => 'backend/analisis/produk/v_produk_harian'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function produk_bulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis Produk Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis' => $this->m_analisis->produk_bulan($bulan, $tahun),
            'isi' => 'backend/analisis/produk/v_produk_bulanan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function produk_tahun()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis Produk Pertahun',
            'tahun' => $tahun,
            'analisis' => $this->m_analisis->produk_tahun($tahun),
            'isi' => 'backend/analisis/produk/v_produk_tahunan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    //pelanggan
    public function pelanggan()
    {
        $data = array(
            'title' => 'Data Analisis pelanggan',
            'isi' => 'backend/analisis/v_analisis_pelanggan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function pelanggan_hari()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Analisis pelanggan Perhari',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis_pelanggan' => $this->m_analisis->pelanggan_hari($tanggal, $bulan, $tahun),
            'isi' => 'backend/analisis/pelanggan/v_pelanggan_harian'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function pelanggan_bulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis pelanggan Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis_pelanggan' => $this->m_analisis->pelanggan_bulan($bulan, $tahun),
            'isi' => 'backend/analisis/pelanggan/v_pelanggan_bulanan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function pelanggan_tahun()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis pelanggan Pertahun',
            'tahun' => $tahun,
            'analisis_pelanggan' => $this->m_analisis->pelanggan_tahun($tahun),
            'isi' => 'backend/analisis/pelanggan/v_pelanggan_tahunan'
        );
        // echo $this->db->last_query();
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    //uang
    public function uang()
    {
        $data = array(
            'title' => 'Data Analisis Keuangan',
            'isi' => 'backend/analisis/v_analisis_uang'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function uang_hari()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Analisis keuangan Perhari',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis_uang' => $this->m_analisis->uang_hari($tanggal, $bulan, $tahun),
            'isi' => 'backend/analisis/uang/v_uang_harian'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function uang_bulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis Keuangan Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis_uang' => $this->m_analisis->uang_bulan($bulan, $tahun),
            'isi' => 'backend/analisis/uang/v_uang_bulanan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function uang_tahun()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis Keuangan Pertahun',
            'tahun' => $tahun,
            'analisis_uang' => $this->m_analisis->uang_tahun($tahun),
            'isi' => 'backend/analisis/uang/v_uang_tahunan'
        );
        // echo $this->db->last_query();
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    //alamat
    public function alamat()
    {
        $data = array(
            'title' => 'Data Analisis Alamat',
            'isi' => 'backend/analisis/v_analisis_alamat'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function alamat_hari()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Analisis Alamat Perhari',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis_alamat' => $this->m_analisis->alamat_hari($tanggal, $bulan, $tahun),
            'isi' => 'backend/analisis/alamat/v_alamat_harian'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function alamat_bulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis Alamat Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'analisis_alamat' => $this->m_analisis->alamat_bulan($bulan, $tahun),
            'isi' => 'backend/analisis/alamat/v_alamat_bulanan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function alamat_tahun()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Analisis Alamat Pertahun',
            'tahun' => $tahun,
            'analisis_alamat' => $this->m_analisis->alamat_tahun($tahun),
            'isi' => 'backend/analisis/alamat/v_alamat_tahunan'
        );
        // echo $this->db->last_query();
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
}
