<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class Aboutus extends Core 
{
	private 	$view_path		=	"/backend/aboutus/";
	private 	$page_title		=	"เกี่ยวกับเรา";
	private 	$main_page		=	"backend/main.php";
	
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
		$row_id	=	1;
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."form.php";
		
		$page_data["page_title"]		=	$this->page_title." > แก้ไขข้อมูล";
		$page_data["form_action"]		=	$this->view_path."update_data";
		$page_data["form_data"]		=	$this->md_page->getDataById($row_id);
		
		$this->_setPageData($page_data);
		unset($page_data);
		
		$this->_show_admin_page();
		$this->clearMemory();
	}
	public function	update_data()
	{
		$this->_has_login();	
		$this->_getPostData();
		$this->md_page->updateData($this->_getData());
		
		$this->clearMemory();
		
		$status	=	1;
		$msg		=	"ทำการบันทึกข้อมูลเรียบร้อยแล้วค่ะ !";
		
		$this->_showJsonSuccess($status,$msg);
	}
	private function clearMemory()
	{
		unset($this->page_title);
		unset($this->view_path);
	}
}