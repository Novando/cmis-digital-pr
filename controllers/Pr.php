<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pr extends MX_Controller
{
	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_login') ) {
			redirect('login');
			exit;
		}

		$this->load->model('pr/pr_model');
	}


	// * Create Comment 12 Juni 2018
	// * Fungsi ini untuk menampilkan view
	public function index() {
		echo $this->load->view('pr');
	}

	public function Procurement(){
		echo $this->load->view('approvepr_proc');
	}
	
	public function Expert()
	{
		echo $this->load->view('expert');
	}
	
	public function newpr()
	{
		echo $this->load->view('F_addnewpr');
	}
	
	public function supervisor_approval()
	{
		echo $this->load->view('supervisor_approval');
	}
	
	public function request_expert()
	{
		echo $this->load->view('request_expert');
	}
	
	public function procurement_approval()
	{
		echo $this->load->view('procurement_approval');
	}
	
	public function expert_approval()
	{
		echo $this->load->view('expert_approval');
	}
}