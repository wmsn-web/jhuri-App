<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Forg extends CI_controller
{
	
	function index()
	{
		
	
		$userEmail = "natta.sanjay@gmail.com";
		$uniqueId = uniqid(rand(), TRUE);
			$uniq = md5($uniqueId);
			//$this->load->model("Forgot");
		//$qr = $this->Forgot->sendActMail($userEmail,$uniq);

		
			$to = $userEmail;
			$subject = "Forgot Password";
			$txt = "<html>
<body>
   <div style='margin-top: 30px' align='center'>
   	<div style='width:520px; height: 420px; background-image: linear-gradient(#0370FA, #478FEC); padding: 15px'>
   		<img src='https://hottestface.com/assets/images/logo/pht_logo.png' />

   		<div style='color: #fff; float: left; text-align: left; margin-top: 65px'>
   		<p>Dear User,<br>
You have requested to change password.  We have sent you a password reset link bellow.
			if you didn't send any request then ignore this message. Please don't share this message to anyone. We never ask for generate token number.</p>
<div align='center'>
<a style='width: 130px; padding: 6px 12px; border: solid 1px #FF4200; text-decoration: none; background:#FF4200; color: #fff; border-radius: 65px; ' href='https://hottestface.com/ResetPass?tokenId=$uniq'>Change Password</a>
</div>
   	</div>
   	<div style='margin-top: 55px; color: #fff' align='right'>
		<br><br><br><br><br><br>Warm Regards<br>
		HottestFace.com
   	</div>
   	</div>
   	
   </div>
</body>
</html>";
			
			
			
			//".base_url()."ResetPass?tokenId=$uniq";
			
			
        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'smtp.gmail.com', 
            'smtp_port' => 465,
            'smtp_user' => 'solutions.web2019@gmail.com',
            'smtp_pass' => 'Goodnight88',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'html', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
            
            $this->load->library('email',$config);
            
            
    
            $this->email->set_newline("\r\n");
            $this->email->from("solutions.web2019@gmail.com");
            $this->email->to($to);
            $this->email->subject("$subject");
            $this->email->message($txt);
    
            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
            } else {
                //show_error($this->email->print_debugger());
            }
		
			$this->session->set_flashdata(["feedback"=>"We have sent you an email with Password reset link."]);
			//return redirect("forgotPass");
			
			/*
			$message = "	Dear User,
			You have requested to change password.  We have sent you a password reset link bellow.
			if you didn't send any request then ignore this message. Please don't share this message to anyone. We never ask for generate token number.
			http://hottestface.com/forgotPass/reset?tokenId";
			*/
			
			//$to = "natta.sanjay@gmail.com";
//$subject = "My subject";



//mail($to,$subject,$txt);

			/*
			mail($to,"Forgot Password",$message);
			/*
		$usccs = 	mail("natta.sanjay@gmail.com", $subject, $message, $headers);
		if($usccs){
			$this->session->set_flashdata(["feedback"=>"We have sent you an email with Password reset link."]);
			//return redirect("forgotPass");
		}else{
		    
		     $errorMessage = error_get_last();
		     print_r($errorMessage);
		}
		*/
		
	}
}
