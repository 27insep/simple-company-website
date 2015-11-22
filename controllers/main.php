<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	protected $_main_page;
	protected $_page_data	=	array();
	protected $_data			=	array();

	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		
		$this->load->library('convert_date');
		$this->load->library('session');
		
		$this->load->database();
		$this->load->helper(array('form', 'url'));
	}
	
	public function backend()
	{
		$this->load->view('backend/login.php');
	}
	
	protected function _show_page()
	{
		$view_data	=	array();
		$view_data["page_title"]			=	$this->_page_data["page_title"];
		$view_data["page_body"]		=	$this->load->view($this->_page_data["path"],$this->_page_data,true);
		
		$this->load->view($this->_main_page,$view_data);
		
		unset($view_data);
		unset($this->_page_data);
	}
	protected function _setMainPage($main_page)
	{
		$this->_main_page	=	$main_page;
	}
	protected function _getPostData()
	{
		$this->_data	=	$this->input->post();
		unset($this->_data["submit"]);
	}
	
	protected function _setPageData($page_data)
	{
		$this->_page_data	=	$page_data;
	}
	
	protected function _getData()
	{
		return $this->_data;
	}
	
	protected function _getPageData()
	{
		return $this->_page_data;
	}
	
	protected function _showJsonSuccess($status,$msg,$option=array())
	{
		$json	=	array();
		$json["success"]	=	$status;
		$json["message"]	=	$msg;
		
		if(sizeof($option)>0)
		{
			foreach ($option as $key => $value) {
				$json[$key]	=	$value;
			}
		}

		echo json_encode($json);
		unset($json);
	}
}