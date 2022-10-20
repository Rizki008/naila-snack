<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('user', $data);
    }
    public function update($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user');
    }

    //lokasi
    public function data_lokasi()
    {
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('lokasi', $data);
    }

    //informasi
    public function total_produk()
    {
        return $this->db->get('produk')->num_rows();
    }

    public function total_pesanan()
    {
        $this->db->where('status_order=0');
        return $this->db->get('transaksi')->num_rows();
    }

    public function total_pelanggan()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function total_transaksi()
    {
        $this->db->where('status_order=3');
        return $this->db->get('transaksi')->num_rows();
    }

    //data user
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }


    public function add_user($data)
    {
        $this->db->insert('user', $data);
    }

    public function edit_user($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }

    public function delete_user($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user', $data);
    }

    //grafik
    public function grafik()
    {
        $this->db->select_sum('qty');
        $this->db->select('produk.nama_produk');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    //grafik
    public function grafik_pelanggan()
    {

        // return $this->db->query("SELECT COUNT(transaksi.no_order) as qty, nama, month(tgl_order) FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan GROUP BY transaksi.id_pelanggan")->result();
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.nama_pelanggan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function grafik_uang()
    {
        return $this->db->query("SELECT SUM(qty), transaksi.nama_lengkap, transaksi.grand_total FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order GROUP BY pelanggan.id_pelanggan ORDER BY transaksi.grand_total DESC")->result();;
    }

    public function history()
    {
        return $this->db->query("SELECT * FROM pelanggan JOIN transaksi ON pelanggan.id_pelanggan=transaksi.id_pelanggan JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order GROUP BY transaksi.id_pelanggan ORDER BY transaksi.id_pelanggan DESC;")->result();
    }
    public function history_belanja($id_pelanggan)
    {
        return $this->db->query("SELECT *, SUM(grand_total) as total_belanja, SUM(qty) AS jml_qty FROM `transaksi` JOIN pelanggan on transaksi.id_pelanggan=pelanggan.id_pelanggan JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order JOIN produk ON rinci_transaksi.id_produk=produk.id_produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE transaksi.id_pelanggan='" . $id_pelanggan . "' GROUP BY produk.id_produk ORDER BY qty")->result();
    }

    public function history_detail($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('transaksi', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('riview', 'rinci_transaksi.id_rinci = riview.id_rinci', 'left');
        $this->db->where('pelanggan.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }
}

/* End of file M_admin.php */
