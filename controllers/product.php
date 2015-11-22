<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Product extends Main {	
	private 	$view_path		=	"fontend/";
	private 	$page_title		=	"Supreme-HITERA CO.,LTD. Smart Connected Healthcare Solution";
	private 	$main_page		=	"fontend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->model('md_product');
		$this->_setMainPage($this->main_page);
	}
	public function index()
	{
		$this->load->model('md_product');
		
		$page_data	=	array();
		
		$page_data["path"]				=	$this->view_path."product/index.php";
		$page_data["page_title"]		=	$this->page_title;
		
		$order_by							=	array();
		$order_by["num_order"]		=	"ASC";
		
		$where["is_show"]				=	"1";
		$page_data["product_data"] 	= $this->md_product->selectData($where,25,0,$order_by);
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
	public function product_detail($id="")
	{
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."product/detail.php";
		$page_data["page_title"]	=	$this->page_title;
		$page_data["data"] = $this->md_product->selectData();
		
		if($id != "")
			$page_data["product_detail"] = $this->md_product->getDataById($id);
		else
			$page_data["product_detail"] = $this->md_product->getDataById($page_data["data"][0]["product_id"]);
		
		$page_data["product_name"]		=	$page_data["product_detail"]["product_name"];
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */