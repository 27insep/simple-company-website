<?
require_once APPPATH."models/crud.php";

class Md_ourteam extends Crud
{
    private $table_name		=	"tbl_ourteam";
	private $pk							=	"ourteam_id";
	private $column_set		=	"	ourteam_id,
											file_type,	
											ourteam_dept,
											ourteam_name,
											ourteam_nickname,
											ourteam_position,
											ourteam_index,
											ourteam_create_time,
											ourteam_last_update ";
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
		$data["ourteam_create_time"]	=	date("Y-m-d H:i:s",time());
		$data["ourteam_last_update"]		=	date("Y-m-d H:i:s",time());
		unset($data["ourteam_img"]);
		
		$this->_insertData($data);
		
	}
	
	function updateData($data)
	{
		$data["ourteam_last_update"]		=	date("Y-m-d H:i:s",time());
		
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
	
	function getDataByIdPrevious($dept,$current_index)
	{
		$where		=	"ourteam_index = '".($current_index - 1)."' and ourteam_dept = '".$dept."'";
		
		$data			=	$this->_selectData($this->column_set,$where);
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}
	
	function getDataByIdNext($dept,$current_index)
	{
		$where		=	"ourteam_index = '".($current_index + 1)."' and ourteam_dept = '".$dept."'";
		
		$data			=	$this->_selectData($this->column_set,$where);
		if(sizeof($data)>0)
		{
			return $data[0];
		}else{
			return false;
		}
	}
	
	function getDataByIndex($dept)
	{
		$where			=	"ourteam_dept = '".$dept."'";
		$order_by 		= 	array("ourteam_index" => "desc");
		$data			=	$this->_selectData("ourteam_index",$where,1,null,$order_by,null);
		
		if(sizeof($data)>0)
		{
			return $data[0]["ourteam_index"] + 1;
		}else{
			return 1;
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
}
?>