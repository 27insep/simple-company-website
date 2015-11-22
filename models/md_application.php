<?
require_once APPPATH."models/crud.php";

class Md_application extends Crud
{
    private $table_name		=	"tbl_applicants";
	private $pk					=	"applicant_id";
	/*
	private $column_set		=	"	applicant_id,
											name_th,
											surname_th,
											position1,
											cur_mobile,
											create_date";
	*/
	private $column_set		=	"	tbl_applicants.applicant_id,
											tbl_applicants.name_th,
											tbl_applicants.surname_th,
											tbl_jobs.job_name,
											tbl_applicants.cur_mobile,
											tbl_applicants.create_date";
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->_setTableName($this->table_name);
    }

	function insert_applicant($data){
		
		$this->_insertData($data);
	}

	function getColumnSet()
	{
		return $this->column_set;
	}

	function addData($data)
	{
		//unset($data["confirm_pwd"]);
		
		//$data["user_pwd"]				=	base64_encode($data["user_pwd"]);
		//$data["user_create_time"]	=	date("Y-m-d H:i:s",time());
		//$data["user_last_update"]		=	date("Y-m-d H:i:s",time());
		
		$this->_insertData($data);
		
	}

	function updateData($data)
	{

		//$data["user_last_update"]		=	date("Y-m-d H:i:s",time());
		//print_r($data);
		
		$where	=	$this->pk." = '".$data[$this->pk]."'";
		//echo $where;
		$this->_updateData($data, $where);
		
		unset($where);
	}

	
	function removeData($row_id)
	{
		$where	=	$this->pk." = '".$row_id."'";
		$this->_deleteData($where);
		unset($where);
	}
	
	function getDataById($row_id)
	{
		$where		=	$this->pk." = '".$row_id."'";
		
		$data			=	$this->_selectData($this->column_set,$where);
		
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}

	function getIdByCitizenId($row_id)
	{
		$where		=	"citizen_id = '".$row_id."'";
		
		$data			=	$this->_selectData("applicant_id",$where);
		
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}

	function getDataByIdAllField($row_id)
	{
		$where		=	$this->pk." = '".$row_id."'";
		
		$data			=	$this->_selectData("*",$where);
		
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}

	function selectData($where="",$limit=25,$offset=0,$order_by=array(),$group_by=array())
	{
		//$where = "tbl_applicants.position";
		//print_r($this->column_set);
		//$this->db->join('tbl_jobs', 'tbl_jobs.job_id = '.$this->_table_name.'.position1');
		//$data			=	$this->_selectData($this->column_set,$where,$limit,$offset,$order_by,$group_by);
		//$data			=	$this->_selectData("tbl_applicants,$where,$limit,$offset,$order_by,$group_by);

		//return $data;


		
		$this->db->select($this->column_set);
		$this->db->from($this->_table_name);
		$this->db->join('tbl_jobs', 'tbl_jobs.job_id = tbl_applicants.position1', 'left');
		
		if(!empty($where))
		{
			$this->db->where($where);
		}
		
		if(!empty($order_by))
		{
			foreach($order_by as $index=>$value)
			{	
				$this->db->order_by($index,$value);
			}
		}
		
		if(!empty($group_by))
		{
			$this->db->group_by($group_by);
		}
		
		$this->db->limit($limit, $offset);


		$query = $this->db->get();



		//$this->_showDebug();

		$data = $query->result_array();
		//$data['last_query'] = $this->db->last_query();
		//echo $this->db->last_query();

		return $data;
		
	}

	function selectReport($where="",$limit=25,$offset=0,$order_by=array(),$group_by=array())
	{
		//$where = "tbl_applicants.position";
		//print_r($this->column_set);
		//$this->db->join('tbl_jobs', 'tbl_jobs.job_id = '.$this->_table_name.'.position1');
		//$data			=	$this->_selectData($this->column_set,$where,$limit,$offset,$order_by,$group_by);
		//$data			=	$this->_selectData("tbl_applicants,$where,$limit,$offset,$order_by,$group_by);

		//return $data;

		if(!empty($where))
		{
			//$this->db->where($where);
			$where = "WHERE ".$where;
		}
		
		$this->db->select(' job_name, num');
		$this->db->from('tbl_jobs');
		$this->db->join(
			'( SELECT position1, count(applicant_id) AS num FROM tbl_applicants '.$where.' GROUP BY position1) applicant',
			'position1 = job_id',
			'left');
		
		if(!empty($order_by))
		{
			foreach($order_by as $index=>$value)
			{	
				$this->db->order_by($index,$value);
			}
		}else{
			$this->db->order_by('job_name');
		}

		
		$this->db->limit($limit, $offset);


		$query = $this->db->get();



		//$this->_showDebug();

		$data = $query->result_array();
		//$data['last_query'] = $this->db->last_query();
		//echo $this->db->last_query();

		return $data;
		
	}

	function selectDataAllField($where="",$limit=25,$offset=0,$order_by=array(),$group_by=array())
	{
		//print_r($this->column_set);
		$data			=	$this->_selectData("*",$where,$limit,$offset,$order_by,$group_by);
		return $data;
	}

	function selectProvinceData(){
		//$data = $this->_selectData("tbl",);
		$this->db->from("tbl_province_data");
		$this->db->order_by("province_id", "asc");
		$query = $this->db->get(); 
		return $query->result_array();
	}
	
	function getTotalData($where="",$group_by=array())
	{
		return $this->_totalData($this->pk,$where,$group_by);
	}
	
}
?>