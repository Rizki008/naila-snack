<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data Transaksi Pelanggan',
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' => 'backend/transaksi/v_transaksi'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function detail($no_order)
    {
        $data = array(
            'title' => 'Detail Pesanan Pembeli',
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
            'pesanan' => $this->m_transaksi->pesanan($no_order),
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' => 'backend/transaksi/v_detail'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 1
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
        redirect('transaksi');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => 2
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
        redirect('transaksi');
    }
}

/* End of file Transaksi.php */
