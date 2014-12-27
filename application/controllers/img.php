<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Kakou 控制器UTF8编码
 * 
 * @package     Vehicleinfo
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Fire
 *
 */

class Img extends CI_Controller
{

	
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');	
		//$this->output->enable_profiler(TRUE);
	}
	
	function test()
	{
		$this->load->view('test.php');
	}

	function test2()
	{
		$this->_MyImg("http://localhost/imgareaselect/imgs/test.jpg");
		//$this->_MyImg("img/img2.png");
	}
	
	function img_area()
	{
		error_reporting(E_ERROR);
		
		if($this->input->post('url')){
			$data['url'] = $this->input->post('url');
		}else{
			$data['url'] = base_url() . "imgs/flower2.jpg";
		}
		
		$array = get_headers($data['url'],1); 
		if(preg_match('/200/',$array[0])){ 
			$data['size'] = GetImageSize($data['url']);
		}else{ 
			$data['url'] = base_url() . "imgs/404error.jpg";
			$data['size'] = GetImageSize($data['url']);
		}

		
		if ($data['size'][0]<=600){
			$data['width'] = $data['size'][0];
			$data['scaleZ'] = 1;
		}else{
			$data['width'] = 600;
			$data['scaleZ'] = $data['size'][0]/600;
		}
		
		$this->load->view('test2.php',$data);
	}
	
	function _get_img_size($imgfile) {
	  $size = GetImageSize($imgfile);
	}
}