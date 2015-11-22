<?
require_once APPPATH."models/crud.php";

class Md_ourwork extends Crud
{
    private $table_name		=	"tbl_ourwork";
	private $pk					=	"ourwork_id";
	private $column_set		=	"	ourwork_id,
											ourwork_image,
											ourwork_name,
											ourwork_intro,
											ourwork_detail,
											ourwork_last_update, 
											is_show,
											num_order,
											ourwork_create_time";
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
		$data["ourwork_create_time"]		=	date("Y-m-d H:i:s",time());
		$data["ourwork_last_update"]		=	date("Y-m-d H:i:s",time());
		
		$this->_insertData($data);
		
	}
	
	function updateData($data)
	{
		$data["ourwork_last_update"]		=	date("Y-m-d H:i:s",time());
		if(empty($data["ourwork_image"]))	unset($data["ourwork_image"]);
		
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
	
	function getTotalData($where="",$group_by=array())
	{
		return $this->_totalData($this->pk,$where,$group_by);
	}
	
		function getDataByIdPrevious($current_index)
	{
		$where		=	"num_order = '".($current_index - 1)."'";
		
		$data			=	$this->_selectData($this->column_set,$where);
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}
	
	function getDataByIdNext($current_index)
	{
		$where		=	"num_order = '".($current_index + 1)."'";
		
		$data			=	$this->_selectData($this->column_set,$where);
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}
}
?>