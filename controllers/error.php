<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Error extends Main {	
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
	public function not_found()
	{
		$this->load->view('not_found.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */