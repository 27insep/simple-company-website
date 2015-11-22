<?
class Crud extends CI_Model 
{
    protected $_table_name;
	protected $_return_rows	=	0;
	private 	 $_debug		=	false;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function _setDebug($value)
	{
		$this->_debug	=	$value;
	}
	public function _setTableName($table_name)
	{
		$this->_table_name	=	$table_name;
	}
	public function _setReturnRows($return_rows)
	{
		$this->_return_rows	=	$return_rows;
	}
	private function _showDebug()
	{
		if($this->_debug==true)
		{
			echo $this->db->last_query();
		}
	}
	public function _insertData($data)
	{
		$this->db->insert($this->_table_name, $data);
		$this->_showDebug();
	}
	public function _updateData($data,$where)
	{
		$this->db->where($where);
		$this->db->update($this->_table_name, $data); 
		//$this->db->get();
		$this->_showDebug();
	}
	public function _deleteData($where)
	{
		$this->db->where($where);
		$this->db->delete($this->_table_name); 
		//$this->db->get();
		$this->_showDebug();
	}
	public function _selectData($colum_set,$where="",$limit=25,$offset=0,$order_by=array(),$group_by=array())
	{
		$this->db->select($colum_set);
		
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
		
		$query = $this->db->get($this->_table_name, $limit, $offset);
		$this->_showDebug();

		return $query->result_array();
	}
	public function _totalData($key,$where="",$group_by=array())
	{
		$this->db->select($key);
		
		if(!empty($where))
		{
			$this->db->where($where);
		}

		if(!empty($group_by))
		{
			$this->db->group_by($group_by);
		}
		
		$query = $this->db->get($this->_table_name);
		$this->_showDebug();
		
		return $query->num_rows();
	}
}
?>