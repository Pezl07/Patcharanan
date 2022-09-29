<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//chk admin status
		if($this->session->userdata('admin_status') !=1){
				redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
	}

	public function index()
	{

// echo '<pre> *แนวทางการต่อยอด
//  _แยกสถานะเป็นอีกตาราง
//  _แยกประเภทการแจ้งออกเป็นอีกตาราง
//  _reponsive backend
//  _ส่วนไหนงงๆ ให้เปลี่ยนเป็นแบบของตัวเอง เช่น UI ชื่อตัวแปร ชื่อฟังก์ชั่น เป็นตัน
//  _สอบถามความต้องการของหน่วยงานเพิ่มเติม เพื่อให้ระบบครอบคลุมการทำงานมากที่สุด
//  _ฯลฯ 
// </pre>';

		$data['query']=$this->data_model->all();
		$data['qstatus1']=$this->data_model->status1();
		$data['qstatus2']=$this->data_model->status2();
		$data['qstatus3']=$this->data_model->status3();
		$data['qstatus4']=$this->data_model->status4();

		//print_r($data);
		//exit;
		$this->load->view('template/header');
		$this->load->view('backend/jobs_list',$data);
		$this->load->view('template/footer');


	}
	
	public function getupdate($id)
	{
		$data['query']=$this->data_model->get_detail($id);
		$data['img_detail']=$this->data_model->get_detail_img($id, 0);
		$data['img_detail_emp']=$this->data_model->get_detail_img($id, 1);
		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();

		$this->load->view('template/header');
		$this->load->view('backend/jobs_form_update',$data);
		$this->load->view('template/footer');
	}



	public function updatedata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('id', 'id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('tech_id', 'tech_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('case_status', 'case_status', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('case_update_log', 'บันทึกการอัพเดทงานซ่อม', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('tech_name', 'tech_name', 'trim|required|min_length[1]',
                array('required' => 'ชื่อช่างห้ามว่าง %s.', 'min_length' => 'ชื่อช่างห้ามว่าง'));

		if ($this->form_validation->run() == FALSE)
                {
                	$id = $this->input->post('id');
			       	$data['query']=$this->data_model->get_detail($id);
					$this->load->view('template/header');
					$this->load->view('backend/jobs_form_update',$data);
					$this->load->view('template/footer');
                }else{
					$id = $this->input->post('id');
					$this->data_model->update_job();
					$img = $this->input->post('img_upload_new');
					if (isset($img))
					{
						foreach ($img as $value) {
							$this->data_model->insert_img_case($id, $value, 1);
						}
					}
					$this->session->set_flashdata('save_success', TRUE);
					redirect('jobs','refresh');
                } //form vali
	}


	public function bystatus($status_id)
	{
		$data['query']=$this->data_model->by_status($status_id);
		$data['qstatus1']=$this->data_model->status1();
		$data['qstatus2']=$this->data_model->status2();
		$data['qstatus3']=$this->data_model->status3();
		$data['qstatus4']=$this->data_model->status4();

		//print_r($data);
		//exit;
		$this->load->view('template/header');
		$this->load->view('backend/jobs_list',$data);
		$this->load->view('template/footer');
	}


	

	public function bycasetype()
	{

		//ประกาศตัวแปรรับค่า get
		$case_type = $this->input->get('case_type');

		//echo $case_type;


		$data['query']=$this->data_model->by_case_type($case_type);


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/header');
		$this->load->view('backend/case_type_list',$data);
		$this->load->view('template/footer');
	}



}
