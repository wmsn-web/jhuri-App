<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model("UserModel");
        }

        public function index()
        {
               // $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('ordImg'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        print_r($error);

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

                         $userId = $this->session->userdata("userId");
                         $orderId = mt_rand(123456,999999);
                         $image = $data['file_name'];

                         $addOrder = $this->UserModel->addOrderImg($userId,$orderId,$image);
                         if($addOrder == "succ")
                         {
                            return redirect("ChooseAddress/getAddr/$orderId");
                         }
                        //$this->load->view('upload_success', $data);
                }
        }
}
?>