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
}