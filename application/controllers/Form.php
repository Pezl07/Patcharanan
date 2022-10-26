<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
	}

	public function index()
	{
		$data['road'] = $this->data_model->get_road();
		$data['cmu'] = $this->data_model->get_cmu();
		$data["error"] = "";
		$this->load->view('home/header');
		$this->load->view('home/form_view' , $data);
		$this->load->view('home/footer');
	}

	public function adding()
	{

		$this->form_validation->set_rules('case_type', 'ประเภทปัญหา', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('road_name', 'ถนน', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('cmu_name', 'ชุมชน', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('case_detail', 'รายละเอียดปัญหา', 'trim|required|min_length[5]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว'));
		$this->form_validation->set_rules('case_loc', 'สถานที่', 'trim|required|min_length[5]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว'));
		$this->form_validation->set_rules('p_name', 'ชื่อผู้แจ้ง', 'trim|required|min_length[3]',
				array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));
		$this->form_validation->set_rules('p_lastname', 'นามสกุลผู้แจ้ง', 'trim|required|min_length[3]',
				array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));
		$this->form_validation->set_rules('p_phone', 'เบอร์โทร', 'trim|required|max_length[12]',
				array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลตามรูปแบบที่กำหนด'));

		// $this->form_validation->set_rules('p_phone', 'อีเมล', 'trim|required|valid_email',
        //         array('required' => 'กรุณากรอกข้อมูล %s.', 'valid_email' => 'รูปแบบอีเมลไม่ถูกต้อง'));

		$data['road'] = $this->data_model->get_road();
		$data['cmu'] = $this->data_model->get_cmu();
		               if ($this->form_validation->run() == FALSE)
		                {
								$data["error"] = "";
						      	$this->load->view('home/header');
								$this->load->view('home/form_view' , $data);
								$this->load->view('home/footer');
		                }else{
		                		//img
							 		// $config['upload_path']= 'asset/uploads/';
					                // $config['allowed_types']= 'gif|jpg|png';
					                // $config['encrypt_name']= TRUE;
									$img = $this->input->post('img_upload_new');
					                //  $this->load->library('upload', $config);
					                if (!isset($img))
					                {
											$data["error"] = "You did not select a file to upload.";
					                        $this->load->view('home/header');
											$this->load->view('home/form_view' , $data);
											$this->load->view('home/footer');
					                }else{
					                	$this->data_model->insert_case();
					                	//last id by user case
					                	$data['qlastid']=$this->data_model->lastid($_POST['p_phone']);
					                	//echo $_POST['p_phone'];
					                	//print_r($data);
					                	//echo $data['qlastid']->id;
					                	
										foreach ($img as $value) {
											$this->data_model->insert_img_case($data['qlastid']->id, $value, 0);
										}

										$this->notifyLine($data['qlastid']->id);

					                	redirect('form/detail/'.$data['qlastid']->id,'refresh');
					                }

			                	
		                }  //}else{
		     	
		}

		public function testUpload(){
			$config['upload_path']= 'img/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['encrypt_name']= TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')){
				echo 0;
			}else{
				echo $this->upload->file_name;
			}
		}

		public function detail($id)
		{
			$data['rs_detail']=$this->data_model->get_detail($id);
			$data['img_detail']=$this->data_model->get_detail_img($id, 0);
			$data['img_detail_emp']=$this->data_model->get_detail_img($id, 1);
			//print_r($data);
			$this->load->view('home/header');
			$this->load->view('home/form_detail' ,$data);
			$this->load->view('home/footer');
		}

	public function allcase($status = 0)
	{
		$data['query']=$this->data_model->all($status);
		$data['case_status'] = $status;
		$this->load->view('home/header');
		$this->load->view('home/list_case_view' ,$data);
		$this->load->view('home/footer');
	}

	public function notifyLine($id){

		$data['rs_detail']=$this->data_model->get_detail($id);

		$sToken = "zlFRuNAm4sz7Kum7bdmnTN1YL5AhiOuKsHrunTPgZyv";
		$sMessage = "\nประเภทปัญหา : ". $data['rs_detail']->case_type ."\n";
		$sMessage .= "ชื่อผู้แจ้ง : ". $data['rs_detail']->p_name ."\n";
		$sMessage .= "เบอร์ติดต่อ : ". $data['rs_detail']->p_phone ."\n";
		$sMessage .= "link : ". base_url() . "form/detail/". $id;
		
		$chOne = curl_init(); 
		curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt( $chOne, CURLOPT_POST, 1); 
		curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
		$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
		curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec( $chOne ); 

		//Result error 
		if(curl_error($chOne)) 
		{ 
			echo 'error:' . curl_error($chOne); 
		} 
		else { 
			$result_ = json_decode($result, true); 
			echo "status : ".$result_['status']; echo "message : ". $result_['message'];
		} 
		curl_close( $chOne );   
	}

	/*log  0.7
			-เพิ่มเมนูลิงค์ไปติดตามในโฟลเดอร์ home
			-ตัด <script src="<?php echo base_url(); ?>asset/bt4/js/jquery-3.3.1.slim.min.js"></script> ออกจาก home/footer
-เพิ่ม <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script> ใน
home/header
-เพิ่ม home/list_case_view.php
- datatable sorting column 0
- list call link show detail
*/


}