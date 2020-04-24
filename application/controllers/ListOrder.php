<?php
/**
 * 
 */
class ListOrder extends CI_controller
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
		
		$this->load->view("listOrder");
	}

	function addorder()
	{
		$userId = $this->session->userdata("userId");
		$ordData = htmlentities($_GET['data']);
		$json = html_entity_decode($ordData);
		$split = json_decode($json);
		$itemChk = $this->UserModel->itemChkUpdt($split);
		//print_r($split);
		
		$orderId = mt_rand(123456,999999);
		if(isset($_GET['orderid']))
		{
			$orderd = $_GET['orderid'];
			if($orderd =="")
			{
				$orderId = mt_rand(123456,999999);
			}
			else
			{
				$orderId = $_GET['orderid'];
			}
		}
		$idOld = $_GET['orderid'];
		$submitOrder = $this->UserModel->submitOrder($ordData,$userId,$orderId);
		if($submitOrder == "succ")
		{
			$this->session->set_userdata(["ordJsons"=>$json,"orderId"=>$orderId]);
			return redirect("ChooseAddress/getAddr/$orderId"); 
		}
		
	}
}