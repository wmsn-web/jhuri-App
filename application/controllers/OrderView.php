<?php
/**
 * 
 */
class OrderView extends CI_controller
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
		$orderId = $this->uri->segment(3);
		$getOrd = $this->UserModel->getOrdr($orderId);
		$this->load->view("orderView",["getOrd"=>$getOrd]);
	}
}