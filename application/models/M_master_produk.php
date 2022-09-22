<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_master_produk extends CI_Model
{
	//kategori
	public function kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get()->result();
	}
	public function detail_kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get()->row();
	}
	public function add_kategori($data)
	{
		$this->db->insert('kategori', $data);
	}
	public function edit_kategori($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);
	}
	public function hapus_kategori($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori');
	}

	//produk
	public function produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$this->db->order_by('id_produk', 'desc');
		return $this->db->get()->result();
	}
	public function id_produk()
	{
		return $this->db->query('SELECT max(id_produk) as id FROM produk')->row();
	}
	public function detail_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->row();
	}
	public function add_produk($data)
	{
		$this->db->insert('produk', $data);
	}
	public function edit_produk($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}
	public function delete_produk($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk');
	}

	//gambar
	public function gambar()
	{
		$this->db->select('produk.*,COUNT(gambar.id_gambar)as total_gambar');
		$this->db->select('gambar.img');
		$this->db->from('produk');
		$this->db->join('gambar', 'produk.id_produk = gambar.id_produk', 'left');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('.produk.id_produk', 'desc');
		return $this->db->get()->result();
	}
	public function detail($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		return $this->db->get()->row();
	}
	public function detail_gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->result();
	}
	public function add_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar');
	}

	//diskon
	public function diskon()
	{
		return $this->db->query("SELECT * FROM `diskon` JOIN produk ON diskon.id_produk=produk.id_produk WHERE diskon != '0'")->result();
	}
	public function produk_diskon()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
		$this->db->order_by('produk.id_produk', 'desc');
		$this->db->group_by('size.id_size');
		return $this->db->get()->result();
	}
	public function diskon_add($id, $level, $data)
	{
		$this->db->where('id_produk', $id);
		$this->db->where('member', $level);
		$this->db->update('diskon', $data);
	}
	public function add_diskon($data)
	{
		$this->db->insert('diskon', $data);
	}
	public function edit_diskon($id)
	{
		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');
		$this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
		$this->db->where('id_diskon', $id);
		return $this->db->get()->row();
	}
	public function delete_diskon($id, $data)
	{
		$this->db->where('id_diskon', $id);
		$this->db->update('diskon', $data);
	}

	//size data produk
	public function size($id)
	{
		$this->db->select('*');
		$this->db->from('size');
		$this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
		$this->db->where('produk.id_produk', $id);
		$data['size'] = $this->db->get()->result();
		$data['produk'] = $this->db->get_where('produk', array('id_produk' => $id))->row();
		return $data;
	}
	public function add_size($data)
	{
		$this->db->insert('size', $data);
	}
	public function size_detail($id)
	{
		$this->db->select('*');
		$this->db->from('size');
		$this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
		$this->db->where('size.id_size', $id);
		return $this->db->get()->row();
	}
	public function update_size($id, $data)
	{
		$this->db->where('id_size', $id);
		$this->db->update('size', $data);
	}
	public function delete_size($id)
	{
		$this->db->where('id_size', $id);
		$this->db->delete('size');
	}
	//jika produk di hapus maka semua data size di hapus
	public function delete_size_all($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('size');
	}
	//jika produk di hapus maka produk di diskon pun terhapus
	public function delete_diskon_all($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('diskon');
	}
}
