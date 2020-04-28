<?php
/**
 * 
 */
class AdminModel extends CI_model
{
	
	function getLogin($user,$pass)
	{
		$this->db->where(["username"=>$user,"password"=>$pass]);
		$get = $this->db->get("admin");
		$num = $get->num_rows();
		if($num == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getNewOrder()
	{
		$this->db->where("status","submitted");
		$get = $this->db->get("orders");
		return $get;
	}

	function getprocOrder()
	{
		$this->db->where("status","Confirm");
		$this->db->or_where("status","Processing");
		$get = $this->db->get("orders");
		return $get;
	}

	function getcompOrder()
	{
		$this->db->where("status","Completed");
		$get = $this->db->get("orders");
		return $get;
	}

	function getCancelOrder()
	{
		$this->db->where("status","Cancelled");
		$get = $this->db->get("orders");
		return $get;
	}

	function getDetails($id)
	{
		$this->db->where("order_id",$id);
		$get = $this->db->get("orders");
		$row = $get->row();
		$adress_id = $row->address_id;
		$this->db->where("id",$adress_id);
		$getAd = $this->db->get("user_address");
		$rowAd = $getAd->row();

			$dataAll = array
			(
				"orderId" => $row->order_id,
				"userId" => $row->user_id,
				"adress" => $rowAd->name."<br>".$rowAd->address."<br>".$rowAd->city.",".$rowAd->pin,
				"orders" => html_entity_decode($row->orders),
				"images" => $row->images,
				"types" => $row->types,
				"status" => $row->status,
				"price" => $row->price,
				"invoice" => $row->order_img,
				"description" => $row->description
			);

			return $dataAll;
	}
	function getGalleryAll(){
		$this->db->order_by("id","DESC");
		$q = $this->db->get("gallery");
		return $q;
	}
	function getGallery($proname){
		$this->db->where("product_name",$proname);
		$this->db->order_by("id","DESC");
		$q = $this->db->get("gallery");
		return $q;
	}

	function UploadGallery($proname,$image)
	{
		$data = array
		(
			"product_name"=>$proname,
			"images"=>$image
		);

		$insrt = $this->db->insert("gallery",$data);
	}
	
}