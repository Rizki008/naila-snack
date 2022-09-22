<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Laporan',
            'isi' => 'backend/laporan/v_laporan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function lap_hari()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Perhari',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_hari($tanggal, $bulan, $tahun),
            'isi' => 'backend/laporan/v_lap_harian'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function lap_bulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Laporan Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulan($bulan, $tahun),
            'isi' => 'backend/laporan/v_lap_bulanan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function lap_tahun()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Laporan Pertahun',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahun($tahun),
            'isi' => 'backend/laporan/v_lap_tahunan'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
}
