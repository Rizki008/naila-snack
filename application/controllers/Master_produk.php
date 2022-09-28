<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_master_produk');
		$this->load->model('m_transaksi');
	}

	public function kategori()
	{
		$data = array(
			'title' => 'Data Kategori',
			'kategori' => $this->m_master_produk->kategori(),
			'isi' => 'backend/kategori/v_kategori'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function add_kategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'Kategori Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/kategori';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Kategori',
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/kategori/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/kategori' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_kategori' => $this->input->post('nama_kategori'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_master_produk->add_kategori($data);
				$this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambah');
				redirect('master_produk/kategori');
			}
		}
		$data = array(
			'title' => 'Tambah Kategori',
			'isi' => 'backend/kategori/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function edit_kategori($id_kategori = null)
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi'));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/kategori';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Kategori',
					'kategori' => $this->m_master_produk->detail_kategori($id_kategori),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/kategori/v_edit'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar dari folder
				$kategori = $this->m_master_produk->detail_kategori($id_kategori);
				if ($kategori->gambar !== "") {
					unlink('./assets/kategori/' . $kategori->gambar);
				}
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/kategori/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_kategori' => $id_kategori,
					'nama_kategori' => $this->input->post('nama_kategori'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_master_produk->edit_kategori($data);
				$this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambah');
				redirect('master_produk/kategori');
			}
			$data = array(
				'id_kategori' => $id_kategori,
				'nama_kategori' => $this->input->post('nama_kategori'),
			);
			$this->m_master_produk->edit_kategori($data);
			$this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambah');
			redirect('master_produk/kategori');
		}
		$data = array(
			'title' => 'Edit Kategori',
			'kategori' => $this->m_master_produk->detail_kategori($id_kategori),
			'isi' => 'backend/kategori/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function delete_kategori($id_kategori = null)
	{
		//hapus dari folder
		$kategori = $this->m_master_produk->detail_kategori($id_kategori);
		if ($kategori->gambar !== "") {
			unlink('./assets/kategori/' . $kategori->gambar);
		}
		$data = array(
			'id_kategori' => $id_kategori,
		);
		$this->m_master_produk->hapus_kategori($data);
		$this->session->set_flashdata('pesan', 'Kategori Berhasil Dihapus');
		redirect('master_produk/kategori');
	}

	//produk
	public function produk()
	{
		$data = array(
			'title' => 'Data Produk',
			'produk' => $this->m_master_produk->produk(),
			'isi' => 'backend/produk/v_produk'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function add_produk()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('stock', 'stock Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/produk';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "images";

			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Produk',
					'kategori' => $this->m_master_produk->kategori(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/produk/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/produk/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_produk' => $this->input->post('nama_produk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'stock' => $this->input->post('stock'),
					'harga' => $this->input->post('harga'),
					'satuan' => $this->input->post('satuan'),
					'deskripsi' => $this->input->post('deskripsi'),
					'images' => $upload_data['uploads']['file_name'],
				);
				$this->m_master_produk->add_produk($data);

				//menambahkan data ke tabel diskon otomatis
				$id = $this->m_master_produk->id_produk();
				$id_produk = $id->id;
				for ($i = 1; $i <= 3; $i++) {
					$diskon = array(
						'id_produk' => $id_produk,
						'nama_diskon' => '0',
						'diskon' => '0',
						'member' => $i
					);
					$this->m_master_produk->add_diskon($diskon);
				}

				$this->session->set_flashdata('pesan', 'Produk Berhasil Ditambahkan');
				redirect('master_produk/produk');
			}
		}
		$data = array(
			'title' => 'Tambah Produk',
			'kategori' => $this->m_master_produk->kategori(),
			'isi' => 'backend/produk/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function edit_produk($id_produk = null)
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('stock', 'stock Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/produk';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "images";

			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Produk',
					'kategori' => $this->m_master_produk->kategori(),
					'produk' => $this->m_master_produk->detail_produk($id_produk),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/produk/v_edit'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				//hapus dari folder
				$produk = $this->m_master_produk->detail_produk($id_produk);
				if ($produk->images !== "") {
					unlink('./assets/produk/' . $produk->images);
				}
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/produk/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_produk' => $id_produk,
					'nama_produk' => $this->input->post('nama_produk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'stock' => $this->input->post('stock'),
					'harga' => $this->input->post('harga'),
					'satuan' => $this->input->post('satuan'),
					'deskripsi' => $this->input->post('deskripsi'),
					'images' => $upload_data['uploads']['file_name'],
				);
				$this->m_master_produk->edit_produk($data);
				$this->session->set_flashdata('pesan', 'Produk Berhasil Update');
				redirect('master_produk/produk');
			}
			$data = array(
				'id_produk' => $id_produk,
				'nama_produk' => $this->input->post('nama_produk'),
				'id_kategori' => $this->input->post('id_kategori'),
				'stock' => $this->input->post('stock'),
				'harga' => $this->input->post('harga'),
				'satuan' => $this->input->post('satuan'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_master_produk->edit_produk($data);
			$this->session->set_flashdata('pesan', 'Produk Berhasil Update');
			redirect('master_produk/produk');
		}
		$data = array(
			'title' => 'Edit Produk',
			'kategori' => $this->m_master_produk->kategori(),
			'produk' => $this->m_master_produk->detail_produk($id_produk),
			'isi' => 'backend/produk/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function delete_produk($id_produk = null)
	{
		$produk = $this->m_master_produk->detail_produk($id_produk);
		if ($produk->images !== "") {
			unlink('./assets/produk/' . $produk->images);
		}
		$data = array(
			'id_produk' => $id_produk,
		);
		$this->m_master_produk->delete_produk($data);
		$this->m_master_produk->delete_size_all($data);
		$this->m_master_produk->delete_diskon_all($data);
		$this->session->set_flashdata('pesan', 'Produk Berhasil Dihapus');
		redirect('master_produk/produk');
	}


	//gambar produk
	public function gambar()
	{
		$data = array(
			'title' => 'Gambar Produk',
			'gambar' => $this->m_master_produk->gambar(),
			'isi' => 'backend/gambar/v_gambar'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function add_gambar($id_produk)
	{
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "img";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Gambar Produk',
					'error_upload' => $this->upload->display_errors(),
					'produk' => $this->m_master_produk->detail_produk($id_produk),
					'gambar' => $this->m_master_produk->detail_gambar($id_produk),
					'isi' => 'backend/gambar/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {

				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_produk' => $id_produk,
					'keterangan' => $this->input->post('keterangan'),
					'img' => $upload_data['uploads']['file_name'],
				);
				$this->m_master_produk->add_gambar($data);
				$this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan');
				redirect('master_produk/add_gambar/' . $id_produk);
			}
		}
		$data = array(
			'title' => 'Gambar Produk',
			'produk' => $this->m_master_produk->detail_produk($id_produk),
			'gambar' => $this->m_master_produk->detail_gambar($id_produk),
			'isi' => 'backend/gambar/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function delete_gambar($id_produk, $id_gambar)
	{
		$gambar = $this->m_master_produk->detail($id_gambar);
		if ($gambar->img !== "") {
			unlink('./assets/gambar/' . $gambar->img);
		}

		$data = array(
			'id_gambar' => $id_gambar,
		);
		$this->m_master_produk->delete_gambar($data);
		$this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus');
		redirect('master_produk/add_gambar/' . $id_produk);
	}

	//diskon
	public function diskon()
	{
		$data = array(
			'title' => 'Data Diskon',
			'diskon' => $this->m_master_produk->diskon(),
			'isi' => 'backend/diskon/v_diskon'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function createDiskon()
	{
		$this->form_validation->set_rules('produk', 'Produk', 'required');
		// $this->form_validation->set_rules('harga', 'Harga Sebelumnya', 'required');
		$this->form_validation->set_rules('nama_diskon', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('diskon', 'Besar Diskon', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('level', 'Level Member', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Create Diskon',
				'produk' => $this->m_master_produk->produk_diskon(),
				'isi' => 'backend/diskon/v_creact_diskon'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$id_produk = $this->input->post('produk');
			$level = $this->input->post('level');
			$data = array(
				'nama_diskon' => $this->input->post('nama_diskon'),
				'tgl_selesai' => $this->input->post('tgl'),
				'diskon' => $this->input->post('diskon')
			);
			$this->m_master_produk->diskon_add($id_produk, $level, $data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
			redirect('master_produk/diskon');
		}
	}
	public function update($id = null)
	{
		$this->form_validation->set_rules('produk', 'Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Sebelumnya', 'required');
		$this->form_validation->set_rules('nama_diskon', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('diskon', 'Besar Diskon', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('level', 'Level Member', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Create Diskon',
				'produk' => $this->m_master_produk->produk_diskon(),
				'diskon' => $this->m_master_produk->edit_diskon($id),
				'isi' => 'backend/diskon/v_edit'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$id_produk = $this->input->post('produk');
			$level = $this->input->post('level');
			$data = array(
				'nama_diskon' => $this->input->post('nama_diskon'),
				'tgl_selesai' => $this->input->post('tgl'),
				'diskon' => $this->input->post('diskon')
			);
			$this->m_master_produk->diskon_add($id_produk, $level, $data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
			redirect('master_produk/diskon');
		}
	}
	public function delete($id)
	{
		$data = array(
			'nama_diskon' => '0',
			'tgl_selesai' => '0',
			'diskon' => '0'
		);
		$this->m_master_produk->delete_diskon($id, $data);
		$this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus!');
		redirect('master_produk/diskon');
	}

	//size produk
	public function size_produk($id)
	{
		$this->form_validation->set_rules('size', 'Size', 'required');
		$this->form_validation->set_rules('stock', 'Stock', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Ukuran Produk',
				'size' => $this->m_master_produk->size($id),
				'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
				'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
				'isi' => 'backend/size/v_size'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_produk' => $id,
				'size' => $this->input->post('size'),
				'stock' => $this->input->post('stock'),
				'harga' => $this->input->post('harga'),
			);
			$this->m_master_produk->add_size($data);
			$this->session->set_flashdata('pesan', 'Data Size Berhasil Disimpan');
			redirect('master_produk/size_produk/' . $id);
		}
	}
	public function edit_size($id, $id_produk)
	{
		$this->form_validation->set_rules('size', 'Size', 'required');
		$this->form_validation->set_rules('stock', 'Stock', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Update Size Produk',
				'size' => $this->m_master_produk->size_detail($id),
				'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
				'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
				'isi' => 'backend/size/v_edit'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'size' => $this->input->post('size'),
				'stock' => $this->input->post('stock'),
				'harga' => $this->input->post('harga'),
			);
			$this->m_master_produk->update_size($id, $data);
			$this->session->set_flashdata('pesan', 'Data Size Berhasil Diperbarui');
			redirect('master_produk/size_produk/' . $id_produk);
		}
	}
	public function delete_size($id, $id_produk)
	{
		$this->m_master_produk->delete_size($id);
		$this->session->set_flashdata('pesan', 'Data Ukuran Berhasil Dihapus');

		redirect('master_produk/size_produk/' . $id_produk);
	}
}
