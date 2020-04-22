<?php
/**
 * 
 */
class Verify extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("userId"))
		{
			return redirect('Login');
		}
	}
	function index()
	{
		$this->load->view("verify");
	}

	function verOtp()
	{
		$otp = $this->input->post("otp");
		$phone = $this->input->post("phone");

		$this->db->where(["phone"=>$phone,"code"=>$otp]);
		$q = $this->db->get("user_profile");
		$num = $q->num_rows();
		if($num == 0)
		{
			$this->session->set_flashdata("Feed","Invalid OTP");
			return redirect("Verify");
		}
		else
		{
			$this->db->where(["phone"=>$phone,"code"=>$otp]);
			$updt = $this->db->update("user_profile",["code"=>""]);
			$this->session->unset_userdata("userId");
			$this->session->set_flashdata("Feed","Account verified. Login Please");
			return redirect("Login");
		}
	}


}