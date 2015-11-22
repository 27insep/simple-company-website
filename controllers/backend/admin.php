<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class Admin extends Core 
{
	private 	$view_path		=	"/backend/admin/";
	private 	$page_title		=	"ผู้ดูแลระบบ";
	private 	$main_page		=	"/backend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		
		$this->load->model('md_admin');
		$this->_setMainPage($this->main_page);
	}
	
	public function main()
	{
		$page_data	=	array();
		$page_data["path"]			= "backend/home.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$this->_setPageData($page_data);
		$this->_show_admin_page();
		
		unset($page_data);
		$this->clearMemory();
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
	
	public function json()
	{
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'user_id','user_name','user_pwd','user_full_name','user_create_time','user_last_update' );
	
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
	$show_data		=	$this->md_admin->selectData($where,$limit,$offset,$order_by);	
	$iFilteredTotal	=	sizeof($show_data);
	$iTotal			=	$this->md_admin->getTotalData($where);	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($this->input->get('sEcho',TRUE)),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	foreach($show_data as $data)
	{
		$row		=	array();
		foreach($data as $index=>$value)
		{
			switch ($index) {
				case 'user_id':
					$row[]	=	++$offset;
					break;
				case 'user_pwd':
					$row[]	=	base64_decode($value);
					break;	
				case 'user_create_time':
				case 'user_last_update':
					//$row[]	=	date("d/m",strtotime($value))."/".(date("Y",strtotime($value))+543)."<br/> เวลา ".date("H:i:s น.",strtotime($value));
				break;	
				default:
					$row[]	=	$value;
					break;
			}
		}
		$row[]	=	'<span class="action_button" onclick="updateData('.$data["user_id"].')">'.EDIT_ICON.'</span> <span class="action_button" onclick="deleteData('.$data["user_id"].')">'.DELETE_ICON.'</span>';
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
	
	$this->clearMemory();
	
	}
	
	public function form($row_id=null)
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."form.php";
		
		if(empty($row_id))
		{	
			$page_data["page_title"]		=	$this->page_title." > เพิ่มข้อมูล";
			$page_data["form_action"]		=	$this->view_path."add_data";
			$page_data["action_status"]	=	'insert';
		}else{
			$page_data["page_title"]		=	$this->page_title." > แก้ไขข้อมูล";
			$page_data["form_action"]		=	$this->view_path."update_data";
			$page_data["form_data"]		=	$this->md_admin->getDataById($row_id);
			$page_data["action_status"]	=	'update';
		}
		
		$this->_setPageData($page_data);
		unset($page_data);
		
		$this->_show_admin_page();
		$this->clearMemory();
	}
	public function show($row_id)
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."show.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$this->_setPageData($page_data);
		unset($page_data);
		
		$this->_show_admin_page();
		$this->clearMemory();
	}
	public function	add_data()
	{
		$this->_has_login();
		$this->_getPostData();
		$this->md_admin->addData($this->_getData());
		
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}
	public function	update_data()
	{
		$this->_has_login();
		$this->_getPostData();
		$this->md_admin->updateData($this->_getData());
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการแก้ไขข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}
	public function	remove_data()
	{
		$this->_getPostData();
		$data	=	$this->_getData();
		$this->md_admin->removeData($data["id"]);
		unset($data);
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการลบข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}
	public function doLogin()
	{
		$_data_set	=	$this->input->post();
		$admin_id	=	$this->md_admin->checkLogin($_data_set["user_name"],$_data_set["user_pwd"]);
		
		$result		=	array();
		if($admin_id)
		{
			$admin_data = array(
                   'admin_id'  => $admin_id,
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($admin_data);
			
			$result["success"]		=	1;
			$result["message"]	=	"ทำการเข้าสู่ระบบเรียบร้อยแล้วค่ะ  !";
			$result["url"]			=	WEB_PATH."/backend/admin/main";
			
			echo json_encode($result);	
		}else{
			$result["success"]	=	0;
			$result["message"]	=	"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องค่ะ !";
			echo json_encode($result);
			
		}
		unset($result);
	}
	public function doLogout()
	{
		$admin_data = array(
                   'admin_id'  => '',
                   'logged_in' => ''
         );
		$this->session->unset_userdata($admin_data);
		echo '<script> window.location.href	=	"'.WEB_PATH.'/main/backend/";</script>';
	}
	
	public function check_username_admin()
	{
		$txt_user		=	$this->input->post('user_name');
		$txt_user_old	=	$this->input->post('user_name_old');
		$action_status	=	$this->input->post('action_status');
		
		$this->db->select('user_id');
		$query = $this -> db -> get_where("tbl_admin_user", array("user_name" => $txt_user));
		
		if($query->num_rows()>0)
		{
			if($action_status == "insert")
				echo "0";
			else {
				if($txt_user == $txt_user_old)
					echo "true";
				else 
					echo "0";
			}
		}else{
			echo "true";
		}
	}
	
	private function clearMemory()
	{
		unset($this->page_title);
		unset($this->view_path);
	}
}