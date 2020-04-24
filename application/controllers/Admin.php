<?php
/**
 * 
 */
class Admin extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("AdminModel");
		
	}
//Dashboard data//
	function dashboard()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			return redirect("Admin");
		}
		else
		{
			$this->load->view("admin/dashboard");
		}
	}
//Enter to login Page
	function index()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			$this->load->view("admin/login");
		}
		else
		{
			return redirect("Admin/dashboard");
	    }
	}

//Process Login Action 
	function processLogin()
	{
		//get Data from Submitted form
		$user = $this->input->post("username");
		$pass = md5($this->input->post("password"));
		//Send data to Model for check database
		$admin_id = md5($user);
		$loginCheck = $this->AdminModel->getLogin($user,$pass);
		//Create logic
		if($loginCheck == 1)
		{
			$this->session->set_flashdata("Feed","Login Success");
			$this->session->set_userdata("AdminUser",$admin_id);
			//return
			return redirect("Admin/dashboard");
		}
	}
}