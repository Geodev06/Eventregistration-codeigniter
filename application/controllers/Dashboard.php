<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('auth_model');
		//sessions
		$_SESSION["friend_request_sent"] = "";
		$_SESSION["accept_request"] = "";
		$_SESSION["accepted"] = "";
		$_SESSION["s_id"] = "";

		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}	
		
		$count = $this->auth_model->count_noti($_SESSION["user_id"]);
		$_SESSION["no_notification"] = $count;
		if($count == 0)
		{
			$_SESSION["no_notification"] = "0";
		}
		$this->auth_model->update_notify_no($_SESSION["user_id"],$count);
		
		$friend_count = $this->auth_model->friendcount($_SESSION["user_id"]);
		if($friend_count == 0)
		{
			$_SESSION["friend_count"] = "0";
		}
		$_SESSION["friend_count"] = $friend_count;
		
		$post_count = $this->auth_model->get_post_num();
		if($post_count == 0)
		{
			$_SESSION["post_count"] = "0";
		}
		$_SESSION["post_count"] = $post_count;
		
		$mysched = $this->auth_model->get_mysched($_SESSION["user_id"]);
		$_SESSION["my_sched"] = $mysched;
		if($mysched == 0)
		{
			$_SESSION["my_sched"] = "0";
		}

		$this->load->view('dashboard');
	}
	public function myprofile()
	{
		$this->load->model('auth_model');
		$count = $this->auth_model->count_noti($_SESSION["user_id"]);
		$_SESSION["no_notification"] = $count;
		if($count == 0)
		{
			$_SESSION["no_notification"] = "";
		}
		$this->auth_model->update_notify_no($_SESSION["user_id"],$count);

		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		$this->load->view('profileview');
	}
	public function accountsetting()
	{
		$this->load->model('auth_model');
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}

		$count = $this->auth_model->count_noti($_SESSION["user_id"]);
		$_SESSION["no_notification"] = $count;
		if($count == 0)
		{
			$_SESSION["no_notification"] = "";
		}
		$this->auth_model->update_notify_no($_SESSION["user_id"],$count);
		$this->load->view('setting');
	}
	public function changepass()
	{
		$this->load->helper('security');
		$this->load->model('auth_model');

		$id = $_SESSION['user_id'];

		$password = html_escape($this->input->post('oldpass'));
		$pass = $this->security->xss_clean($password);

		

		$newp =html_escape($this->input->post('npass'));
		$cpass  = html_escape($this->input->post('cpass'));


		//$this->session->set_flashdata($form_data);
		if($password != "")
		{
			if($newp != "")
			{
				if($cpass != "")
				{
					if($newp == $cpass )
					{
						$pass_key = do_hash($pass);
						
						$accept = $this->auth_model->check_oldpass($id,$pass_key);
						if($accept)
						{
							$newpass = do_hash($cpass);
							$this->auth_model->changepass($id,$newpass);
							$this->session->set_flashdata('true', 'Your password has been successfully changed!');
							
						}else
						{
							$this->session->set_flashdata('false', 'Old password is incorrect');
						}

					}else{
						$this->session->set_flashdata('false', 'Two password does not match');
					}

				}else{
					$this->session->set_flashdata('false', 'Please confirm password.');
				}
			}else{
				$this->session->set_flashdata('false', 'Please put your new password.');
			}
		}else{
			$this->session->set_flashdata('false', 'Please put your old password.');
		}
		redirect(site_url().'/dashboard/accountsetting');
	}
	
	public function resview()
	{
		$this->load->model('auth_model');

		$count = $this->auth_model->count_noti($_SESSION["user_id"]);
		$_SESSION["no_notification"] = $count;
		if($count == 0)
		{
			$_SESSION["no_notification"] = "";
		}
		$this->auth_model->update_notify_no($_SESSION["user_id"],$count);
		$_SESSION["accepted"] = "";
		if(isset($_SESSION["s_id"]))
		{
			$this->load->model('auth_model');
			$searchedid = $_SESSION["s_id"];
			$logged_in_id = $_SESSION["user_id"];
			$checked = $this->auth_model->check_friend($searchedid,$logged_in_id);
			$this->load->view('resultview');
		}
		else
		{
			redirect(site_url().'/dashboard');
		}	
	}
	public function notifications()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}

		$this->load->model('auth_model');
		$count = $this->auth_model->count_noti($_SESSION["user_id"]);
		$_SESSION["no_notification"] = $count;
		if($count == 0)
		{
			$_SESSION["no_notification"] = "";
		}
		$this->auth_model->update_notify_no($_SESSION["user_id"],$count);

		$this->load->view('notifications');
	}
	public function friendlist()
	{
		unset($_SESSION["iddy"]);
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}

		$this->load->view('friendlist');
	}
	public function notfound()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		$this->load->view('resultview_null');
	}
	public function search()
	{
		$_SESSION["accepted"]="";

		$this->load->helper('security');
		$this->load->model('auth_model');
		$txtid = html_escape($this->input->post('txtsearch'));
		$isFound = $this->auth_model->get_search_profile($txtid);
		if($isFound)
		{
			$searchedid = $_SESSION["s_id"];
			$logged_in_id = $_SESSION["user_id"];
			$this->auth_model->readed($searchedid,$logged_in_id);
			if($searchedid == $logged_in_id)
			{
				redirect(site_url().'/dashboard/myprofile');
			}
			else
			{
			redirect(site_url().'/dashboard/resview');
			
			}
		}
		else
		{
			redirect(site_url().'/dashboard/notfound');
		}		
	}
	public function sendrequest()
	{
		$this->load->helper('security');
		$this->load->model('auth_model');
		$req = html_escape($this->input->post('request'));
		$profile_id = $_SESSION["s_id"];
		$visitors_id = $_SESSION["user_id"];
		
		$sender = $_SESSION["fname"];
		$sender_ln = $_SESSION["lname"];

		$acronym = $_SESSION["s_acro"];
		$acronym_sender = $_SESSION["acro"];

		$string_1 = "9823423746237468123456789091625364758";
		$first = str_shuffle($string_1);
		$second = str_shuffle($string_1);
		$message_id = substr($first,32).''. substr($second,32);

		$data = array(
			
			'account_id'=>$profile_id,
			'acronym'=>$acronym,
			'visitor_id'=>$visitors_id,
			'request'=>$req,
			'sender'=>$visitors_id,
			'receiver'=>$profile_id,
			'fname'=>$sender,
			'lname'=>$sender_ln,
			'acronym_sender'=>$acronym_sender,
			'message_id'=>$message_id
		);

		$success = $this->auth_model->send_friend_request($data);
		$this->load->helper('date');
		$get_date = date(DATE_RFC1123,time());
		$acroneym = $_SESSION["acro"];
		$req_data = array(
			'user_id'=>$profile_id,
			'acronym'=>$acroneym,
			'content' =>'Hey! '.$_SESSION["fname"].' '.$_SESSION["lname"].' sent you a friend request!',
			'date_created'=>$get_date,
			'res_action'=>'unread',
			'sender'=>$visitors_id
		);
		if($success)
		{
			$this->auth_model->notify_request($req_data);
			
			redirect(site_url().'/dashboard/resview');
		}
		else
		{
			redirect(site_url().'/dashboard/resview');
		}
	}
	public function accept()
	{
		$this->load->model('auth_model');
		$receiver = $_SESSION["user_id"];
		$sender = $_SESSION["s_id"];

		

		$this->load->helper('date');
		$get_date = date(DATE_RFC1123,time());
		$acroneym = $_SESSION["acro"];
		$req_data = array(
			'user_id'=>$sender,
			'acronym'=>$acroneym,
			'content' =>'Hey! '.$_SESSION["fname"].' '.$_SESSION["lname"].' accepted your friend request!',
			'date_created'=>$get_date,
			'res_action'=>'unread',
			'sender'=>$receiver
		);

		$this->auth_model->notify_request($req_data);

		$this->auth_model->accept_process($sender,$receiver);

		$acr_s = $_SESSION["s_acro"];
		$acr_r = $_SESSION["acro"];
		$mes_id = $this->auth_model->get_message_id($receiver,$sender);
		$back_data = array(
			'account_id'=>$sender,
			'visitor_id'=>$receiver,
			'request'=>'accepted',
			'sender'=>$receiver,
			'receiver'=>$sender,
			'acronym'=>$acr_s,
			'fname'=>$_SESSION["fname"],
			'lname'=>$_SESSION["lname"],
			'acronym_sender'=>$acr_r,
			'message_id'=>$mes_id
		);
		$this->auth_model->accept_backend($back_data);
		echo "<script>alet('accepted!')</script>";
		redirect(site_url().'/dashboard/resview');	
	}
	public function messaging()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		if(!isset($_SESSION["iddy"]))
		{
			redirect(site_url().'/dashboard');
		}
		$this->load->model('auth_model');
		$this->load->view('messaging');
	}
	public function newsfeed()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		$this->load->model('auth_model');
		$this->load->view('news_feed');
	}
	public function post()
	{
		$this->load->model('auth_model');
		$content = html_escape($this->input->post('txtcontent'));

		$string_1 = "9823423746237468123456789091625364758";
		$first = str_shuffle($string_1);
		$second = str_shuffle($string_1);
		$post_id = substr($first,32).''. substr($second,32);
		$acronym_sender = $_SESSION["acro"];

		$date = date("g")+4*2;
		$time = date(" i : s | A");
		$bo =  date(" l jS \of F Y ");
		$full =  $date." : ".$time." ".$bo;
		$type_c = 1;
		$data = array(
			'sender'=>$_SESSION["fname"].' '.$_SESSION["lname"],
			'post_id'=>$post_id,
			'content'=>$content,
			'acro_sender'=>$acronym_sender,
			'date_c'=>$full,
			'type_p'=>$type_c
		);
		$check_true = html_escape($this->input->post('check_box'));
		$title_ = html_escape($this->input->post('title'));
		$date_ = html_escape($this->input->post('date'));
		$place_ = html_escape($this->input->post('place'));
		$from = html_escape($this->input->post('from'));
		$to= html_escape($this->input->post('to'));
		$time = $from .'am - '.$to.'pm';

		$event_data = array(
			'event_id' =>$post_id,
			'title'=>$title_,
			'target_date'=>$date_,
			'place'=>$place_,
			'duration'=>$time
		);
		
		if($content != "")
		{
			$this->auth_model->insertpost($data);
			$this->session->set_flashdata('true', 'Successfully posted!');
			if($check_true == "checked")
			{
				$this->auth_model->insertevent($event_data);
				$this->session->set_flashdata('true', 'Successfully posted!');
			}
		}else 
		{
			$this->session->set_flashdata('login_f', 'Content cannot be empty!');
		}
		redirect(site_url().'/dashboard/newsfeed');
	}
	public function joinevent()
	{
		$this->load->model('auth_model');
		$data = array(
			'event_id'=>$_SESSION["event_id"],
			'title'=>$_SESSION["event_title"],
			'target_date'=>$_SESSION["event_date"],
			'place'=>$_SESSION["event_place"],
			'user_id'=>$_SESSION["user_id"],
			'duration'=>$_SESSION["event_duration"],
			'respond'=>'joined'
		);
		$this->auth_model->join_e($data);
		$this->session->set_flashdata('true', 'Successfully reserved!');
		redirect(site_url().'/dashboard/viewdetails');
	}
	public function loadchats()
	{
		$this->load->view('loadchats');
	}
	public function viewdetails()
	{	
		$this->load->model('auth_model');
		$this->auth_model->check_user_events($_SESSION["user_id"],$_SESSION["post_id"]);
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		
		$this->load->view('viewdetail');
	}
	public function loadfeed()
	{
		$this->load->view('loadfeed');
	}
	public function getpostid()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}

		$post_id = html_escape($this->input->post('txtid'));
		$this->load->model('auth_model');

		$this->auth_model->getinfo($post_id);

		$this->auth_model->get_event_info($post_id);

		redirect(site_url().'/dashboard/viewdetails');
	}
	public function insertcomment()
	{
		$this->load->model('auth_model');
		$comments = html_escape($this->input->post('txtcomments'));
		$post_id = html_escape($this->input->post('post_id'));

		$date = date("g")+4*2;
		$time = date(" i : s | A");
		$bo =  date(" l jS \of F Y ");
		$full =  $date." : ".$time." ".$bo;
		$type_p = 2;
		$data = array(
			'comments'=>$comments,
			'post_id'=>$post_id,
			'commentator'=>$_SESSION["fname"].' '.$_SESSION["lname"],
			'date_c'=>$full,
			'type_p'=>$type_p
		);
		$this->auth_model->insertcomment($data);
		redirect(site_url().'/dashboard/viewdetails');
	}
	public function loadcomments()
	{
		$this->load->view('comments');
	}
	public function getmessage()
	{
		$this->load->model('auth_model');
		$txtid = html_escape($this->input->post('txtsearch'));
		$isFound = $this->auth_model->get_search_profile($txtid);

		$mes_id = $this->auth_model->get_message_id($_SESSION["s_id"],$_SESSION["user_id"]);
		$_SESSION["sess_mess_id"] = $mes_id;
		if($isFound)
		{
			$searchedid = $_SESSION["s_id"];
			$logged_in_id = $_SESSION["user_id"];
			if($_SESSION["s_gender"] == "Male")
			{
				$_SESSION["iddy"] ="Mr.";

			}else{ $_SESSION["iddy"] ="Ms.";}

			$this->auth_model->readed($searchedid,$logged_in_id);
			redirect(site_url().'/dashboard/messaging');
		}
		else
		{
			redirect(site_url().'/dashboard/404');
		}
	}
	public function send()
	{
		$this->load->model('auth_model');
		$txt_message = html_escape($this->input->post('txtmessage'));

		$receiver = $_SESSION["user_id"];
		$sender = $_SESSION["s_id"];

		$_fullname = $_SESSION["fname"].' '.$_SESSION["lname"];
		$data = array(
			'sender'=>$_SESSION["user_id"],
			'receiver'=>$_SESSION["s_id"],
			'content'=>$txt_message,
			'message_id'=>$_SESSION["sess_mess_id"],
			'sender_name'=>$_fullname
		);
		$this->auth_model->send_message($data);
		
		redirect(site_url().'/dashboard/messaging');
	}
	public function myevents()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		$this->load->view('myevents');
	}
	public function sysinfo()
	{
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		$this->load->view('system_info');
	}
	public function cancel_evt()
	{
		$this->load->model('auth_model');
		$evt_id = html_escape($this->input->post('txtid'));
		$this->auth_model->cancel_evt($evt_id,$_SESSION["user_id"]);
		redirect(site_url().'/dashboard/myevents');
	}
}
