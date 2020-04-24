<?php
/**
 * 
 */
class UserModel extends CI_model
{
	
	function checkNadd($name,$phone,$pass)
	{
		$rand = mt_rand(000000,999999);
		$this->db->where("phone",$phone);
		$q = $this->db->get("user_profile");
		$num = $q->num_rows();
		if($num==0)
		{
			$data = array
			(
				"name" => $name,
				"phone" => $phone,
				"password" =>$pass,
				"code" =>$rand
			);

			$insrt= $this->db->insert("user_profile",$data);
			return "succ";
		}
		else
		{
			return "exst";
		}
	}
	function loggin($phone,$pass)
	{
		$app_id = md5($_SERVER['HTTP_USER_AGENT']);
		$this->db->where(["phone"=>$phone,"password"=>$pass]);
		$q = $this->db->get("user_profile");
		$num = $q->num_rows();
		$row = $q->row();
		if($num==0)
		{
			return "failed";
		}
		else
		{
			
				$this->db->where("phone",$phone);
			    $this->db->update("user_profile",["app_id"=>$app_id]);
			    return "succ";
			
		}
		}
	

	function getAddData($app_id)
	{
		$this->db->where("app_id",$app_id);
		$query = $this->db->get("user_profile");
		return $query;
	}

	function getUserData($userId)
	{
		$this->db->where("phone",$userId);
		$query = $this->db->get("user_profile");
		return $query;
	}

	function getAddrData($userId)
	{
		$this->db->where(["phone"=>$userId,"types"=>"prim"]);
		$query = $this->db->get("user_address");
		return $query;
	}
	function updatePro($name, $address, $city, $pin, $phone, $email, $gender)
	{
		$this->db->where(["user_id"=>$phone,"types"=>"prim"]);
		$query = $this->db->get("user_address");
		$num = $query->num_rows();
		if($num == 0)
		{
			//insert
			$data = array
					(
						"user_id" =>$phone,
						"name"    =>$name,
						"address" =>$address,
						"city"    =>$city,
						"pin"     =>$pin,
						"phone"   =>$phone,
						"types"   =>"prim"
					);
			$prof = array("email"=>$email, "gender"=>$gender);

			$insert = $this->db->insert("user_address",$data);

			$this->db->where("phone",$phone);
			$updt = $this->db->update("user_profile",$prof);
			
				
			
		}
		else
		{
			//update
			$data = array
					(
						"user_id" =>$phone,
						"name"    =>$name,
						"address" =>$address,
						"city"    =>$city,
						"pin"     =>$pin,
						"phone"   =>$phone,
						"types"   =>"prim"
					);
			$this->db->where(["user_id"=>$phone,"types"=>"prim"]);
			$update = $this->db->update("user_address",$data);

			$prof = array("name"=>$name, "email"=>$email, "gender"=>$gender);
			$this->db->where("phone",$phone);
			$updt = $this->db->update("user_profile",$prof);
		}
	}

	function itemChkUpdt($split)
	{
		foreach ($split as $key) 
		{
			$name = $key->text;
			$this->db->where("item_name",$name);
			$query = $this->db->get("all_items");
			$num = $query->num_rows();
			if($num == 0)
			{
				$this->db->insert("all_items",["item_name"=>$name]);
			}
		}
	}

	function submitOrder($ordData,$userId,$orderId)
	{
		$data = array
					(
						"order_id"=> $orderId,
						"user_id" => $userId,
						"orders"  => $ordData,
						"types"   => "list"
					);
		$this->db->where("order_id",$orderId);
		$get = $this->db->get("orders");
		$num = $get->num_rows();
		if($num == 0)
		{
			$q = $this->db->insert("orders",$data);
			if($q)
			{
				return "succ";
			}
			else
			{
				return "failed";
			}
		}
		else
		{
			$this->db->where("order_id",$orderId);
			$q = $this->db->update("orders",$data);
			if($q)
			{
				return "succ";
			}
			else
			{
				return "failed";
			}
		}
			
	}
	function getAddres($userId)
	{
		$this->db->where(["phone"=>$userId]);
		$query = $this->db->get("user_address");
		return $query;
	}

	function AddrSubmit($name,$phone,$address,$city,$pin)
	{
		$data = array
					(
						"user_id" => $phone,
						"name"    => $name,
						"address" => $address,
						"city"    => $city,
						"pin"	  => $pin,
						"phone"	  => $phone,
						"types"   => "altrs"
					);
		$insert = $this->db->insert("user_address",$data);
	}

	function compOrd($orderId,$addrId,$desc)
	{
		DATE_DEFAULT_TIMEZONE_SET('Asia/Kolkata');
		$date = date('d-m-Y');
		$data = array
					(
						"address_id" => $addrId,
						"status"     => "submitted",
						"description" => $desc,
						"date"        => $date
					);
		$this->db->where("order_id",$orderId);
		$updt = $this->db->update("orders",$data);
		if($updt)
		{
			return "succ";
		}
	}

	function getOrdrs($userId)
	{
		$this->db->where("user_id",$userId);
		$this->db->order_by("id","DESC");
		$q = $this->db->get("orders");
		return $q;
	}

	function getOrdr($orderId)
	{
		$this->db->where("order_id",$orderId);
		$q = $this->db->get("orders");
		return $q;
	}

	function addOrderImg($userId,$orderId,$image)
	{
		$data = array
					(
						"order_id"=> $orderId,
						"user_id" => $userId,
						"orders"  => "ImageType",
						"types"   => "imgs",
						"images"  => $image
					);
		$q = $this->db->insert("orders",$data);
		if($q)
		{
			return "succ";
		}
	}
}