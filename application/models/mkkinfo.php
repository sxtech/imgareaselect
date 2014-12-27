<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  * 
  * Mkkinfo
  *
  */

class Mkkinfo extends CI_Model
{
	#private $ora_db;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('mongo_db', array('activate'=>'default'),'my_mongo');
		$this->load->library('mongo_db', array('activate'=>'recg'),'recg_mongo');
	}
	
	function get_key($key)
	{
		$this->db->select('*');
		$this->db->where('key',$key);
		return $this->db->get('keys');
	}
	
	function add_carinfo($data)
	{
		return $this->db->insert('carinfo',$data);
	}
	
	function add_cltx($data)
	{
		return $this->my_mongo->insert('cltx',$data);
	}
	
	function add_recg($data)
	{
		return $this->recg_mongo->insert('cltx',$data);
	}
}
?>