<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class Career extends Core {

	private 	$ctrl_path		=	"/backend/career/";
	private 	$view_path		=	"/backend/career/";
	private 	$page_title		=	"จัดการตำแหน่งงาน";
	private 	$main_page		=	"backend/main.php";

	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		
		$this->load->model('md_career');
		$this->_setMainPage($this->main_page);
	}
	

	public function index()
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."main_2.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$this->_setPageData($page_data);
		$this->_show_admin_page();
		
		unset($page_data);
		$this->clearMemory();
	}


	public function form($row_id=null)
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."form_2.php";
		
		if(empty($row_id))
		{	
			$page_data["page_title"]		=	$this->page_title." > เพิ่มข้อมูล";
			$page_data["form_action"]		=	$this->ctrl_path."add_data";
			$page_data["action_status"]	=	'insert';
		}else{
			$page_data["page_title"]		=	$this->page_title." > แก้ไขข้อมูล";
			$page_data["form_action"]		=	$this->ctrl_path."update_data";
			$page_data["form_data"]		=	$this->md_career->getDataById($row_id);
			$page_data["action_status"]	=	'update';
		}
		
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
	$aColumns = array( 'job_id','job_name','job_quantities','job_status','job_finish' );
	
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
	$show_data		=	$this->md_career->selectData($where,$limit,$offset,$order_by);	
	$iFilteredTotal	=	sizeof($show_data);
	$iTotal			=	$this->md_career->getTotalData($where);	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($this->input->get('sEcho',TRUE)),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	$i = 0;
	foreach($show_data as $data)
	{
		$row		=	array();
		foreach($data as $index=>$value)
		{
			switch ($index) {
				case 'job_qualifier' :
					break;
				case 'update_date' :
					break;
				case 'job_status' :
					$row[] = $value == 1 ? "ใช้งาน" : "ซ่อน";
					break;
				default :
					$row[] = $value;
					break;

			}
		}
		$i++;

		$row[]	=	'<span class="action_button" onclick="updateData('.$data["job_id"].')">'.EDIT_ICON.'</span> 
						<span class="action_button" onclick="deleteData('.$data["job_id"].','.$i.')">'.DELETE_ICON.'</span>';
		$output['aaData'][] = $row;
	}
	


	echo json_encode( $output );
	
	$this->clearMemory();
	
	}


	public function	add_data()
	{
		$this->_has_login();
		$this->_getPostData();
		$this->md_career->addData($this->_getData());
		
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}

	public function	update_data()
	{
		$this->_has_login();
		$this->_getPostData();
		//print_r($this->_getData());
		$this->md_career->updateData($this->_getData());
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการแก้ไขข้อมูลเรียบร้อยแล้วค่ะ !";
		//$msg = $this->db->last_query();
		
		$this->_showJsonSuccess($status,$msg);
		

	}


	public function	remove_data()
	{
		$this->_getPostData();
		$data	=	$this->_getData();
		$this->md_career->removeData($data["job_id"]);
		unset($data);
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการลบข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
		//echo "<script>window.location.href='".$ctrl_path."';</script>";
	}

	private function clearMemory()
	{
		unset($this->page_title);
		unset($this->view_path);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */