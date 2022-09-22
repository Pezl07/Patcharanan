<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//chk admin status
		if($this->session->userdata('admin_status') !=1){
				redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
	}

	public function index($year = 0, $month = 0)
	{
		if($month == 0)
			$month = date("m");
		
		if($year == 0)
			$year = date("Y");

		$data['queryreport']=$this->data_model->countbycasetype($month, $year);
		$data['querystatus']=$this->data_model->countbycasestatus($month, $year);
		$data['month'] = $month;
		$data['year'] = $year;

		$this->load->view('template/header');
		$this->load->view('backend/report_view',$data);
		$this->load->view('template/footer');
	}

}
