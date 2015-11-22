<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Aboutus extends Main {	
	private 	$view_path		=	"fontend/";
	private 	$page_title		=	"Supreme-HITERA CO.,LTD. Smart Connected Healthcare Solution";
	private 	$main_page		=	"fontend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->model('md_page');
		$this->_setMainPage($this->main_page);
	}
	
	public function index()
	{
		$page_data	=	array();
		
		$page_data["path"]			=	$this->view_path."aboutus/index.php";
		$page_data["page_title"]	=	$this->page_title;
		$page_data["data"] = $this->md_page->getDataById("1");
		
		$this->_setPageData($page_data);
		$this->_show_page();
		unset($page_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */