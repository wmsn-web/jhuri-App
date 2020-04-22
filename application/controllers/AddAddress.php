<?php
/**
 * 
 */
class AddAddress extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
	}

	function index()
	{
		$this->load->view("addAddress");
	}

	function submitAddr()
	{
		$orderId = $this->uri->segment(3);
		$name = $this->input->post("name");
		$phone = $this->input->post("phone");
		$address = htmlentities($this->input->post("address"));
		$city = $this->input->post("city");
		$pin = $this->input->post("pin");

		$submit = $this->UserModel->AddrSubmit($name,$phone,$address,$city,$pin);
		$this->session->set_flashdata("Feed","Address Added Successfully..");
		return redirect("ChooseAddress/getAddr/$orderId");
	}
}


