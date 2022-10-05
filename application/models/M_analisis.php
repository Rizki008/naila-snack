<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_analisis extends CI_Model
{

    public function produk_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('produk.nama_produk');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function produk_bulan($bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('produk.nama_produk');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function produk_tahun($tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('produk.nama_produk');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    //pelanggan
    public function pelanggan_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.nama_pelanggan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function pelanggan_bulan($bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.nama_pelanggan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function pelanggan_tahun($tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.nama_pelanggan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    //alamat
    public function alamat_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.kecamatan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.kecamatan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function alamat_bulan($bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.kecamatan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.kecamatan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function alamat_tahun($tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.kecamatan');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.kecamatan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    //DUit
    public function uang_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('transaksi.nama_lengkap');
        $this->db->select('transaksi.grand_total');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('transaksi.grand_total', 'desc');
        return $this->db->get()->result();
    }
    public function uang_bulan($bulan, $tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('transaksi.nama_lengkap');
        $this->db->select('transaksi.grand_total');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('transaksi.grand_total', 'desc');
        return $this->db->get()->result();
    }
    public function uang_tahun($tahun)
    {
        $this->db->select_sum('qty');
        $this->db->select('transaksi.nama_lengkap');
        $this->db->select('transaksi.grand_total');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('transaksi.grand_total', 'desc');
        return $this->db->get()->result();
    }
}
