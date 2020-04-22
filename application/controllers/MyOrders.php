<?php

class MyOrders extends CI_controller
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
		$getOrdrs = $this->UserModel->getOrdrs($userId);
		if($getOrdrs->num_rows() == 0)
		{
			$this->session->set_flashdata("Feed","No Oders Found!");
			$this->load->view("myOrder",["notFound"=>"notFound"]);
		}
		else
		{
			$firstOne = $getOrdrs->row();
			$allOrders = $getOrdrs->result();
			$this->load->view("myOrder",["firstOne"=>$firstOne,"allOrders"=>$allOrders]);
		}
	}
		
}