<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Workwithus extends Main {	
	private 	$view_path		=	"fontend/";
	private 	$page_title		=	"Supreme-HITERA CO.,LTD. Smart Connected Healthcare Solution";
	private 	$main_page		=	"fontend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->_setMainPage($this->main_page);
	}

	public function index()
	{
		$this->load->helper('url');

		$this->load->database();
		$this->load->model('md_career');

		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."workwithus/possibilities.php";
		$page_data["page_title"]	=	$this->page_title;

		$page_data["title_th"] = "รายชื่อตำแหน่งงานที่เปิดรับสมัคร";
		$where = "job_status = 1";
		$order_by = array("job_name" => "asc");

		$page_data["jobs"] = $this->md_career->selectData($where,null,null,$order_by,null);
		//echo $this->db->last_query();
		
		$this->_setPageData($page_data);
		$this->_show_page();

		//$this->send_email("ทดสอบ", "sssกกก");
		
		unset($page_data);
		
	}

	public function how_to_apply(){

		$this->load->database();
		$this->load->model('md_career');

		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."workwithus/how_to_apply.php";
		$page_data["page_title"]	=	$this->page_title;

		$page_data["title_th"] = "วิธีการสมัครงาน";
		
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}

	public function preview_test(){
		//echo "test";
		//print_r($this->input->post());


		if($this->input->post('ck_addr_mom') == '1'){
			$addr_mom = $this->input->post('address_fa');
		}else{
			$addr_mom = $this->input->post('address_mom');
		}


		$cur_addr = "";
		if($this->input->post('home_no') != ""){
			$cur_addr .= $this->input->post('home_no')." ";
		}
		if($this->input->post('moo') != ""){
			$cur_addr .= "หมู่ ".$this->input->post('moo')." ";
		}
		if($this->input->post('buliding') != ""){
			$cur_addr .= "อาคาร ".$this->input->post('buliding')." ";
		}
		if($this->input->post('soi') != ""){
			$cur_addr .= "ซอย ".$this->input->post('soi')." ";
		}
		if($this->input->post('muban') != ""){
			$cur_addr .= "หมู่บ้าน ".$this->input->post('muban')." ";
		}
		if($this->input->post('street') != ""){
			$cur_addr .= "ถนน ".$this->input->post('street')." ";
		}
		if($this->input->post('tambon') != ""){
			$cur_addr .= "แขวง/ตำบล ".$this->input->post('tambon')." ";
		}
		if($this->input->post('city') != ""){
			$cur_addr .= "เขต/อำเภอ ".$this->input->post('city')." ";
		}


		$home_addr = "";
		$home_province = "";
		$home_postal_code = "";
		if($this->input->post('ck_address') == "1"){
			$home_addr = $cur_addr;
			$home_province = $this->input->post('province');
			$home_postal_code = $this->input->post('province_code');
		}else{
			

			if($this->input->post('home_no2') != ""){
				$home_addr .= $this->input->post('home_no2')." ";
			}
			if($this->input->post('moo2') != ""){
				$home_addr .= "หมู่ ".$this->input->post('moo2')." ";
			}
			if($this->input->post('buliding2') != ""){
				$home_addr .= "อาคาร ".$this->input->post('buliding2')." ";
			}
			if($this->input->post('soi2') != ""){
				$home_addr .= "ซอย ".$this->input->post('soi2')." ";
			}
			if($this->input->post('muban2') != ""){
				$home_addr .= "หมู่บ้าน ".$this->input->post('muban2')." ";
			}
			if($this->input->post('street2') != ""){
				$home_addr .= "ถนน ".$this->input->post('street2')." ";
			}
			if($this->input->post('tambon2') != ""){
				$home_addr .= "แขวง/ตำบล ".$this->input->post('tambon2')." ";
			}
			if($this->input->post('city2') != ""){
				$home_addr .= "เขต/อำเภอ ".$this->input->post('city2')." ";
			}

			$home_province = $this->input->post('province2');
			$home_postal_code = $this->input->post('province_code2');
		}
		
		
		$page_data["data"] = array(
			'position1'		=> ''.$this->input->post('position1'),
			'position2'		=> ''.$this->input->post('position2'),
			'salary'		=> $this->input->post('salary'),
			'pic_path'		=> '',
			'can_onsite'	=> $this->input->post('can_onsite'),
			'can_onsite_reason'	=>	''.$this->input->post('can_onsite_reason'),
			'is_ready'		=> $this->input->post('is_ready'),
			'is_ready_day'	=> $this->input->post('is_ready_day'),
			'can_pro'		=> $this->input->post('can_pro'),
			'name_th'	=>	$this->input->post('name_th'),
			'surname_th'	=>	$this->input->post('surname_th'),
			'name_en'	=>	$this->input->post('name_en'),
			'surname_en'	=>	$this->input->post('surname_en'),
			'gender'	=>	$this->input->post('gender'),
			'birth_date'	=>	$this->input->post('birth_date'),
			'age'	=>	$this->input->post('age'),
			'scar'	=>	$this->input->post('scar'),
			'height'	=>	$this->input->post('height'),
			'weight'	=>	$this->input->post('weight'),
			'born_city'	=>	$this->input->post('born_city'),
			'born_province'	=>	$this->input->post('born_province'),
			'nationality'	=>	$this->input->post('nationality'),
			'race'	=>	$this->input->post('race'),
			'religion'	=>	$this->input->post('religion'),
			'citizen_id'	=>	$this->input->post('citizen_id'),
			'citizen_card_place'	=>	$this->input->post('citizen_card_place'),
			'citizen_card_taken'	=>	$this->input->post('citizen_card_taken'),
			'citizen_card_expire'	=>	$this->input->post('citizen_card_expire'),
			'tax_id'	=>	$this->input->post('tax_id'),
			'marital_status'	=>	$this->input->post('marital_status'),
			'mar_name'	=>	$this->input->post('mar_name'),
			'mar_surname'	=>	$this->input->post('mar_surname'),
			'mar_nationality'	=>	$this->input->post('mar_nationality'),
			'mar_race'	=>	$this->input->post('mar_race'),
			'mar_occupation'	=>	$this->input->post('mar_occupation'),
			'mar_position'	=>	$this->input->post('mar_position'),
			'mar_company'	=>	$this->input->post('mar_company'),
			'mar_child'	=>	$this->input->post('mar_child'),
			'mar_son'	=>	$this->input->post('mar_son'),
			'mar_daughter'	=>	$this->input->post('mar_daughter'),

			'name_fa'	=>	$this->input->post('name_fa'),
			'surname_fa'	=>	$this->input->post('surname_fa'),
			'nation_fa'	=>	$this->input->post('nation_fa'),
			'race_fa'	=>	$this->input->post('race_fa'),
			'occupation_fa'	=>	$this->input->post('occupation_fa'),
			'company_fa'	=>	$this->input->post('company_fa'),
			'address_fa'	=>	$this->input->post('address_fa'),
			'name_mom'	=>	$this->input->post('name_mom'),
			'surname_mom'	=>	$this->input->post('surname_mom'),
			'nation_mom'	=>	$this->input->post('nation_mom'),
			'race_mom'	=>	$this->input->post('race_mom'),
			'occupation_mom'	=>	$this->input->post('occupation_mom'),
			'company_mom'	=>	$this->input->post('company_mom'),
			'address_mom'	=>	$addr_mom,
			'brother_num'	=>	$this->input->post('brother_num'),
			'you_num'	=>	$this->input->post('you_num'),

			'b1'	=>	$this->input->post('b1'),
			'name_b1'	=>	$this->input->post('name_b1'),
			'occup_b1'	=>	$this->input->post('occup_b1'),
			'comp_b1'	=>	$this->input->post('comp_b1'),
			
			'b2'	=>	$this->input->post('b2'),
			'name_b2'	=>	$this->input->post('name_b2'),
			'occup_b2'	=>	$this->input->post('occup_b2'),
			'comp_b2'	=>	$this->input->post('comp_b2'),

			'b3'	=>	$this->input->post('b3'),
			'name_b3'	=>	$this->input->post('name_b3'),
			'occup_b3'	=>	$this->input->post('occup_b3'),
			'comp_b3'	=>	$this->input->post('comp_b3'),

			'b4'	=>	$this->input->post('b4'),
			'name_b4'	=>	$this->input->post('name_b4'),
			'occup_b4'	=>	$this->input->post('occup_b4'),
			'comp_b4'	=>	$this->input->post('comp_b4'),

			'cur_address'	=>	$cur_addr,
			'cur_province'	=>	$this->input->post('province'),
			'cur_postal_code'	=>	$this->input->post('province_code'),
			'cur_e_mail'	=>	$this->input->post('cur_e_mail'),
			'cur_tel'	=>	$this->input->post('cur_tel'),
			'cur_mobile'	=>	$this->input->post('cur_mobile'),
			'home_address'	=>	$home_addr,
			'home_province' =>  $home_province,
			'home_postal_code'	=>	$home_postal_code,

			'name_edu1'	=>	$this->input->post('name_edu1'),
			'type_edu1'	=>	$this->input->post('type_edu1'),
			'fac_edu1'	=>	$this->input->post('fac_edu1'),
			'major_edu1'	=>	$this->input->post('major_edu1'),
			'start_edu1'	=>	$this->input->post('start_edu1'),
			'stop_edu1'	=>	$this->input->post('stop_edu1'),
			'grade_edu1'	=>	$this->input->post('grade_edu1'),

			'name_edu2'	=>	$this->input->post('name_edu2'),
			'type_edu2'	=>	$this->input->post('type_edu2'),
			'fac_edu2'	=>	$this->input->post('fac_edu2'),
			'major_edu2'	=>	$this->input->post('major_edu2'),
			'start_edu2'	=>	$this->input->post('start_edu2'),
			'stop_edu2'	=>	$this->input->post('stop_edu2'),
			'grade_edu2'	=>	$this->input->post('grade_edu2'),

			'name_edu3'	=>	$this->input->post('name_edu3'),
			'type_edu3'	=>	$this->input->post('type_edu3'),
			'fac_edu3'	=>	$this->input->post('fac_edu3'),
			'major_edu3'	=>	$this->input->post('major_edu3'),
			'start_edu3'	=>	$this->input->post('start_edu3'),
			'stop_edu3'	=>	$this->input->post('stop_edu3'),
			'grade_edu3'	=>	$this->input->post('grade_edu3'),

			'name_edu4'	=>	$this->input->post('name_edu4'),
			'type_edu4'	=>	$this->input->post('type_edu4'),
			'fac_edu4'	=>	$this->input->post('fac_edu4'),
			'major_edu4'	=>	$this->input->post('major_edu4'),
			'start_edu4'	=>	$this->input->post('start_edu4'),
			'stop_edu4'	=>	$this->input->post('stop_edu4'),
			'grade_edu4'	=>	$this->input->post('grade_edu4'),

			'name_edu5'	=>	$this->input->post('name_edu5'),
			'type_edu5'	=>	$this->input->post('type_edu5'),
			'fac_edu5'	=>	$this->input->post('fac_edu5'),
			'major_edu5'	=>	$this->input->post('major_edu5'),
			'start_edu5'	=>	$this->input->post('start_edu5'),
			'stop_edu5'	=>	$this->input->post('stop_edu5'),
			'grade_edu5'	=>	$this->input->post('grade_edu5'),

			'train1'	=>	$this->input->post('train1'),
			'place1'	=>	$this->input->post('place1'),
			'train_from1'	=>	$this->input->post('train_from1'),
			'train_to1'	=>	$this->input->post('train_to1'),
			'train2'	=>	$this->input->post('train2'),
			'place2'	=>	$this->input->post('place2'),
			'train_from2'	=>	$this->input->post('train_from2'),
			'train_to2'	=>	$this->input->post('train_to2'),
			'train3'	=>	$this->input->post('train3'),
			'place3'	=>	$this->input->post('place3'),
			'train_from3'	=>	$this->input->post('train_from3'),
			'train_to3'	=>	$this->input->post('train_to3'),
			'performance'	=>	$this->input->post('performance'),

			'name_refer1'	=>	$this->input->post('name_refer1'),
			'company_refer1'	=>	$this->input->post('company_refer1'),
			'position_refer1'	=>	$this->input->post('position_refer1'),
			'tel_refer1'	=>	$this->input->post('tel_refer1'),
			'name_refer2'	=>	$this->input->post('name_refer2'),
			'company_refer2'	=>	$this->input->post('company_refer2'),
			'position_refer2'	=>	$this->input->post('position_refer2'),
			'tel_refer2'	=>	$this->input->post('tel_refer2'),
			'name_refer3'	=>	$this->input->post('name_refer3'),
			'company_refer3'	=>	$this->input->post('company_refer3'),
			'position_refer3'	=>	$this->input->post('position_refer3'),
			'tel_refer3'	=>	$this->input->post('tel_refer3'),

			'language1'	=>	$this->input->post('language1'),
			'level_speak1'	=>	$this->input->post('level_speak1'),
			'level_write1'	=>	$this->input->post('level_write1'),
			'level_listen1'	=>	$this->input->post('level_listen1'),
			'language2'	=>	$this->input->post('language2'),
			'level_speak2'	=>	$this->input->post('level_speak2'),
			'level_write2'	=>	$this->input->post('level_write2'),
			'level_listen2'	=>	$this->input->post('level_listen2'),
			'computer1'	=>	$this->input->post('computer1'),
			'level_use1'	=>	$this->input->post('level_use1'),
			'computer2'	=>	$this->input->post('computer2'),
			'level_use2'	=>	$this->input->post('level_use2'),
			'computer3'	=>	$this->input->post('computer3'),
			'level_use3'	=>	$this->input->post('level_use3'),
			'computer4'	=>	$this->input->post('computer4'),
			'level_use4'	=>	$this->input->post('level_use4'),
			'computer5'	=>	$this->input->post('computer5'),
			'level_use5'	=>	$this->input->post('level_use5'),
			'computer6'	=>	$this->input->post('computer6'),
			'level_use6'	=>	$this->input->post('level_use6'),
			'type_th'	=>	$this->input->post('type_th'),
			'type_en'	=>	$this->input->post('type_en'),
			'ck_drive'	=>	$this->input->post('ck_drive'),
			'ck_cardrive'	=>	$this->input->post('ck_cardrive'),
			'ck_home'	=>	$this->input->post('ck_home'),
			'ck_home_detail'	=>	$this->input->post('ck_home_detail'),
			'ck_car'	=>	$this->input->post('ck_car'),
			'ck_cartype1'	=>	$this->input->post('ck_cartype1'),
			'ck_cartype2'	=>	$this->input->post('ck_cartype2'),
			'ck_car_status'	=>	$this->input->post('ck_car_status'),


			'hobby'	=>	$this->input->post('hobby'),
			'ck_sick'	=>	$this->input->post('ck_sick'),
			'sick_detail'	=>	$this->input->post('sick_detail'),
			'ck_health'	=>	$this->input->post('ck_health'),
			'health_detail'	=>	$this->input->post('health_detail'),
			'ck_accuse'	=>	$this->input->post('ck_accuse'),

			'think_in_work'	=>	$this->input->post('think_in_work'),
			'plan_in_future'	=>	$this->input->post('plan_in_future'),
			'success_in_work'	=>	$this->input->post('success_in_work'),

			'know_news'	=>	$this->input->post('know_news'),
			'know_news_detail'	=>	$this->input->post('know_news_detail'),
			'know_employee'	=>	$this->input->post('know_employee'),
			'know_employee_detail'	=>	$this->input->post('know_employee_detail'),
			'know_internet'	=>	$this->input->post('know_internet'),
			'know_internet_detail'	=>	$this->input->post('know_internet_detail'),
			'know_market'	=>	$this->input->post('know_market'),
			'know_market_detail'	=>	$this->input->post('know_market_detail'),
			'know_school'	=>	$this->input->post('know_school'),
			'know_school_detail'	=>	$this->input->post('know_school_detail'),
			'know_etc'	=>	$this->input->post('know_etc'),
			'know_etc_detail'	=>	$this->input->post('know_etc_detail'),
			'know_website'	=>	$this->input->post('know_website'),
			'know_board'	=>	$this->input->post('know_board'),

			'other'	=>	$this->input->post('other')


		);


		if($this->input->post('company_name1') != ""){
			$page_data['work_data1'] = array(
				'company_name1' => $this->input->post('company_name1'),
				'comp_addr1' => $this->input->post('comp_addr1'),
				'comp_tel1' => $this->input->post('comp_tel1'),
				'date_in1' => $this->input->post('date_in1'),
				'posi_in1' => $this->input->post('posi_in1'),
				'date_out1' => $this->input->post('date_out1'),
				'posi_out1' => $this->input->post('posi_out1'),
				'responsibility1' => $this->input->post('responsibility1'),
				'salary_in1' => $this->input->post('salary_in1'),
				'salary_out1' => $this->input->post('salary_out1'),
				'manager1' => $this->input->post('manager1'),
				'remark1' => $this->input->post('remark1')
			);
		}
		
		if($this->input->post('company_name2') != ""){
			$page_data['work_data2'] = array(
				'company_name2' => $this->input->post('company_name2'),
				'comp_addr2' => $this->input->post('comp_addr2'),
				'comp_tel2' => $this->input->post('comp_tel2'),
				'date_in2' => $this->input->post('date_in2'),
				'posi_in2' => $this->input->post('posi_in2'),
				'date_out2' => $this->input->post('date_out2'),
				'posi_out2' => $this->input->post('posi_out2'),
				'responsibility2' => $this->input->post('responsibility2'),
				'salary_in2' => $this->input->post('salary_in2'),
				'salary_out2' => $this->input->post('salary_out2'),
				'manager2' => $this->input->post('manager2'),
				'remark2' => $this->input->post('remark2')
			);
		}

		if($this->input->post('company_name3') != ""){
			$page_data['work_data3'] = array(
				'company_name3' => $this->input->post('company_name3'),
				'comp_addr3' => $this->input->post('comp_addr3'),
				'comp_tel3' => $this->input->post('comp_tel3'),
				'date_in3' => $this->input->post('date_in3'),
				'posi_in3' => $this->input->post('posi_in3'),
				'date_out3' => $this->input->post('date_out3'),
				'posi_out3' => $this->input->post('posi_out3'),
				'responsibility3' => $this->input->post('responsibility3'),
				'salary_in3' => $this->input->post('salary_in3'),
				'salary_out3' => $this->input->post('salary_out3'),
				'manager3' => $this->input->post('manager3'),
				'remark3' => $this->input->post('remark3')
			);
		}

		$this->load->database();
		$this->load->model('md_application');
		$page_data['province_list'] = $this->md_application->selectProvinceData();

		$this->load->model('md_career');
		$page_data['career_list'] = $this->md_career->selectDataCareerName();

		$this->load->view($this->view_path."workwithus/application_preview_test.php", $page_data);

		unset($page_data);
	}


	public function apply(){
		$this->load->helper('url');

		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."workwithus/application_form_2.php";
		$page_data["page_title"]	=	$this->page_title;

		$page_data["base_url"] = base_url()."workwithus";
		$page_data["action"] = "apply_preview";

		$page_data["title_th"] = "กรอกใบสมัคร";

		$this->load->database();
		$this->load->model('md_application');
		$this->load->model('md_career');
		
		$page_data["province"] = $this->md_application->selectProvinceData();
		
		$where = "job_status = 1";
		$page_data["jobs"] = $this->md_career->selectData($where);

		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	
	}

	private function do_upload($upload_path,$file_name,$input_name,$resize=array(),$thumb=array(),$thumb2=array())
	{
		$this->load->library('image_lib');

		$target_path = $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/".$upload_path."/";

		//echo $target_path;

		if(!is_dir($target_path))
		{
			mkdir($target_path);
			chmod($target_path,0777);
		}
		$target_path = $target_path.$file_name; 

		//echo $target_path."<br>";
		
		move_uploaded_file($_FILES[$input_name]['tmp_name'], $target_path);
		chmod($target_path,0777);
		
		if(sizeof($thumb)>0)
		{
			$config['image_library'] 		= 'gd2';
			$config['source_image'] 		= $target_path;
			$config['new_image'] 		= $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/resume/".$thumb["save_path"]."/".$thumb["pic_name"];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 		= FALSE;
			$config['width'] 				= $thumb["width"];
			$config['height'] 				= $thumb["height"];

			$this->image_lib->initialize($config); 

			$this->image_lib->resize();
			if(file_exists($config['new_image']))
			{
				chmod($config['new_image'],0777);
			}
		}			
		if(sizeof($thumb2)>0)
		{
			$config['image_library'] 		= 'gd2';
			$config['source_image'] 		= $target_path;
			$config['new_image'] 		= $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/resume/".$thumb2["save_path"]."/".$thumb2["pic_name"];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 		= FALSE;
			$config['width'] 				= $thumb2["width"];
			$config['height'] 				= $thumb2["height"];

			$this->image_lib->initialize($config); 

			$this->image_lib->resize();
			
			if(file_exists($config['new_image']))
			{
				chmod($config['new_image'],0777);
			}
		}			
		if(sizeof($resize)>0)
		{
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $target_path;
			$config['new_image'] 		= $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/resume/".$resize["save_path"]."/".$resize["pic_name"];
			$config['maintain_ratio'] 	= FALSE;
			
			$config['width'] 				= $resize["width"];
			$config['height'] 			= $resize["height"];
			
			$this->image_lib->initialize($config); 

			if ( ! $this->image_lib->resize())
			{
    			echo $this->image_lib->display_errors();	
			}
			
			if(file_exists($config['new_image']))
			{
				chmod($config['new_image'],0777);
			}
			
		}	
		$this->image_lib->clear();
	}

	
	public function test_mail(){
		$this->send_email("Hello", "test");
	}
	

	private function send_email($subject, $msg)
	{
		/*
		$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.supremeproducts.co.th',
			  'smtp_port' => 465,
			  'smtp_user' => 'info@supremeproducts.co.th', // change it to yours
			  'smtp_pass' => 'Hitsd-1610', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'utf-8',
			  'wordwrap' => TRUE
		);	
		*/
		/*
		$this->load->library('email');
		//$this->load->library('email', $config);

		$this->email->from('info@supremeproducts.co.th', "Admin Team");
		$this->email->to("wathit.ch@gmail.com");
		$this->email->subject($subject);
		$this->email->message($msg);
			
		$err = "Sorry Unable to send email...";	
		if($this->email->send()){					
			$err = "Mail sent...";			
		}
		echo $this->email->print_debugger();
		return $err;
		*/
				$this->load->library('email');
		//$this->load->library('email', $config);

		$this->email->from('info@hitera.com', "Recuit System");
		$this->email->to("info@hitera.com");
		$this->email->subject($subject);
		$this->email->message($msg);
			
		$err = "Sorry Unable to send email...";	
		if($this->email->send()){					
			$err = "Mail sent...";			
		}
		//echo $this->email->print_debugger();
		return $err;
	}
	
	
	public function apply_confirm_backup()
	{
		//$this->load->helper('url');
		
		/*
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."workwithus/application_confirm.php";
		$page_data["page_title"]	=	$this->page_title;

		$page_data["title_th"] = "ยืนยันใบสมัคร";
		*/

		$status	=	1;
		$msg		=	"ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ";


		if($this->input->post('ck_addr_mom') == '1'){

			$addr_mom = $this->input->post('address_fa');
		}else{
			$addr_mom = $this->input->post('address_mom');
		}


		$cur_addr = "";
		if($this->input->post('home_no') != ""){
			$cur_addr .= $this->input->post('home_no')." ";
		}
		if($this->input->post('moo') != ""){
			$cur_addr .= "หมู่ ".$this->input->post('moo')." ";
		}
		if($this->input->post('buliding') != ""){
			$cur_addr .= "อาคาร ".$this->input->post('buliding')." ";
		}
		if($this->input->post('soi') != ""){
			$cur_addr .= "ซอย ".$this->input->post('soi')." ";
		}
		if($this->input->post('muban') != ""){
			$cur_addr .= "หมู่บ้าน ".$this->input->post('muban')." ";
		}
		if($this->input->post('street') != ""){
			$cur_addr .= "ถนน ".$this->input->post('street')." ";
		}
		if($this->input->post('tambon') != ""){
			$cur_addr .= "แขวง/ตำบล ".$this->input->post('tambon')." ";
		}
		if($this->input->post('city') != ""){
			$cur_addr .= "เขต/อำเภอ ".$this->input->post('city')." ";
		}


		$home_addr = "";
		$home_province = "";
		$home_postal_code = "";
		if($this->input->post('ck_address') == "1"){
			$home_addr = $cur_addr;
			$home_province = $this->input->post('province');
			$home_postal_code = $this->input->post('province_code');
		}else{
			

			if($this->input->post('home_no2') != ""){
				$home_addr .= $this->input->post('home_no2')." ";
			}
			if($this->input->post('moo2') != ""){
				$home_addr .= "หมู่ ".$this->input->post('moo2')." ";
			}
			if($this->input->post('buliding2') != ""){
				$home_addr .= "อาคาร ".$this->input->post('buliding2')." ";
			}
			if($this->input->post('soi2') != ""){
				$home_addr .= "ซอย ".$this->input->post('soi2')." ";
			}
			if($this->input->post('muban2') != ""){
				$home_addr .= "หมู่บ้าน ".$this->input->post('muban2')." ";
			}
			if($this->input->post('street2') != ""){
				$home_addr .= "ถนน ".$this->input->post('street2')." ";
			}
			if($this->input->post('tambon2') != ""){
				$home_addr .= "แขวง/ตำบล ".$this->input->post('tambon2')." ";
			}
			if($this->input->post('city2') != ""){
				$home_addr .= "เขต/อำเภอ ".$this->input->post('city2')." ";
			}

			$home_province = $this->input->post('province2');
			$home_postal_code = $this->input->post('province_code2');
		}
		

		
		$data = array(
			'position1'		=> ''.$this->input->post('position1'),
			'position2'		=> ''.$this->input->post('position2'),
			'salary'		=> $this->input->post('salary'),
			'pic_path'		=> '',
			'can_onsite'	=> $this->input->post('can_onsite'),
			'can_onsite_reason'	=>	''.$this->input->post('can_onsite_reason'),
			'is_ready'		=> $this->input->post('is_ready'),
			'is_ready_day'	=> $this->input->post('is_ready_day'),
			'can_pro'		=> $this->input->post('can_pro'),
			'name_th'	=>	$this->input->post('name_th'),
			'surname_th'	=>	$this->input->post('surname_th'),
			'name_en'	=>	$this->input->post('name_en'),
			'surname_en'	=>	$this->input->post('surname_en'),
			'gender'	=>	$this->input->post('gender'),
			'birth_date'	=>	$this->input->post('birth_date'),
			'age'	=>	$this->input->post('age'),
			'scar'	=>	$this->input->post('scar'),
			'height'	=>	$this->input->post('height'),
			'weight'	=>	$this->input->post('weight'),
			'born_city'	=>	$this->input->post('born_city'),
			'born_province'	=>	$this->input->post('born_province'),
			'nationality'	=>	$this->input->post('nationality'),
			'race'	=>	$this->input->post('race'),
			'religion'	=>	$this->input->post('religion'),
			'citizen_id'	=>	$this->input->post('citizen_id'),
			'citizen_card_place'	=>	$this->input->post('citizen_card_place'),
			'citizen_card_taken'	=>	$this->input->post('citizen_card_taken'),
			'citizen_card_expire'	=>	$this->input->post('citizen_card_expire'),
			'tax_id'	=>	$this->input->post('tax_id'),
			'marital_status'	=>	$this->input->post('marital_status'),
			'mar_name'	=>	$this->input->post('mar_name'),
			'mar_surname'	=>	$this->input->post('mar_surname'),
			'mar_nationality'	=>	$this->input->post('mar_nationality'),
			'mar_race'	=>	$this->input->post('mar_race'),
			'mar_occupation'	=>	$this->input->post('mar_occupation'),
			'mar_position'	=>	$this->input->post('mar_position'),
			'mar_company'	=>	$this->input->post('mar_company'),
			'mar_child'	=>	$this->input->post('mar_child'),
			'mar_son'	=>	$this->input->post('mar_son'),
			'mar_daughter'	=>	$this->input->post('mar_daughter'),

			'name_fa'	=>	$this->input->post('name_fa'),
			'surname_fa'	=>	$this->input->post('surname_fa'),
			'nation_fa'	=>	$this->input->post('nation_fa'),
			'race_fa'	=>	$this->input->post('race_fa'),
			'occupation_fa'	=>	$this->input->post('occupation_fa'),
			'company_fa'	=>	$this->input->post('company_fa'),
			'address_fa'	=>	$this->input->post('address_fa'),
			'name_mom'	=>	$this->input->post('name_mom'),
			'surname_mom'	=>	$this->input->post('surname_mom'),
			'nation_mom'	=>	$this->input->post('nation_mom'),
			'race_mom'	=>	$this->input->post('race_mom'),
			'occupation_mom'	=>	$this->input->post('occupation_mom'),
			'company_mom'	=>	$this->input->post('company_mom'),
			'address_mom'	=>	$addr_mom,
			'brother_num'	=>	$this->input->post('brother_num'),
			'you_num'	=>	$this->input->post('you_num'),

			'b1'	=>	$this->input->post('b1'),
			'name_b1'	=>	$this->input->post('name_b1'),
			'occup_b1'	=>	$this->input->post('occup_b1'),
			'comp_b1'	=>	$this->input->post('comp_b1'),
			
			'b2'	=>	$this->input->post('b2'),
			'name_b2'	=>	$this->input->post('name_b2'),
			'occup_b2'	=>	$this->input->post('occup_b2'),
			'comp_b2'	=>	$this->input->post('comp_b2'),

			'b3'	=>	$this->input->post('b3'),
			'name_b3'	=>	$this->input->post('name_b3'),
			'occup_b3'	=>	$this->input->post('occup_b3'),
			'comp_b3'	=>	$this->input->post('comp_b3'),

			'b4'	=>	$this->input->post('b4'),
			'name_b4'	=>	$this->input->post('name_b4'),
			'occup_b4'	=>	$this->input->post('occup_b4'),
			'comp_b4'	=>	$this->input->post('comp_b4'),

			'cur_address'	=>	$cur_addr,
			'cur_province'	=>	$this->input->post('province'),
			'cur_postal_code'	=>	$this->input->post('province_code'),
			'cur_e_mail'	=>	$this->input->post('cur_e_mail'),
			'cur_tel'	=>	$this->input->post('cur_tel'),
			'cur_mobile'	=>	$this->input->post('cur_mobile'),
			'home_address'	=>	$home_addr,
			'home_province' =>  $home_province,
			'home_postal_code'	=>	$home_postal_code,

			'name_edu1'	=>	$this->input->post('name_edu1'),
			'type_edu1'	=>	$this->input->post('type_edu1'),
			'fac_edu1'	=>	$this->input->post('fac_edu1'),
			'major_edu1'	=>	$this->input->post('major_edu1'),
			'start_edu1'	=>	$this->input->post('start_edu1'),
			'stop_edu1'	=>	$this->input->post('stop_edu1'),
			'grade_edu1'	=>	$this->input->post('grade_edu1'),

			'name_edu2'	=>	$this->input->post('name_edu2'),
			'type_edu2'	=>	$this->input->post('type_edu2'),
			'fac_edu2'	=>	$this->input->post('fac_edu2'),
			'major_edu2'	=>	$this->input->post('major_edu2'),
			'start_edu2'	=>	$this->input->post('start_edu2'),
			'stop_edu2'	=>	$this->input->post('stop_edu2'),
			'grade_edu2'	=>	$this->input->post('grade_edu2'),

			'name_edu3'	=>	$this->input->post('name_edu3'),
			'type_edu3'	=>	$this->input->post('type_edu3'),
			'fac_edu3'	=>	$this->input->post('fac_edu3'),
			'major_edu3'	=>	$this->input->post('major_edu3'),
			'start_edu3'	=>	$this->input->post('start_edu3'),
			'stop_edu3'	=>	$this->input->post('stop_edu3'),
			'grade_edu3'	=>	$this->input->post('grade_edu3'),

			'name_edu4'	=>	$this->input->post('name_edu4'),
			'type_edu4'	=>	$this->input->post('type_edu4'),
			'fac_edu4'	=>	$this->input->post('fac_edu4'),
			'major_edu4'	=>	$this->input->post('major_edu4'),
			'start_edu4'	=>	$this->input->post('start_edu4'),
			'stop_edu4'	=>	$this->input->post('stop_edu4'),
			'grade_edu4'	=>	$this->input->post('grade_edu4'),

			'name_edu5'	=>	$this->input->post('name_edu5'),
			'type_edu5'	=>	$this->input->post('type_edu5'),
			'fac_edu5'	=>	$this->input->post('fac_edu5'),
			'major_edu5'	=>	$this->input->post('major_edu5'),
			'start_edu5'	=>	$this->input->post('start_edu5'),
			'stop_edu5'	=>	$this->input->post('stop_edu5'),
			'grade_edu5'	=>	$this->input->post('grade_edu5'),

			'train1'	=>	$this->input->post('train1'),
			'place1'	=>	$this->input->post('place1'),
			'train_from1'	=>	$this->input->post('train_from1'),
			'train_to1'	=>	$this->input->post('train_to1'),
			'train2'	=>	$this->input->post('train2'),
			'place2'	=>	$this->input->post('place2'),
			'train_from2'	=>	$this->input->post('train_from2'),
			'train_to2'	=>	$this->input->post('train_to2'),
			'train3'	=>	$this->input->post('train3'),
			'place3'	=>	$this->input->post('place3'),
			'train_from3'	=>	$this->input->post('train_from3'),
			'train_to3'	=>	$this->input->post('train_to3'),
			'performance'	=>	$this->input->post('performance'),

			'name_refer1'	=>	$this->input->post('name_refer1'),
			'company_refer1'	=>	$this->input->post('company_refer1'),
			'position_refer1'	=>	$this->input->post('position_refer1'),
			'tel_refer1'	=>	$this->input->post('tel_refer1'),
			'name_refer2'	=>	$this->input->post('name_refer2'),
			'company_refer2'	=>	$this->input->post('company_refer2'),
			'position_refer2'	=>	$this->input->post('position_refer2'),
			'tel_refer2'	=>	$this->input->post('tel_refer2'),
			'name_refer3'	=>	$this->input->post('name_refer3'),
			'company_refer3'	=>	$this->input->post('company_refer3'),
			'position_refer3'	=>	$this->input->post('position_refer3'),
			'tel_refer3'	=>	$this->input->post('tel_refer3'),

			'language1'	=>	$this->input->post('language1'),
			'level_speak1'	=>	$this->input->post('level_speak1'),
			'level_write1'	=>	$this->input->post('level_write1'),
			'level_listen1'	=>	$this->input->post('level_listen1'),
			'language2'	=>	$this->input->post('language2'),
			'level_speak2'	=>	$this->input->post('level_speak2'),
			'level_write2'	=>	$this->input->post('level_write2'),
			'level_listen2'	=>	$this->input->post('level_listen2'),
			'computer1'	=>	$this->input->post('computer1'),
			'level_use1'	=>	$this->input->post('level_use1'),
			'computer2'	=>	$this->input->post('computer2'),
			'level_use2'	=>	$this->input->post('level_use2'),
			'computer3'	=>	$this->input->post('computer3'),
			'level_use3'	=>	$this->input->post('level_use3'),
			'computer4'	=>	$this->input->post('computer4'),
			'level_use4'	=>	$this->input->post('level_use4'),
			'computer5'	=>	$this->input->post('computer5'),
			'level_use5'	=>	$this->input->post('level_use5'),
			'computer6'	=>	$this->input->post('computer6'),
			'level_use6'	=>	$this->input->post('level_use6'),
			'type_th'	=>	$this->input->post('type_th'),
			'type_en'	=>	$this->input->post('type_en'),
			'ck_drive'	=>	$this->input->post('ck_drive'),
			'ck_cardrive'	=>	$this->input->post('ck_cardrive'),
			'ck_home'	=>	$this->input->post('ck_home'),
			'ck_home_detail'	=>	$this->input->post('ck_home_detail'),
			'ck_car'	=>	$this->input->post('ck_car'),
			'ck_cartype1'	=>	$this->input->post('ck_cartype1'),
			'ck_cartype2'	=>	$this->input->post('ck_cartype2'),
			'ck_car_status'	=>	$this->input->post('ck_car_status'),


			'hobby'	=>	$this->input->post('hobby'),
			'ck_sick'	=>	$this->input->post('ck_sick'),
			'sick_detail'	=>	$this->input->post('sick_detail'),
			'ck_health'	=>	$this->input->post('ck_health'),
			'health_detail'	=>	$this->input->post('health_detail'),
			'ck_accuse'	=>	$this->input->post('ck_accuse'),

			'think_in_work'	=>	$this->input->post('think_in_work'),
			'plan_in_future'	=>	$this->input->post('plan_in_future'),
			'success_in_work'	=>	$this->input->post('success_in_work'),

			'know_news'	=>	$this->input->post('know_news'),
			'know_news_detail'	=>	$this->input->post('know_news_detail'),
			'know_employee'	=>	$this->input->post('know_employee'),
			'know_employee_detail'	=>	$this->input->post('know_employee_detail'),
			'know_internet'	=>	$this->input->post('know_internet'),
			'know_internet_detail'	=>	$this->input->post('know_internet_detail'),
			'know_market'	=>	$this->input->post('know_market'),
			'know_market_detail'	=>	$this->input->post('know_market_detail'),
			'know_school'	=>	$this->input->post('know_school'),
			'know_school_detail'	=>	$this->input->post('know_school_detail'),
			'know_etc'	=>	$this->input->post('know_etc'),
			'know_etc_detail'	=>	$this->input->post('know_etc_detail'),
			'know_website'	=>	$this->input->post('know_website'),
			'know_board'	=>	$this->input->post('know_board'),

			'other'	=>	$this->input->post('other')


		);
		

		//$page_data["err_msg"] = "ddd";

		//////////// Upload picture
		$input_name = "file1";
		if(isset($_FILES[$input_name])){

			if(!empty($_FILES[$input_name]["type"])){

				
				$type_image_arr		=	explode("/",$_FILES[$input_name]["type"]);
				$type_image			=	$type_image_arr[1];
				if($type_image=='jpg'||$type_image=='jpeg'||$type_image=='gif'||$type_image=='png')
				{
						
					$upload_path				=	"resume";
					//$type_image					=	explode("/",$_FILES[$input_name]["type"]);
					
					$file_name					= 	$data["citizen_id"].".".$type_image;
														
					$this->do_upload($upload_path,$file_name,$input_name);
							
							
					$data["pic_path"] = WEB_PATH.'/upload/'.$upload_path.'/'.$file_name;
				}else{
					$status	=	0;
					$msg		=	"ไม่สามารถอัพโหลดรูปภาพได้ค่ะ";
				}
			}

		}else{
			//$page_data["err_msg"] = "upload error";
			$status	=	0;
			$msg		=	"ไม่สามารถอัพโหลดรูปภาพได้ค่ะ";
			
		}



		//echo $data["citizen_id"];

		//$page_data["print_post"] = $data;
		$this->load->database();
		$this->load->model('md_application');
		//$page_data["insert"] = $this->md_application->addData($data);
		$this->md_application->addData($data);
		
		$view_data = array();

		$view_data['data'] = $data;


		if($this->input->post('company_name1') != ""){
			$app_data = $this->md_application->getIdByCitizenId($data["citizen_id"]);
			$app_id	=	$app_data["applicant_id"];
			$work_data = array(
				'applicant_id' => $app_id,
				'citizen_id'   => $data["citizen_id"],
				'company_name' => $this->input->post('company_name1'),
				'comp_addr' => $this->input->post('comp_addr1'),
				'comp_tel' => $this->input->post('comp_tel1'),
				'date_in' => $this->input->post('date_in1'),
				'posi_in' => $this->input->post('posi_in1'),
				'date_out' => $this->input->post('date_out1'),
				'posi_out' => $this->input->post('posi_out1'),
				'responsibility' => $this->input->post('responsibility1'),
				'salary_in' => $this->input->post('salary_in1'),
				'salary_out' => $this->input->post('salary_out1'),
				'manager' => $this->input->post('manager1'),
				'remark' => $this->input->post('remark1')
			);

			$this->load->model('md_work_history');
			$this->md_work_history->addData($work_data);

			$view_data['work_data1'] = $work_data;
			

			if($this->input->post('company_name2') != ""){
				$work_data = array(
					'applicant_id' => $app_id,
					'citizen_id'   => $data["citizen_id"],
					'company_name' => $this->input->post('company_name2'),
					'comp_addr' => $this->input->post('comp_addr2'),
					'comp_tel' => $this->input->post('comp_tel2'),
					'date_in' => $this->input->post('date_in2'),
					'posi_in' => $this->input->post('posi_in2'),
					'date_out' => $this->input->post('date_out2'),
					'posi_out' => $this->input->post('posi_out2'),
					'responsibility' => $this->input->post('responsibility2'),
					'salary_in' => $this->input->post('salary_in2'),
					'salary_out' => $this->input->post('salary_out2'),
					'manager' => $this->input->post('manager2'),
					'remark' => $this->input->post('remark2')
				);

				$this->md_work_history->addData($work_data);

				$view_data['work_data2'] = $work_data;
			}

			if($this->input->post('company_name3') != ""){
				$work_data = array(
					'applicant_id' => $app_id,
					'citizen_id'   => $data["citizen_id"],
					'company_name' => $this->input->post('company_name3'),
					'comp_addr' => $this->input->post('comp_addr3'),
					'comp_tel' => $this->input->post('comp_tel3'),
					'date_in' => $this->input->post('date_in3'),
					'posi_in' => $this->input->post('posi_in3'),
					'date_out' => $this->input->post('date_out3'),
					'posi_out' => $this->input->post('posi_out3'),
					'responsibility' => $this->input->post('responsibility3'),
					'salary_in' => $this->input->post('salary_in3'),
					'salary_out' => $this->input->post('salary_out3'),
					'manager' => $this->input->post('manager3'),
					'remark' => $this->input->post('remark3')
				);

				$this->md_work_history->addData($work_data);

				$view_data['work_data3'] = $work_data;
			}
			


			//print_r($work_data);
			unset($work_data);
		}
		unset($data);

		
		$this->load->helper('url');
		$view_data["base_url"] = base_url();


		$this->load->model('md_application');
		$view_data['province_list'] = $this->md_application->selectProvinceData();

		$this->load->model('md_career');
		$view_data['career_list'] = $this->md_career->selectDataCareerName();

		$mail_subject = "แจ้งการสมัครงาน (ผ่านเว็บไซต์)";
		$mail_msg = $this->load->view($this->view_path."workwithus/application_preview_mail.php",$view_data, true);


		

		$this->send_email($mail_subject, $mail_msg);

		unset($view_data);
		
		
		$this->_showJsonSuccess($status,$msg);




		/*
		
		$page_data["base_url"] = base_url();


		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($data);
		unset($page_data);
		*/
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */