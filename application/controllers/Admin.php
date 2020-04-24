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
		$this->load->library('breadcrumbcomponent'); 
		
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

	function newOrder()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			$this->load->view("admin/login");
		}
		else
		{
			$getNewOrders = $this->AdminModel->getNewOrder();
			$this->load->view("admin/newOrder",["getNewOrders"=>$getNewOrders]);
	    }
	}

	function processOrder()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			$this->load->view("admin/login");
		}
		else
		{
			$getNewOrders = $this->AdminModel->getprocOrder();
			//print_r($getNewOrders->num_rows());
			$this->load->view("admin/processOrder",["getNewOrders"=>$getNewOrders]);
	    }
	}

	function completeOrder()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			$this->load->view("admin/login");
		}
		else
		{
			$getNewOrders = $this->AdminModel->getcompOrder();
			//print_r($getNewOrders->num_rows());
			$this->load->view("admin/completeOrder",["getNewOrders"=>$getNewOrders]);
	    }

	}

	function cancelOrder()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			$this->load->view("admin/login");
		}
		else
		{
			$getNewOrders = $this->AdminModel->getCancelOrder();
			//print_r($getNewOrders->num_rows());
			$this->load->view("admin/cancelOrder",["getNewOrders"=>$getNewOrders]);
	    }
	}

	//order Details

	function DetailsOrder()
	{
		if(!$this->session->userdata("AdminUser"))
		{
			$this->load->view("admin/login");
		}
		else
		{
			$id = $this->uri->segment(3);
			$back = $back = $this->uri->segment(4);
			if($back == "newOrder"){$txt = "New Order"; $link = base_url()."Admin/newOrder"; }
			elseif ($back == "completeOrder") {$txt = "Complete Order"; $link = base_url()."Admin/completeOrder"; }
			elseif($back == "processOrder"){$txt = "Process Order"; $link = base_url()."Admin/processOrder";}
			elseif($back == "cancelOrder"){$txt = "Cancelled Order"; $link = base_url()."Admin/cancelOrder";}
			else{
				$txt ="";
			}
			$breadcrumb         = array(
            "Dashboard" => base_url()."Admin/dashboard",
            "$txt" => $link,
            "Order Details" => ""
        );
			$details = $this->AdminModel->getDetails($id);
			
			$this->load->view("admin/orderDetails",["breadcrumb"=>$breadcrumb,"details"=>$details]);
		}
	}

	//Delete Orders
	function deleteOrder()
	{
		$id = $this->uri->segment(3);
		$back = $this->uri->segment(4);
		$this->db->where("id",$id);
		$this->db->delete("orders");
		$return = "Admin/".$back;
		return redirect($return);
	}
}