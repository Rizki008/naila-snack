<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_home');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pesanan saya',
            'transaksi' => $this->m_transaksi->status_order(),
            'isi' => 'frontend/cart/v_pesanan_saya'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function bayar($id)
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']             = 5000;
            $this->upload->initialize($config);
            $field_name = "bukti_bayar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'detail' => $this->m_transaksi->detail_pesanan($id),
                    'error' => $this->upload->display_errors(),
                    'isi' =>  'frontend/cart/v_detail_pesanan_selesai'
                );
                $this->load->view('frontend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_bank' => $this->input->post('nama_bank'),
                    'status_bayar' => '1',
                    'status_order' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->m_transaksi->bayar($id, $data);
                $this->session->set_flashdata('success', 'Data Bukti Pembayaran Berhasil Dikirim!');
                redirect('pesanan_saya/detail_pesanan/' . $id);
            }
        }
        $data = array(
            'detail' => $this->m_transaksi->detail_pesanan($id),
            'isi' =>  'frontend/cart/v_detail_pesanan_selesai'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }


    public function diterima($id)
    {
        $id_pelanggan = $this->input->post('pelanggan');
        $pelanggan = $this->m_pesanan_masuk->pelanggan($id_pelanggan);
        $point_sebelumnya = $pelanggan->point;

        $point_update = $point_sebelumnya + $this->input->post('point');
        //update level member
        if ($point_update <= 1000) {
            $member = '3';
        } else if ($point_update >= 1000) {
            $member = '2';
        } else if ($point_update >= 10000) {
            $member = '1';
        }
        $data = array(
            'point' => $point_update,
            'level_member' => $member
        );
        $this->m_pesanan_masuk->update_point($id_pelanggan, $data);

        $status_order = array(
            'status_order' => '4'
        );
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $status_order);
        $this->session->set_flashdata('success', 'Pesanan Sudah Diterima');
        redirect('pesanan_saya/detail_pesanan/' . $id);
    }

    //pemesanan selesai deteail & review produk
    public function detail_pesanan($id)
    {
        $data = array(
            'title' => 'Detail Pesanan',
            'produk' => $this->m_home->produk(),
            'detail' => $this->m_transaksi->detail_pesanan($id),
            'isi' =>  'frontend/cart/v_detail_pesanan_selesai'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }


    public function rating($id)
    {
        $data = array(
            'id_penilaian' => $this->input->post('id'),
            'info_penilaian' => $this->input->post('rating'),
            'review' => $this->input->post('review')
        );
        $this->db->where('id_penilaian', $data['id_penilaian']);
        $this->db->update('riview', $data);
        redirect('pesanan_saya/detail_pesanan/' . $id);
    }

    public function dibatalkan($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('pesanan_saya');
    }
}
