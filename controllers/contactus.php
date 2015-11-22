<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/main.php";
class Contactus extends Main {	
	private 	$view_path		=	"fontend/";
	private 	$page_title		=	"Supreme-HITERA CO.,LTD. Smart Connected Healthcare Solution";
	private 	$main_page		=	"fontend/main.php";
	
	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		$this->load->model('md_message');
		$this->load->library('session');
		$this->_setMainPage($this->main_page);
	}
	
	public function index()
	{
		$page_data	=	array();
		
		/*$this->load->helper('captcha');

      	$vals = array(
      		'word'	 => rand(11111,99999),
           	'img_path' => $_SERVER["DOCUMENT_ROOT"].'/hitera/assets/images/captcha/',
          	'img_url' => 'http://www.hitera.com/hitera/assets/images/captcha/',
          	'font_path'	 => $_SERVER["DOCUMENT_ROOT"].'/fonts/SIXTY.TTF',
          	'img_width' => '265',
          	'img_height' => 30,
          	'border' => 0, 
        	'expiration' => 7200
      	);
    
       	// create captcha image
      	$cap = create_captcha($vals);
		
       	// store image html code in a variable
      	$page_data['capcha'] = $cap['image'];
              
        // store the captcha word in a session
       	$this->session->set_userdata('word', $cap['word']);*/
		
		$page_data["path"]			=	$this->view_path."contactus/index.php";
		$page_data["page_title"]	=	$this->page_title;
		$page_data["form_action"]	=	"contactus/add_data";
		
		$this->_setPageData($page_data);
		$this->_show_page();
		
		unset($page_data);
	}

	public function map_large()
	{
		$this -> load -> view($this->view_path."contactus/map_large.php");
	}
	
	public function rpHash($value) { 
	    /*$hash = 5381; 
	    $value = strtoupper($value); 
		
	    for($i = 0; $i < strlen($value); $i++) { 
	        $hash = (($hash << 5) + $hash) + ord(substr($value, $i)); 
	    } 
	    return $hash; */
	    return $value;
	}
	
	public function	add_data()
	{
		$this->_getPostData();
		$data	=	$this->_getData();
		//print_r($data);
		//$capcha = $data["capcha"];
		
		if(empty($data["contact_name"]) || empty($data["contact_email"]) || empty($data["message_title"])
		  || empty($data["message_detail"]))
		{
			$status	=	0;
			$msg		=	"กรุณาระบุข้อมูลให้ครบทุกช่อง !";
		}
		else {
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
			
			if (!preg_match($regex, strtolower($data["contact_email"]))) {
				$status	=	0;
				$msg		=	"รูปแบบอีเมลไม่ถูกต้องค่ะ !";
			}
			else {
				/*if(empty($capcha))
				{
					$status	=	0;
					$msg		=	"กรุณาระบุรหัสความปลอดภัยค่ะ !";
				}else{
					if($capcha!=$this->session->userdata('word'))
					{
						$status	=	0;
						$msg		=	"ขออภัย รหัสความปลอดภัยไม่ถูกต้องค่ะ !";
					}
					else {
						$this->md_message->addData($data);
						
						$status	=	1;
						$msg		=	"ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ !";
					}
				}	*/
				
				if(empty($data["defaultReal"]))
				{
					$status	=	0;
					$msg = "กรุณาระบุรหัสความปลอดภัยค่ะ !";
				}else{
					if ($this->rpHash($data["defaultReal"]) != $data["defaultRealHash"]) 
					{
						$status	= 0;
						$msg = "ขออภัย รหัสความปลอดภัยไม่ถูกต้องค่ะ !";
					}
					else {
						$this->md_message->addData($data);
						

						$mail_msg = $this->load->view($this->view_path."contactus/contractus_preview.php",$data, true);
						
						$this->send_email("จดหมายจาก Website Hitera", $mail_msg);
						
						$status	=	1;
						$msg = "ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ !";
					}
				}	
			}
			
		}
		
		$this->_showJsonSuccess($status,$msg);
	}

	private function send_email($subject, $msg)
	{
		$this->load->library('email');

		$this->email->from('info@supremeproducts.co.th', "Website Hitera");
		$this->email->to("katty__it2005@hotmail.com");
		$this->email->subject($subject);
		$this->email->message($msg);
			
		$err = "Sorry Unable to send email...";	
		if($this->email->send()){					
			$err = "Mail sent...";			
		}
		//echo $this->email->print_debugger();
		return $err;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */