<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Home extends Main {	
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
		$this->main();
	}
	public function main()
	{
		$this->load->model('md_product');
		$this->load->model('md_slide');
		
		$page_data	=	array();
		
		$page_data["path"]				=	$this->view_path."home/index.php";
		$page_data["page_title"]		=	$this->page_title;
		
		$order_by							=	array();
		$order_by["num_order"]		=	"ASC";
		
		$where["is_show"]				=	"1";
		$page_data["product_data"] 	= $this->md_product->selectData($where,9,0,$order_by);
		$page_data["slide_data"] 		= $this->md_slide->selectData($where);
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */