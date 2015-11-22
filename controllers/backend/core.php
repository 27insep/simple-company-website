<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Core extends Main {
	protected 	$_admin_id;
	private 		$main_page		=	"backend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		//$this->_setMainPage($this->main_page);
		
		$this->load->library('session');
		$this->load->library('image_lib');
		$this->load->helper('url');
	}
	protected function _set_user_id($user_id)
	{
		$this->$user_id	=	$_user_id;
	}
	
	protected function _has_login()
	{
		if(!$this->session->userdata('logged_in'))
		{
			 redirect('/main/backend', 'refresh');
		}
	}
	
	protected function _show_admin_page()
	{
		$this->_has_login();
		$this->_show_page();
	}
	
	protected function _do_upload($upload_path,$file_name,$input_name,$resize=array(),$thumb=array(),$thumb2=array())
	{
		$target_path = $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/".$upload_path."/";

		if(!is_dir($target_path))
		{
			mkdir($target_path);
			chmod($target_path,0777);
		}
		$target_path = $target_path.$file_name; 

		//echo $target_path."<br>";
		
		move_uploaded_file($_FILES[$input_name]['tmp_name'], $target_path);
		chmod($target_path,0777);
		
		if(sizeof($thumb)>0)
		{
			$config['image_library'] 		= 'gd2';
			$config['source_image'] 		= $target_path;
			$config['new_image'] 		= $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/".$thumb["save_path"]."/".$thumb["pic_name"];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 		= FALSE;
			$config['width'] 				= $thumb["width"];
			$config['height'] 				= $thumb["height"];

			$this->image_lib->initialize($config); 

			$this->image_lib->resize();
			if(file_exists($config['new_image']))
			{
				chmod($config['new_image'],0777);
			}
		}			
		if(sizeof($thumb2)>0)
		{
			$config['image_library'] 		= 'gd2';
			$config['source_image'] 		= $target_path;
			$config['new_image'] 		= $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/".$thumb2["save_path"]."/".$thumb2["pic_name"];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 		= FALSE;
			$config['width'] 				= $thumb2["width"];
			$config['height'] 				= $thumb2["height"];

			$this->image_lib->initialize($config); 

			$this->image_lib->resize();
			
			if(file_exists($config['new_image']))
			{
				chmod($config['new_image'],0777);
			}
		}			
		if(sizeof($resize)>0)
		{
			$config['image_library'] 		= 'gd2';
			$config['source_image'] 		= $target_path;
			$config['new_image'] 		= $_SERVER["DOCUMENT_ROOT"].WEB_PATH."/upload/".$resize["save_path"]."/".$resize["pic_name"];
			$config['maintain_ratio'] 		= FALSE;
			
			$config['width'] 				= $resize["width"];
			$config['height'] 			= $resize["height"];
			
			$this->image_lib->initialize($config); 

			if ( ! $this->image_lib->resize())
			{
    			echo $this->image_lib->display_errors();	
			}
			
			if(file_exists($config['new_image']))
			{
				chmod($config['new_image'],0777);
			}
			
		}	
		$this->image_lib->clear();
	}
	
}