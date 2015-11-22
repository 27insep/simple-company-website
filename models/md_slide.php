<?
require_once APPPATH."models/crud.php";

class Md_slide extends Crud
{
    private $table_name		=	"tbl_slide";
	private $pk					=	"image_id";
	private $column_set		=	"	image_id,
											image_name,
											image_detail,
											is_show,
											num_order,
											create_time";
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
		$data["create_time"]	=	date("Y-m-d H:i:s");		
		$this->_insertData($data);
	}
	
	function updateData($data)
	{		
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
	function getMaxOrder()
	{
		//$this->_setDebug(true);
		$data	=	$this->selectData("",1,0,array("num_order"=>"DESC"));	
		return $data[0]["num_order"];
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