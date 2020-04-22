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
				$this->load->view("home");	
			}

			else
			{
				$res = $appData->result();
				$this->load->view("home",["usedata" => $res]);
			}
		}
		else
		{
			$this->load->view("home");	
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