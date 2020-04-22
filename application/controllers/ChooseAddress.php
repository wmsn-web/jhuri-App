<?php
/**
 * 
 */
class ChooseAddress extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel");
	}

	function getAddr()
	{
		$userId = $this->session->userdata("userId");
		$getAddrs = $this->UserModel->getAddres($userId);
		$orderId = $this->uri->segment(3);
		$adres = $getAddrs->result();
		$this->load->view("getAddress",["orderId"=>$orderId,"adres"=>$adres]);
	}

	function completeOrder()
	{
		$orderId = $this->uri->segment(3);
		$addrId = $this->input->post("addrId");
		$desc = htmlentities($this->input->post("desc"));

		$compOrd = $this->UserModel->compOrd($orderId,$addrId,$desc);
		if($compOrd == "succ")
		{
			return redirect("Success");
		}
	}
}