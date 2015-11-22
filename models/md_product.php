<?
require_once APPPATH."models/crud.php";

class Md_product extends Crud
{
    private $table_name		=	"tbl_products";
	private $pk				=	"product_id";
	private $column_set		=	"	product_id,
											num_order,
											file_type,
											product_name,
											product_detail,
											product_intro,
											product_create_time,
											product_last_update,
											is_show";
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
		$data["product_create_time"]		=	date("Y-m-d H:i:s",time());
		$data["product_last_update"]		=	date("Y-m-d H:i:s",time());
		
		//print_r($data);
		//$this->_setDebug(true);
		$this->_insertData($data);	
	}
	
	function updateData($data)
	{
		unset($data["product_create_time"]);
		unset($data["product_img"]);

		$data["product_last_update"]		=	date("Y-m-d H:i:s",time());
		
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