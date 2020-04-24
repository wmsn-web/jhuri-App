<?php
/**
 * 
 */
class OrdStatus extends CI_controller
{
	function __construct(){
	parent::__construct();
		$this->load->model("UserModel");
		if(!$this->session->userdata("userId"))
		{
			return redirect("Login");
		}

	}

	function status()
	{
		$orderId = $this->uri->segment(3);
		$getOrdr = $this->UserModel->getOrdr($orderId);
		$rowsOrd = $getOrdr->row();
		$this->load->view("ordstatus",["rowsOrd"=>$rowsOrd]);
	}

	function cancelOrd()
	{
		$id = $this->uri->segment(3);
		$this->db->where("id",$id);
		$this->db->update("orders",["status"=>"Cancelled"]);
		return redirect("MyOrders");
	}
}