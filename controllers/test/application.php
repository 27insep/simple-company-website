<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."controllers/backend/core.php";

class Application extends Core {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private 	$view_path		=	"/backend/applicant/";
	private 	$page_title		=	"สมัครงาน";
	private 	$main_page		=	"backend/main.php";

	public function __construct() 
	{
		parent::__construct();
		// Your own constructor code
		//config page rend
		
		//$this->load->model('md_admin');
		$this->_setMainPage($this->main_page);
	}

	public function index()
	{
		$page_data	=	array();
		$page_data["path"]			=	$this->view_path."main.php";
		$page_data["page_title"]	=	$this->page_title;
		
		$this->_setPageData($page_data);
		$this->_show_admin_page();
		
		unset($page_data);
	}

	public function position($subpage='', $job_id=null)
	{
		
		$this->load->helper('url');

		$base_url = base_url()."test/application";
		
		//echo $job_id;
		//$subpage = $this->uri->segment(3);

		switch($subpage){
			case 'insert_form' :

				$view_data = array();

				$view_data["title_en"] = "Career List";
				$view_data["base_url"] = $base_url;
				$view_data["action"] = "insert";

				$this->load->view('backend/career/form.php', $view_data);
			break;

			case 'insert' :
				$job_name = $this->input->post('job_name');
				$job_qualifier = $this->input->post('job_qualifier');
				$job_quantities = $this->input->post('job_quantities');

				$this->load->database();
				$this->load->model('jobs');
				
				$data = array(
							'job_name' => $job_name,
							'job_qualifier' => $job_qualifier,
							'job_quantities' => $job_quantities
					);

				$this->jobs->insert_job($data);
				
				echo "<script>window.location.href='".$base_url."';</script>";

			break;

			case 'update_form' :
				//$job_id = $this->uri->segment(4);

				$this->load->database();
				$this->load->model('jobs');


				$view_data = array();

				$view_data["title_en"] = "Career List";
				$view_data["base_url"] = $base_url;
				$view_data["action"] = "update";
				$view_data["job_id"] = $job_id;
				
				$view_data["job"] = $this->jobs->get_job_by_id($job_id);

				$this->load->view('backend/career/form.php', $view_data);
			break;

			case 'update' :
				//echo $job_id;
				$this->load->database();
				$this->load->model('jobs');

				$job_name = $this->input->post('job_name');
				$job_qualifier = $this->input->post('job_qualifier');
				$job_quantities = $this->input->post('job_quantities');
				
				$data = array(
							"job_name" => $job_name,
							"job_qualifier" => $job_qualifier,
							"job_quantities" => $job_quantities
						);

				$this->jobs->update_job_by_id($job_id, $data);

				echo "<script>window.location.href='".$base_url."/update_form/".$job_id."';</script>";

			break;

			case 'delete' :
				$this->load->database();
				$this->load->model('jobs');

				$this->jobs->delete_by_id($job_id);

				echo "<script>window.location.href='".$base_url."';</script>";

			break;

			default :
				$this->load->database();
				$this->load->model('jobs');

				$view_data = array();
				
				$view_data["msg"] = "";
				$view_data["title_en"] = "Career List";
				$view_data["base_url"] = $base_url;
				$view_data["jobs"] = $this->jobs->get_jobs();

				$this->load->view('backend/career/main.php', $view_data);
			break;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */