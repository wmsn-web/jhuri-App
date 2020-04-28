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
		else
		{
			$this->session->set_flashdata("Feed","Invalid Username Or Password!");
			return redirect("Admin");
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

	function updateInformation()
	{
		$postStatus = $this->input->post("status");
		$orderId = $this->input->post("orderId");
		if($postStatus == "Confirm")
		{
			$this->db->where("order_id",$orderId);
			$updt = $this->db->update("orders",["status"=>$postStatus,"steps"=>"1"]);
			$this->session->set_flashdata("Feed","Status Updated");
			return redirect("Admin/DetailsOrder/$orderId/processOrder");
		}
		elseif($postStatus == "Processing")
		{
			$price = $this->input->post("price");
			$this->db->where("order_id",$orderId);
			$updt = $this->db->update("orders",["status"=>$postStatus,"price"=>$price,"steps"=>"2"]);
			$this->session->set_flashdata("Feed","Status Updated");
			return redirect("Admin/DetailsOrder/$orderId/processOrder");
		}
		elseif($postStatus == "Completed")
		{
			$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
                $config['max_size']             = 9120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('inv'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata("Feed","The uploaded file exceeds the maximum allowed size");
                        return redirect("Admin/DetailsOrder/$orderId/processOrder");

                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        //$data = array('upload_data' => $this->upload->data());
                        $data = $this->upload->data();
                        $config['image_library']='gd2';
                        $config['source_image']='./uploads/'.$data['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= true;
                        $config['quality']= '80%';
                        $config['height']= 400;
                        $config['new_image']= './uploads/'.$data['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                         $image = $data['file_name'];

                         $this->db->where("order_id",$orderId);
						$updt = $this->db->update("orders",["order_img"=>$image,"status"=>$postStatus,"steps"=>"3"]);
						$this->session->set_flashdata("Feed","Status Updated");
						return redirect("Admin/DetailsOrder/$orderId/completeOrder");
                     }

		}
		elseif($postStatus == "Cancelled")
		{
			$this->db->where("order_id",$orderId);
			$updt = $this->db->update("orders",["order_img"=>"","status"=>$postStatus,"steps"=>"4","price"=>"0.00"]);
			$this->session->set_flashdata("Feed","Order Cancelled");
			return redirect("Admin/DetailsOrder/$orderId/cancelOrder");
		}
	}

	function logout()
	{
		$this->session->unset_userdata("AdminUser");
		return redirect("Admin");
	}

	function AddGallery()
	{
		$get = $this->AdminModel->getGalleryAll();
		$this->load->view("admin/uploadGallery",["getGal"=>$get]);
	}

	function uploadGal()
	{
		$proname = $this->input->post("product_name");
		$get = $this->AdminModel->getGallery($proname);
		if($get->num_rows()==0)
		{
		        $config['upload_path']          = './uploads/gallery';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
                $config['max_size']             = 9120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('product_img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata("Feed","The uploaded file exceeds the maximum allowed size");
                        return redirect("Admin/AddGallery");

                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        //$data = array('upload_data' => $this->upload->data());
                        $data = $this->upload->data();
                        $config['image_library']='gd2';
                        $config['source_image']='./uploads/gallery'.$data['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '60%';
                        $config['height']= 120;
                        $config['new_image']= './uploads/gallery'.$data['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                         $image = $data['file_name'];
                    $uploadGal = $this->AdminModel->UploadGallery($proname,$image);
                $this->session->set_flashdata("Feed","Product Name Uploaded Sucessful!");
                return redirect("Admin/AddGallery");

         }
        }
        else
        {
        	$this->session->set_flashdata("Feed","Product Name Already Exist!");
               return redirect("Admin/AddGallery");
        }

	}
}