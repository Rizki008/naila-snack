<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }

    public function produk_baru()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->group_by('produk.id_produk');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function detail_produk($id)
    {
        $data['produk'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE produk.id_produk='" . $id . "'")->row();
        $data['review'] = $this->db->query("SELECT * FROM `rinci_transaksi` JOIN riview ON rinci_transaksi.id_rinci=riview.id_rinci JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE id_produk='" . $id . "' AND info_penilaian != 0")->result();
        return $data;
    }
    public function gambar_produk($id)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id);
        return $this->db->get()->result();
    }

    public function related_produk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where(array('produk.id_produk !='), $id);
        $this->db->limit(8);
        return $this->db->get()->result();
    }
    public function produk_lates()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    //pencarian produk

    public function pencarian($data = null)
    {
        $this->db->select('*');
        $this->db->from('produk');
        if (!empty($data)) {
            $this->db->like('nama_produk', $data);
        }
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->order_by('produk.id_produk', 'desc');
        return $this->db->get()->result();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function kategori_produk()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function produk_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }

    public function diskon()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('diskon>=1 and stock>=1');
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }

    public function produk_diskon()
    {
        $this->db->from('produk');
        $this->db->where('is_available', 1);
        $this->db->order_by('diskon', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function katalog()
    {
        if ($this->session->userdata('member') == '') {
            $data['menu'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='3'")->result();
        } else {
            $data['menu'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='" . $this->session->userdata('member') . "'")->result();
        }

        return $data;
    }
    public function produk_best()
    {
        return $this->db->query("SELECT SUM(qty) as qty, produk.id_produk, nama_produk, harga, images FROM `rinci_transaksi` JOIN diskon ON rinci_transaksi.id_diskon = diskon.id_diskon JOIN produk on produk.id_produk = diskon.id_produk  GROUP BY produk.id_produk ORDER BY qty desc")->result();
    }
    public function menu_paket()
    {
        if ($this->session->userdata('level_member') == '') {
            $data['paket'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='3'")->result();
        } else {
            $data['paket'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='" . $this->session->userdata('level_member') . "'")->result();
        }
        return $data;
    }
    public function menu_diskon()
    {
        if ($this->session->userdata('level_member') == '') {
            $data['paket'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='3'")->result();
        } else {
            $data['paket'] = $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE diskon.member='" . $this->session->userdata('member') . "'")->result();
        }
        return $data;
    }
    public function produk_rating()
    {
        return $this->db->query("SELECT round(SUM(info_penilaian) / COUNT(info_penilaian)) as jml , rinci_transaksi.id_rinci, produk.id_produk, images, nama_produk, harga, diskon, stock, diskon.id_diskon FROM riview JOIN rinci_transaksi ON rinci_transaksi.id_rinci=riview.id_rinci JOIN produk ON produk.id_produk=rinci_transaksi.id_produk JOIN diskon ON produk.id_produk=diskon.id_produk WHERE info_penilaian !='0'  GROUP BY rinci_transaksi.id_produk ORDER BY jml DESC limit 5")->result();
    }
}
