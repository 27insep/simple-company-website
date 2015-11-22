<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class Ourwork extends Core 
{
	private 	$view_path		=	"/backend/ourwork/";
	private 	$page_title		=	"ผลงาน";
	private 	$main_page		=	"backend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->helper('form');
		$this->load->model('md_ourwork');
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
	$aColumns = array( 'ourwork_id','num_order','ourwork_name','ourwork_detail','ourwork_image','ourwork_last_update','is_show','ourwork_image','ourwork_create_time');
	
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
	$show_data		=	$this->md_ourwork->selectData($where,$limit,$offset,$order_by);	
	$iFilteredTotal	=	sizeof($show_data);
	$iTotal			=	$this->md_ourwork->getTotalData($where);	
	
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
		$data_id	=	$data["ourwork_id"];
		foreach($data as $index=>$value)
		{
			switch ($index) {
				case 'ourwork_id':
					$row[]	=	$data["num_order"];
					break;
				case 'ourwork_last_update':
					//$row[]	=	date("d/m",strtotime($value))."/".(date("Y",strtotime($value))+543)."<br/> เวลา ".date("H:i:s น.",strtotime($value));
				break;	
				case 'ourwork_detail':
				case 'ourwork_create_time':
				case 'ourwork_intro':
				case 'num_order':
				break;
				case 'ourwork_image':
					$row[]	=	'<center><img src="'.$value.'" width="70px" height="85px"/></center>';
				break;
				case 'is_show':
					if($value==1)
					{
						$css_show	=	"active";
						$css_hide	=	"hide";
					}else{
						$css_show	=	"hide";
						$css_hide	=	"active";
					}
					
					$status_element	=	'<center>';
					$status_element	.=	'<span id="status_show_'.$data_id.'" class="'.$css_show.' pointer" onclick="changeStatus('.$data_id.',0)">'.SHOW_ICON.'</span>';
					$status_element	.=	'<span id="status_hide_'.$data_id.'" class="'.$css_hide.' pointer" onclick="changeStatus('.$data_id.',1)">'.HIDE_ICON;
					$status_element	.=	'</center>';
					
					$row[]	= $status_element;
				break;
				default:
					$row[]	=	$value;
					break;
			}
		}
		// <span class="action_button" onclick="updateData('.$data["user_id"].')"> แก้ไข</span> | 
		
		$row[]	=	'	<span class="action_button" onclick="upindex('.$data["ourwork_id"].','.$data["num_order"].')"> '.UP_ICON.'</span>
							<span class="action_button" onclick="downindex('.$data["ourwork_id"].','.$data["num_order"].')"> '.DOWN_ICON.'</span>
							<span class="action_button" onclick="updateData('.$data["ourwork_id"].')">'.EDIT_ICON.'</span>
							<span class="action_button" onclick="deleteData('.$data["ourwork_id"].')">'.DELETE_ICON.'</span>';
		
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
			$page_data["form_data"]		=	$this->md_ourwork->getDataById($row_id);
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
		
		$data		=	$this->_getData();
		$this->md_ourwork->addData($data);
		
		$last_insert_id			=	$this->db->insert_id();
		
		$this->clearMemory();
		
		$status			=	1;
		$msg				=	"ทำการบันทึกข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$option=array("ourwork_id"=>$last_insert_id);
		$this->_showJsonSuccess($status,$msg,$option);
	}
	public function	update_data()
	{
		$this->_has_login();
		$this->_getPostData();
		
		$this->md_ourwork->updateData($this->_getData());
		$this->clearMemory();
		
		$option			=	array("ourwork_image"=>"");
		
		$status			=	1;
		$msg				=	"ทำการแก้ไขข้อมูลเรียบร้อยแล้วค่ะ !";
			
		$this->_showJsonSuccess($status,$msg,$option);
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
				$msg		=	"ทำการอัพโหลดรูปภาพเรียบร้อยแล้วค่ะ !";
				
				$upload_path			=	'ourwork';
				$file_name				= 	"ourwork_".time().".".$type_image;
		
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
	public function	remove_data()
	{
		$this->_getPostData();
		$data	=	$this->_getData();
		$this->md_ourwork->removeData($data["id"]);
		unset($data);
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการลบข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}
	/*
	private function getProductImage($product_id)
	{
		$where			=	"product_id = '".$product_id."'";	
		$product_data	=	$this->md_ourwork->selectData($where);	
		return "/upload/product/".$product_id.".".$product_data["file_type"];
	}
	*/
	public function up_index()
	{
		$this->_getPostData();
		$data_post	=	$this->_getData();
		
		$id_previous		=	$this->md_ourwork->getDataByIdPrevious($data_post["current_index"]);
		
		if($data_post["current_index"] > 1)
		{
			$data["ourwork_id"] 			=  $data_post["id"];
			$data["num_order"] 			= 	$data_post["current_index"] - 1;
			
			$this->md_ourwork->updateData($data);
			
			$data["ourwork_id"] 			=  $id_previous["ourwork_id"];
			$data["num_order"] 			=  $data_post["current_index"];
			
			$this->md_ourwork->updateData($data);
			
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
		
		$id_next		=	$this->md_ourwork->getDataByIdNext($data_post["current_index"]);
		
		if($id_next["ourwork_id"] != null)
		{
			$data["ourwork_id"] 	=  $data_post["id"];
			$data["num_order"] 	= $data_post["current_index"] + 1;
			
			$this->md_ourwork->updateData($data);
			
			$data["ourwork_id"] 	=  $id_next["ourwork_id"];
			$data["num_order"] 	= $data_post["current_index"];
			
			$this->md_ourwork->updateData($data);
			
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
	private function clearMemory()
	{
		unset($this->page_title);
		unset($this->view_path);
	}
}