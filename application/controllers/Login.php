<?php

class Login extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
		if($this->session->userdata("userId"))
		{
			return redirect('home');
		}
	}
	function index()
	{

		$this->load->view("login");
	}

	function signin()
	{
		$phone = $this->input->post("phone");
		$pass = md5($this->input->post("password"));
		echo $getLog = $this->UserModel->loggin($phone,$pass);
		
		if($getLog == "failed")
		{
			/*
			$this->session->set_flashdata("Feed","Invalid Mobile Number or Password");
			return redirect("Login");
		}
		elseif($getLog == "ver")
		{
			$this->session->set_userdata("userId",$phone);
			$this->session->set_flashdata("Feed","Submit OTP to verify Account");
			return redirect("Verify");
			*/
		}
		else
		{
			$this->session->set_userdata("userId",$phone);
			$this->session->set_flashdata("Feed","Login Success");
			return redirect("Home");
		}
		
	}

	
}