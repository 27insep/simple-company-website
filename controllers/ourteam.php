<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Ourteam extends Main {	
	private 	$view_path		=	"fontend/";
	private 	$page_title		=	"Supreme-HITERA CO.,LTD. Smart Connected Healthcare Solution";
	private 	$main_page		=	"fontend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->model('md_ourteam');
		$this->_setMainPage($this->main_page);
	}
	public function index()
	{
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."ourteam/index.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$where["ourteam_dept"]		=	"1";
		$order_by["ourteam_index"] = "asc";
		$page_data["ourteam_hitsi"] = $this->md_ourteam->selectData($where,100,0,$order_by);
		
		$where["ourteam_dept"]		=	"2";
		$page_data["ourteam_hitsd"] = $this->md_ourteam->selectData($where,100,0,$order_by);
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */