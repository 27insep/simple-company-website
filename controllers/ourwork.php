<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Ourwork extends Main {	
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
	public function old_index()
	{
		$this->load->model('md_ourwork');
		
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."ourwork/index.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$where["is_show"]			=	"1";
		$order_by["num_order"]	=	"ASC";
		
		$page_data["data"] 	= $this->md_ourwork->selectData($where,25,0,$order_by);
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
	public function show_content()
	{
		$this->load->model('md_ourwork');
		
		$where["ourwork_id"]	=	$this->input->post("ourwork_id");
		$data							= $this->md_ourwork->selectData($where);
		
		$json_data					=	array();
		
		$json_data["ourwork_image"]	=	$data[0]["ourwork_image"];
		$json_data["ourwork_detail"]	=	$data[0]["ourwork_detail"];
		
		echo json_encode($json_data);
	}
	public function ourwork_detail($ourwork_id)
	{
		$this->load->model('md_ourwork');
		
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."ourwork/detail.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$page_data["data"] = $this->md_ourwork->selectData();
		
		$page_data["ourwork_id"] 	= $ourwork_id;
		if(empty($page_data["ourwork_id"]))
		{
			$page_data["ourwork_id"]	=	$page_data["data"][0]["ourwork_id"]; 	
		}
		
		if($ourwork_id != "")
			$page_data["ourwork_detail"] = $this->md_ourwork->getDataById($ourwork_id);
		else
			$page_data["ourwork_detail"] = $this->md_ourwork->getDataById($page_data["data"][0]["ourwork_id"]);
		
		$page_data["ourwork_name"] 	= $page_data["ourwork_detail"]["ourwork_name"];
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
	public function index()
	{
		$this->load->model('md_ourwork');
		
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."ourwork/ourwork.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$where["is_show"]			=	"1";
		$order_by["num_order"]	=	"ASC";
		
		$page_data["data"] 	= $this->md_ourwork->selectData($where,25,0,$order_by);
		
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */