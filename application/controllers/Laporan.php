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

    public function hari()
    {
        $data = array(
            'title' => 'Data Laporan harian',
            'laporan' => $this->m_laporan->lap_hari(),
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            // 'isi' => 'pemilik/laporan/v_hari'
            'isi' => 'pemilik/laporan/data_laporan/v_lap_hari'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }

    public function bulan()
    {
        $data = array(
            'title' => 'Data Laporan Bulanan',
            'laporan' => $this->m_laporan->lap_bulan(),
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            // 'isi' => 'pemilik/laporan/v_bulan'
            'isi' => 'pemilik/laporan/data_laporan/v_lap_bulan'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
    public function tahun()
    {
        $data = array(
            'title' => 'Data Laporan Tahunan',
            'laporan' => $this->m_laporan->lap_tahun(),
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            // 'isi' => 'pemilik/laporan/v_tahun'
            'isi' => 'pemilik/laporan/data_laporan/v_lap_tahun'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
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
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'isi' => 'pemilik/laporan/data_laporan/v_lap_hari'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
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
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'isi' => 'pemilik/laporan/data_laporan/v_lap_bulan'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }

    // public function lap_tahun()
    // {
    //     $tahun = $this->input->post('tahun');
    //     $data = array(
    //         'title' => 'Laporan Pertahun',
    //         'tahun' => $tahun,
    //         'laporan' => $this->m_laporan->lap_tahun($tahun),
    //         'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
    //         'isi' => 'pemilik/laporan/data_laporan/v_lap_tahun'
    //     );
    //     $this->load->view('pemilik/v_wrapper', $data, FALSE);
    // }
}
