<?php
/**
 * 
 */
class Profile extends CI_controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
		if(!$this->session->userdata("userId"))
		{
			
			return redirect("Login");
		}
	}
	function index()
	{
		$userId = $this->session->userdata("userId");
		$appData = $this->UserModel->getUserData($userId);
		$addrData = $this->UserModel->getAddrData($userId);
		$userData = $appData->row();
		$addressData = $addrData->row();
		$this->load->view("profile",["userData"=>$userData, "addr"=>$addressData]);
	}

	function updateProfile()
	{
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$address = htmlentities($this->input->post("address"));
		$city = $this->input->post("city");
		$pin = $this->input->post("pin");
		$gender = $this->input->post("gender");
		$updatePro = $this->UserModel->updatePro($name, $address, $city, $pin, $phone, $email, $gender);

		$this->session->set_flashdata("Feed","User Profile Updated Successfully");
		return redirect("Profile");
	}
}