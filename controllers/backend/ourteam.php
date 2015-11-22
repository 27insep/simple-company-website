<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class ourteam extends Core 
{
	private 	$view_path		=	"/backend/ourteam/";
	private 	$page_title		=	"ทีมงาน";
	private 	$main_page		=	"/backend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->helper('form');
		$this->load->model('md_ourteam');
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
	
	public function json()
	{
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'ourteam_id','ourteam_name','ourteam_nickname','ourteam_position','ourteam_index','file_type','ourteam_create_time','ourteam_last_update');
	
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
	
	/*if ($iSortCol[0]!="")
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
	}*/
	
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
	
	
	$dept = $this->input->get('ddl_dept');
	
	if ( $where != "" )
		$where .= " and ourteam_dept = '".$dept."'";
	else 
		$where = "ourteam_dept = '".$dept."'";
		
	$order_by["ourteam_index"] = "asc";

	/*
	 * SQL queries
	 * Get data to display
	 */
	//$this->md_ourteam->_setDebug(true);
	$show_data		=	$this->md_ourteam->selectData($where,$limit,$offset,$order_by);	
	$iFilteredTotal	=	sizeof($show_data);
	$iTotal			=	$this->md_ourteam->getTotalData($where);	
	
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
		$ourtem_id = "";
		
		foreach($data as $index=>$value)
		{
			switch ($index) {
				case 'ourteam_id':
					$row[]	=	$data["ourteam_index"];
					$ourtem_id = $data["ourteam_id"];
					break;
				case 'file_type':
					$row[]	=	'<img src="'.WEB_PATH."/upload/ourteam/".$ourtem_id.".".$data["file_type"].'" width="80px" height="60px"/>';
				case 'ourteam_create_time':
				case 'ourteam_last_update':
					//$row[]	=	date("d/m",strtotime($value))."/".(date("Y",strtotime($value))+543)."<br/> เวลา ".date("H:i:s น.",strtotime($value));
				break;	
				case 'ourteam_dept':
					if($value == "1")
					 	$row[] = "HIT-SI";
					else 
						$row[] = "HIT-SD";	
				break;
				case 'ourteam_index':
				break;
				default:
					$row[]	=	$value;
					break;
			}
		}
		// <span class="action_button" onclick="updateData('.$data["user_id"].')"> แก้ไข</span> | 
		
		$del = $data["ourteam_id"].",".$i.",'".$data["file_type"]."'";
		$i++;
		$row[]	=	'	
							<span class="action_button" onclick="upindex('.$data["ourteam_dept"].','.$data["ourteam_id"].','.$data["ourteam_index"].')"> '.UP_ICON.'</span>
							<span class="action_button" onclick="downindex('.$data["ourteam_dept"].','.$data["ourteam_id"].','.$data["ourteam_index"].')"> '.DOWN_ICON.'</span>
							<span class="action_button" onclick="updateData('.$data["ourteam_id"].')"> '.EDIT_ICON.'</span>
							<span class="action_button" onclick="deleteData('.$del.')">'.DELETE_ICON.'</span>';
		
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
			$page_data["form_data"]		=	$this->md_ourteam->getDataById($row_id);
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
		
		$data			 	=	$this->_getData();
		
		$type_image_arr		=	explode(".",$data["ourteam_file"]);
		
		if(count($type_image_arr) > 1)
		{
			$type_image			=	$type_image_arr[1];
		
			//echo $type_image;
			
			$data["file_type"]		=	$type_image;
			$ourteam_file			=	$_SERVER["DOCUMENT_ROOT"].$data["ourteam_file"];	
			unset($data["ourteam_file"]);
			
			$data["ourteam_index"] 	=	$this->md_ourteam->getDataByIndex($data["ourteam_dept"]);
			
			$this->md_ourteam->addData($data);
			$this->clearMemory();
	
			$status	=	1;
			$msg		=	"ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ !";
			
			$target_path 			= WEB_PATH."/upload/ourteam/";
			
			$last_insert_id			=	$this->db->insert_id();
			
			$newfile 				= 	$_SERVER["DOCUMENT_ROOT"].$target_path.$last_insert_id.".jpeg";
			
			if(file_exists($ourteam_file))
			{
				copy($ourteam_file,$newfile);
				unlink($ourteam_file);
			}	
			
			$option=array("ourteam_id"=>$last_insert_id);
		}
		else {
			$status	=	0;
			$msg		=	"กรุณาเลือกภาพถ่ายค่ะ !";
		}
		
		$option=array("ourteam_id"=>" ");
		$this->_showJsonSuccess($status,$msg,$option);
	}
	public function	update_data()
	{
		$this->_has_login();
		$this->_getPostData();
		
		$option			=	array("ourteam_img"=>"");
		$data			=	array();
		$data			=	$this->_getData();
		
		$ourteam_file	=	$_SERVER["DOCUMENT_ROOT"].$this->input->post("ourteam_file");	
		
		if(!empty($ourteam_file))
		{
			$type_image_arr		=	explode(".",$ourteam_file);
			if(isset($type_image_arr[1]))
			{
				$type_image			=	$type_image_arr[1];
		
				$data["file_type"]		=	$type_image;
			
				$target_path 		= WEB_PATH."/upload/ourteam/";
				$newfile				= 	$_SERVER["DOCUMENT_ROOT"].$target_path.$this->input->post("ourteam_id").".".$type_image;
		
				if(file_exists($ourteam_file))
				{
					unlink($newfile);
					copy($ourteam_file,$newfile);
					unlink($ourteam_file);
					$option			=	array("ourteam_img"=>$target_path.$this->input->post("ourteam_id").".".$type_image);
				}
			}
		}
		unset($data["ourteam_file"]);
		
		$data["ourteam_id"]	=	$this->input->post("ourteam_id");
	
		$this->md_ourteam->updateData($data);
		$this->clearMemory();
	
		$status			=	1;
		$msg				=	"ทำการแก้ไขข้อมูลเรียบร้อยแล้วค่ะ !";
			
		$this->_showJsonSuccess($status,$msg,$option);
	}
	public function	remove_data()
	{
		$this->_getPostData();
		$data	=	$this->_getData();
		$this->md_ourteam->removeData($data["id"]);
		
		$target_path 		= WEB_PATH."/upload/ourteam/";
		$newfile			= 	$_SERVER["DOCUMENT_ROOT"].$target_path.$data["id"].".".$data["file_type"];
		unlink($newfile);
		
		unset($data);
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการลบข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}
	
	public function up_index()
	{
		$this->_getPostData();
		$data_post	=	$this->_getData();
		
		$id_previous		=	$this->md_ourteam->getDataByIdPrevious($data_post["dept"],$data_post["current_index"]);
		
		if($data_post["current_index"] > 1)
		{
			$data["ourteam_id"] =  $data_post["id"];
			$data["ourteam_index"] = $data_post["current_index"] - 1;
			
			$this->md_ourteam->updateData($data);
			
			$data["ourteam_id"] =  $id_previous["ourteam_id"];
			$data["ourteam_index"] = $data_post["current_index"];
			
			$this->md_ourteam->updateData($data);
			
			$status	=	1;
			$msg		=	"";
		}else{
			$status	=	0;
			$msg		=	"ไม่สามารถเลื่อนลำดับได้ค่ะ";
		}
		
		unset($data_post);
		unset($data);
		$this->clearMemory();
		
		$this->_showJsonSuccess($status,$msg);
	}
	
	public function down_index()
	{
		$this->_getPostData();
		$data_post	=	$this->_getData();
		
		$id_next		=	$this->md_ourteam->getDataByIdNext($data_post["dept"],$data_post["current_index"]);
		
		if($id_next["ourteam_id"] != null)
		{
			$data["ourteam_id"] =  $data_post["id"];
			$data["ourteam_index"] = $data_post["current_index"] + 1;
			
			$this->md_ourteam->updateData($data);
			
			$data["ourteam_id"] =  $id_next["ourteam_id"];
			$data["ourteam_index"] = $data_post["current_index"];
			
			$this->md_ourteam->updateData($data);
			
			$status	=	1;
			$msg		=	"";
		}else{
			$status	=	0;
			$msg		=	"ไม่สามารถเลื่อนลำดับได้ค่ะ";
		}
		
		unset($data_post);
		unset($data);
		$this->clearMemory();	
		
		$this->_showJsonSuccess($status,$msg);
	}
	
	private function getOurteamImage($ourteam_id)
	{
		$where			=	"ourteam_id = '".$ourteam_id."'";	
		$ourteam_data	=	$this->md_ourteam->selectData($where);	
		return "/upload/ourteam/".$ourteam_id.".".$ourteam_data["file_type"];
	}

	private function clearMemory()
	{
		unset($this->page_title);
		unset($this->view_path);
	}
	
	public function upload()
	{
		//print_r($_FILES);
		$input_name	=	"files";				
		if(!empty($_FILES[$input_name]["type"]))
		{
			$type_image_arr		=	explode("/",$_FILES[$input_name]["type"]);
			$type_image			=	$type_image_arr[1];
			if($type_image=='jpg'||$type_image=='jpeg'||$type_image=='gif'||$type_image=='png')
			{
				$data					=	$this->_getData();
				$data["file_type"]	=	$type_image;
		
				$this->clearMemory();
		
		
				$status	=	1;
				$msg		=	"ทำการอัพโหลดรูปภาพทีมงานเรียบร้อยแล้วค่ะ !";
				
				$upload_path			=	'ourteam';
				$file_name				= 	"temp_".time().".".$type_image;
		
				$resize					=	array();
				$resize['width']			=	280;
				$resize['height']		=	165;
				$resize['save_path']	=	$upload_path;
				$resize['pic_name']	=	$file_name;
						
				$this->_do_upload($upload_path,$file_name,$input_name,$resize);
				
				$target_path = WEB_PATH."/upload/".$upload_path."/";
				
				$img		=	$target_path.$file_name;
			}else{
				$status	=	0;
				$msg		=	"upload ได้เฉพาะ .jpg,.gif,.png ค่ะ !";
				$img		=	"";
			}		
		}
		
		$json	=	array();
		$json["msg"]	=	$msg;
		$json["img"]	=	$img;
		
		echo json_encode($json);
	}
}