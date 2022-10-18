<?php


defined('BASEPATH')or exit('No direct script access allowed');

class history extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        // $this->load->model('m_transaksi');
    }
    

    public function index()
    {
        $data = array(
			'title' => 'Data History Pelanggan',
			'history' => $this->m_admin->history(),
			'isi' => 'backend/history/v_history'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function history_detail($id_pelanggan)
    {
        $data = array(
			'title' => 'Detail Data History Pelanggan',
			'history_detail' => $this->m_admin->history_detail($id_pelanggan),
			'history_belanja' => $this->m_admin->history_belanja($id_pelanggan),
			'isi' => 'backend/history/v_detail'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
    }
}