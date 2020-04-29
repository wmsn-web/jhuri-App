<?php
/**
 * 
 */
class SignUp extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
	}
	function index()
	{
		$this->load->view("signup");
	}

	function addAcc()
	{
		$name = $this->input->post("name");
		$phone = $this->input->post("phone");
		$pass = md5($this->input->post("password"));
		$addAcc = $this->UserModel->checkNadd($name,$phone,$pass);
		if($addAcc == "succ")
		{
			$this->session->set_userdata("userId",$phone);
			$this->session->set_flashdata("Feed","Account Created. Please Login Now");
			return redirect("profile");
		}
		else
		{
			$this->session->set_flashdata("Feed","User Already Exist");
			return redirect("SignUp");
		}
	}

	function logout()
	{
		$userId = $this->session->userdata("userId");
		
		$this->db->where("phone",$userId);
		$this->db->update("user_profile",["app_id"=>""]);
		$this->session->unset_userdata("userId");
		$this->session->set_flashdata("Feed","You Have Successfully LoggedOut!");
			return redirect("Login");
		
	}
}