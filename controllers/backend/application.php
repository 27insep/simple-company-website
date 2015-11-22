<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class Application extends Core {

	private 	$ctrl_path		=	"/backend/application/";
	private 	$view_path		=	"/backend/application/";
	private 	$page_title		=	"จัดการผู้สมัครงาน";
	private 	$main_page		=	"backend/main.php";

	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->helper('form');
		$this->load->model('md_work_history');

		$this->load->model('md_application');

		$this->_setMainPage($this->main_page);
	}
	

	public function index()
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."main.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$this->_setPageData($page_data);
		$this->_show_admin_page();
		
		unset($page_data);
		$this->clearMemory();
	}

	public function test()
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."test.php";
		$page_data["page_title"]	=	$this->page_title;

/*
	$aColumns = array( 'name_th','surname_th','job_name' );


	$where 	= "";
	$sSearch	= "Da";
	if ( $sSearch != "" )
	{
		$where = "(";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$where .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $sSearch )."%' OR ";
		}
		$where = substr_replace( $where, "", -3 );
		$where .= ')';
	}
*/
	//$page_data["test"]		=	$this->md_application->selectReport();	

		//$page_data["test"]		=	$this->md_application->selectData();	

/*
$ci = get_instance();
$ci->load->library('email');
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "wathit.ch@gmail.com"; 
$config['smtp_pass'] = "yc95%4hh";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";

$ci->email->initialize($config);

$ci->email->from('wathit.ch@gmail.com', 'Blabla');
$list = array('wathit.ch@gmail.com');
$ci->email->to($list);
$ci->email->subject('This is an email test');
$ci->email->message('It is working. Great!');
$ci->email->send();

		echo $this->email->print_debugger();
		*/


		$email_msg = "มีการสมัครงานในตำแหน่ง programmer กรุณาตรวจสอบได้ที่ระบบรับสมัครงานค่ะ";
		$page_data["test"] = $this->send_email($email_msg);


		$this->_setPageData($page_data);
		$this->_show_admin_page();
		
		unset($page_data);
		$this->clearMemory();
	}

	public function send_email($msg)
	{
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
	
		$this->load->library('email', $config);
		$this->email->from('info@supremeproducts.co.th', "Admin Team");
		$this->email->to("wathit.ch@gmail.com");
		$this->email->subject("แจ้งเตือนการสมัครงาน");
		$this->email->message($msg);
			
		$err = "Sorry Unable to send email...";	
		if($this->email->send()){					
			$err = "Mail sent...";			
		}
		//echo $this->email->print_debugger();
		return $err;
	}


	public function report()
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."report.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$this->_setPageData($page_data);
		$this->_show_admin_page();
		
		unset($page_data);
		$this->clearMemory();
	}

	public function form($row_id=null)
	{
		$this->load->model('md_career');

		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."form.php";
		
		if(empty($row_id))
		{	
			$page_data["page_title"]		=	$this->page_title." > เพิ่มข้อมูล";
			$page_data["form_action"]		=	$this->ctrl_path."add_data";
			$page_data["action_status"]	=	'insert';
		}else{
			$page_data["page_title"]		=	$this->page_title." > แก้ไขข้อมูล";
			$page_data["form_action"]		=	$this->ctrl_path."update_data";
			$page_data["form_data"]		=	$this->md_application->getDataByIdAllField($row_id);
			$page_data["work_history"]	=	$this->md_work_history->getDataByApplicantId($row_id);
			
			$where = "job_status = 1";
			$page_data["jobs"] = $this->md_career->selectData($where);
			
			$page_data["action_status"]	=	'update';
		}

		$page_data["province"] = $this->md_application->selectProvinceData();
		
		$this->_setPageData($page_data);
		unset($page_data);
		
		$this->_show_admin_page();
		$this->clearMemory();
	}


	public function json()
	{
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'applicant_id','name_th','surname_th','job_name', 'cur_mobile', 'create_date' );
	
	/* 
	 * Paging
	 */
	 $limit		=	25;
	 $offset	=	0;
	 
	 $iDisplayStart		=	$this->input->get('iDisplayStart', TRUE);
	 $iDisplayLength	=	$this->input->get('iDisplayLength', TRUE);
	 
	if ( !empty($iDisplayStart) && $iDisplayLength  != '-1' )
	{
		$limit		=		$iDisplayLength;
		$offset	=		$iDisplayStart; 
	}
	
	/*
	 * Ordering
	 */
	$order_by = array();
	
	$bSortable	=	array();
	$iSortCol		=	array();
	
	$iSortCol[0]	=	$this->input->get('iSortCol_0',TRUE);
	
	if ($iSortCol[0]!="")
	{
		$iSortingCols	=	$this->input->get('iSortingCols',TRUE);
		for ( $i=0 ; $i<intval($iSortingCols) ; $i++ )
		{
			$bSortable[$iSortCol[$i]]	=	$this->input->get( 'bSortable_'.intval($iSortCol[$i]),TRUE);
			if ($bSortable[$iSortCol[$i]]	  == "true" )
			{
				$sSortDir		=	$this->input->get('sSortDir_'.$i);
				$order_by[$aColumns[ intval($iSortCol[$i])]]	=	$sSortDir==='asc' ? 'asc' : 'desc';
			}
		}
	}
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$where 	= "";
	$sSearch	= $this->input->get('sSearch',TRUE);
	if ( $sSearch != "" )
	{
		$where = "(";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$where .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $sSearch )."%' OR ";
		}
		$where = substr_replace( $where, "", -3 );
		$where .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		$bSearchable	=	$this->input->get('bSearchable_'.$i,TRUE);
		$sSearch			=	$this->input->get('sSearch_'.$i,TRUE);
		if ($bSearchable == "true" &&  $sSearch != '' )
		{
			if ( $where != "" )
			{
				$where .= " AND ";
			}
			$where .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($sSearch)."%' ";
		}
	}

	/*
	 * SQL queries
	 * Get data to display
	 */
	//$this->md_admin->_setDebug(true);

	$show_data		=	$this->md_application->selectData($where,$limit,$offset,$order_by);	
	$iFilteredTotal	=	sizeof($show_data);
	$iTotal			=	$this->md_application->getTotalData($where);	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($this->input->get('sEcho',TRUE)),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);

	$i =	0;

	foreach($show_data as $data)
	{
		$row		=	array();
		foreach($data as $index=>$value)
		{
			switch($index){
				case 'create_date' :
					$row[]	=	date("d/m",strtotime($value))."/".(date("Y",strtotime($value))+543)."<br/> เวลา ".date("H:i:s น.",strtotime($value));
					break;					
				default :
					$row[] = $value;
					break;
			}
		}
		$i++;

		$row[]	=	'<span class="action_button" onclick="updateData('.$data["applicant_id"].')"> '.EDIT_ICON.'</span> 
						<span class="action_button" onclick="deleteData('.$data["applicant_id"].','.$i.')">'.DELETE_ICON.'</span>';
		$output['aaData'][] = $row;
	}
	


	echo json_encode( $output );
	
	$this->clearMemory();
	
	}

	public function	update_data()
	{
		//$this->_getPostData();
		//print_r($this->_getData());
		$status	=	1;
		$msg		=	"ทำการแก้ไขข้อมูลเรียบร้อยแล้วค่ะ !";


		if($this->input->post('ck_addr_mom') == '1'){

			$addr_mom = $this->input->post('address_fa');
		}else{
			$addr_mom = $this->input->post('address_mom');
		}

		$data = array(
			'applicant_id'		=> ''.$this->input->post('applicant_id'),
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

			'cur_address'	=>	$this->input->post('cur_address'),
			'cur_province'	=>	$this->input->post('province'),
			'cur_postal_code'	=>	$this->input->post('province_code'),
			'cur_e_mail'	=>	$this->input->post('cur_e_mail'),
			'cur_tel'	=>	$this->input->post('cur_tel'),
			'cur_mobile'	=>	$this->input->post('cur_mobile'),
			'home_address'	=>	$this->input->post('home_address'),
			'home_province'	=>	$this->input->post('province2'),
			'home_postal_code'	=>	$this->input->post('province_code2'),

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

		//print_r($data);

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
														
					$this->_do_upload($upload_path,$file_name,$input_name);
							
							
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

		$this->md_application->updateData($data);
		unset($data);

		
		if($this->input->post('work_id1') != "0"){
			$data = array(
				'id' => $this->input->post('work_id1'),
				'applicant_id' => $this->input->post('applicant_id'),
				'citizen_id' => $this->input->post('citizen_id'),
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
				'remark' => $this->input->post('remark1'),
				'update_date' => "NOW()"
			);
			
			$this->md_work_history->updateData($data);
			unset($data);

		}else{
			if($this->input->post('company_name1') != ""){
				$data = array(
					'applicant_id' => $this->input->post('applicant_id'),
					'citizen_id' => $this->input->post('citizen_id'),
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

				$this->md_work_history->addData($data);
				unset($data);
			}
		}

		if($this->input->post('work_id2') != "0"){
			$data = array(
				'id' => $this->input->post('work_id1'),
				'applicant_id' => $this->input->post('applicant_id'),
				'citizen_id' => $this->input->post('citizen_id'),
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
				'remark' => $this->input->post('remark2'),
				'update_date' => "NOW()"
			);
			
			$this->md_work_history->updateData($data);
			unset($data);

		}else{
			if($this->input->post('company_name2') != ""){
				$data = array(
					'applicant_id' => $this->input->post('applicant_id'),
					'citizen_id' => $this->input->post('citizen_id'),
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

				$this->md_work_history->addData($data);
				unset($data);
			}
		}
		if($this->input->post('work_id3') != "0"){
			$data = array(
				'id' => $this->input->post('work_id1'),
				'applicant_id' => $this->input->post('applicant_id'),
				'citizen_id' => $this->input->post('citizen_id'),
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
				'remark' => $this->input->post('remark3'),
				'update_date' => "NOW()"
			);
			
			$this->md_work_history->updateData($data);
			unset($data);

		}else{
			if($this->input->post('company_name3') != ""){
				$data = array(
					'applicant_id' => $this->input->post('applicant_id'),
					'citizen_id' => $this->input->post('citizen_id'),
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

				$this->md_work_history->addData($data);
				unset($data);

			}
		}




		$this->clearMemory();
		
		
		$this->_showJsonSuccess($status,$msg);
	}


	public function	remove_data()
	{
		$this->_getPostData();
		$data	=	$this->_getData();
		$this->md_application->removeData($data["applicant_id"]);
		$this->md_work_history->removeDataByApplicanId($data["applicant_id"]);

		unset($data);
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการลบข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}

	private function clearMemory()
	{
		unset($this->page_title);
		unset($this->view_path);
	}

	public function report_json()
	{
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'job_name', 'num' );
	
	/* 
	 * Paging
	 */
	 $limit		=	25;
	 $offset	=	0;
	 
	 $iDisplayStart		=	$this->input->get('iDisplayStart', TRUE);
	 $iDisplayLength	=	$this->input->get('iDisplayLength', TRUE);
	 
	if ( !empty($iDisplayStart) && $iDisplayLength  != '-1' )
	{
		$limit		=		$iDisplayLength;
		$offset	=		$iDisplayStart; 
	}
	
	/*
	 * Ordering
	 */
	$order_by = array();
	
	$bSortable	=	array();
	$iSortCol		=	array();
	
	$iSortCol[0]	=	$this->input->get('iSortCol_0',TRUE);
	
	if ($iSortCol[0]!="")
	{
		$iSortingCols	=	$this->input->get('iSortingCols',TRUE);
		for ( $i=0 ; $i<intval($iSortingCols) ; $i++ )
		{
			$bSortable[$iSortCol[$i]]	=	$this->input->get( 'bSortable_'.intval($iSortCol[$i]),TRUE);
			if ($bSortable[$iSortCol[$i]]	  == "true" )
			{
				$sSortDir		=	$this->input->get('sSortDir_'.$i);
				$order_by[$aColumns[ intval($iSortCol[$i])]]	=	$sSortDir==='asc' ? 'asc' : 'desc';
			}
		}
	}
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$where 	= "";

	$from = $this->input->get('from');
	$to = $this->input->get('to');

	if(!empty($from) && !empty($to)){
		$where = 'create_date BETWEEN "'.$from.' 00:00:00" AND "'.$to.' 23:59:59"';
	}
	/*
	 * SQL queries
	 * Get data to display
	 */
	//$this->md_admin->_setDebug(true);
	$group_by = "position1";
	//$where = 'create_date BETWEEN "2014-03-29 00:00:00" AND "2014-03-30 23:59:59"';


	$show_data		=	$this->md_application->selectReport($where,$limit,$offset,$order_by,$group_by);	
	$iFilteredTotal	=	sizeof($show_data);
	$iTotal			=	$this->md_application->getTotalData($where);	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($this->input->get('sEcho',TRUE)),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);

	$i =	0;

	foreach($show_data as $data)
	{
		$row		=	array();
		foreach($data as $index=>$value)
		{
			switch($index){			
				case 'num' :
					if(empty($value)){
						$row[] = 0;
					}else{
						$row[] = $value;
					}
					break;
				default :
					$row[] = $value;
					break;
			}
		}
		$i++;
		$output['aaData'][] = $row;
	}
	


	echo json_encode( $output );
	
	$this->clearMemory();
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */