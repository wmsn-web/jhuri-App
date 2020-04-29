<?php 
/**
 * 
 */
class Home extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
	}
	function index()
	{
		
		if(!$this->session->userdata("userId"))
		{
			$app_id = md5($_SERVER['HTTP_USER_AGENT']);
			$appData = $this->UserModel->getAddData($app_id);
			$num = $appData->num_rows();
			if($num == 0)
			{
				$this->load->view("home",["addr"=>"No Address Please Login"]);	
			}

			else
			{
				
			    $getAddrData = $this->UserModel->getAddrData($userId);
				$res = $appData->result();
				$this->load->view("home",["usedata" => $res,"addr"=>"No Address Please Login"]);
			}
		}
		else
		{
			$userId = $this->session->userdata("userId");
			$getAddrData = $this->UserModel->getAddrData($userId);
			$nums = $getAddrData->num_rows();
			$row = $getAddrData->row();
			if($nums==0){
				$addrs ="";
				$city = "";
				$pin = "";
				$addr ="Address Not Found";
			}else{
				
				$addrs = $row->address;
				$city = $row->city;
				$pin = $row->pin;
				$addr = $addrs.",".$city.",".$pin;
			}
			$this->load->view("home",["addr"=>$addr]);	
		}
		

		//$this->load->view("uplTest");	
	}

	function getPhoneUser()
	{
		$user = $this->uri->segment(3);
		$this->session->set_userdata("userId",$user);
		return redirect("Home");
	}
}