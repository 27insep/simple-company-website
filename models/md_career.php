<?
require_once APPPATH."models/crud.php";

class Md_career extends Crud
{
    private $table_name		=	"tbl_jobs";
	private $pk					=	"job_id";
	private $column_set		=	"	job_id,
											job_name,
											job_qualifier,
											job_quantities,
											job_status,
											update_date";
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->_setTableName($this->table_name);
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

		$data["update_date"]		=	date("Y-m-d H:i:s",time());
		
		$where	=	$this->pk." = '".$data[$this->pk]."'";
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
	function selectData($where="",$limit=25,$offset=0,$order_by=array(),$group_by=array())
	{
		
		$data			=	$this->_selectData($this->column_set,$where,$limit,$offset,$order_by,$group_by);
		return $data;
	}
	function selectDataCareerName(){
		$data			=	$this->_selectData("job_id, job_name");
		return $data;
	}

	
	function getTotalData($where="",$group_by=array())
	{
		return $this->_totalData($this->pk,$where,$group_by);
	}
	
}
?>