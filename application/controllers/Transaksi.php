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
            'pesanan_masuk' => $this->m_pesanan_masuk->pesanan_masuk(),
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' => 'backend/transaksi/v_transaksi'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function detail($no_order)
    {
        $data = array(
            'title' => 'Detail Pesanan Pembeli',
            'pesanan' => $this->m_pesanan_masuk->pesanan_user($no_order),
            'pesanan_detail' => $this->m_pesanan_masuk->pesanan_detail($no_order),
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
            'status_order' => 2
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
        redirect('transaksi');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'atas_nama' => $this->input->post('atas_nama'),
            'status_order' => 3
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
        redirect('transaksi');
    }
}

/* End of file Transaksi.php */
