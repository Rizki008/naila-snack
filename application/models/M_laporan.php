<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function lap_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function lap_bulan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function lap_tahun($tahun)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
}
