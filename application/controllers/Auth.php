<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	function __construct()
	{
        parent::__construct();
		$this->load->model('auth_model');		
	}
	public function index()
	{
		redirect(base_url().'index.php/dashboard');
		if(!isset($_SESSION["logged_in"]))
		{
			redirect(site_url().'/auth/login');
		}
		if(isset($_COOKIE['remember_me'])){			
			$this->auth_model->set_session($_COOKIE['remember_me']);
			redirect(site_url().'/dashboard');
		}	
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function register_form()
	{
		$this->load->view('signup.php');
	}
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	public function login_process()
	{
		$this->load->helper('security');
		$username = html_escape($this->input->post('user'));
		$user = $this->security->xss_clean($username);
		$password = html_escape($this->input->post('pass'));
		$pass = $this->security->xss_clean($password);

		$remember_me = html_escape($this->input->post('remember_me'));
		if($username!=""){
			if($password!=""){
				$pass_key = do_hash($pass);

				$check_login = $this->auth_model->check_login($user,$pass_key);
				if($check_login)
				{
					$id = $check_login[0]->id;
					$full_name = $this->auth_model->get_profile($id);
					
					$this->auth_model->get_full_data($id);

					//$full_name1= trim($full_name,"  ");
					$acr = $this->auth_model->get_Acronym($id);
					$this->auth_model->set_session($id,$user,$full_name,$acr);
					if($remember_me)
					{
						$this->auth_model->set_cookie_remember($user);
					}
					redirect(site_url().'/dashboard');
				}else{
					$this->session->set_flashdata('login_f', 'Incorrect username or password.');
				}
			}else{
				$this->session->set_flashdata('login_f', 'Please include your password.');
			}
		}else{
			$this->session->set_flashdata('login_f', 'Please include your username.');
		}
		redirect(site_url().'/auth/login');
	}
	public function logout()
	{
		$this->auth_model->unset_session();
		$this->auth_model->unset_cookie_remember();
		redirect(site_url().'/auth/login');
	}

	public function register_process()
	{
		$this->load->helper('security');
		$firstname = html_escape($this->input->post('fn'));
		$fn = $this->security->xss_clean($firstname);

		$middlename = html_escape($this->input->post('mn'));
		$mn = $this->security->xss_clean($middlename);

		$laststname = html_escape($this->input->post('ln'));
		$ln = $this->security->xss_clean($laststname);

		$gender = html_escape($this->input->post('gender'));
		$gn = $this->security->xss_clean($gender);

		$contact_no = html_escape($this->input->post('no_'));
		$cn = $this->security->xss_clean($contact_no);

		$email = html_escape($this->input->post('email'));
		$em = $this->security->xss_clean($email);

		$user = html_escape($this->input->post('user'));
		$usr = $this->security->xss_clean($user);

		$pass = html_escape($this->input->post('pass'));
		$pss = $this->security->xss_clean($pass);

		$cpass = html_escape($this->input->post('cpass'));
		$cpss = $this->security->xss_clean($cpass);

		$question = html_escape($this->input->post('cbq'));
		$cbq = $this->security->xss_clean($question);

		$answer = html_escape($this->input->post('ans'));
		$ans = $this->security->xss_clean($answer);

		$this->load->library('form_validation');

		$form_data = array(
			'fname'=>$firstname,
			'mname'=>$middlename,
			'lname'=>$laststname,
			'contact'=>$contact_no,
			'email'=>$email,
			'user'=>$user,
			'pass'=>$pass,
			'cpass'=>$cpass,
			'ques'=>$cbq,
			'ans'=>$answer
		);
		$form_data_clear = array(
			'fname'=>'',
			'mname'=>'',
			'lname'=>'',
			'contact'=>'',
			'email'=>'',
			'user'=>'',
			'pass'=>'',
			'cpass'=>'',
			'ques'=>'Choose one',
			'ans'=>''
		);
		$this->session->set_flashdata($form_data);
		
		
		if($firstname!=""){
			if($laststname!=""){
				if($contact_no!=""){
					if($email!=""){
						if($user!=""){
							if($pass!=""){
								if($cpass!=""){
									if($pass == $cpass){
										if($question!="Choose one"){
											$this->session->set_flashdata('ques',$question);
											if($answer!=""){
												//hash protocols
												$hash_pass = do_hash($pss);
												$string_1 = "9823423746237468123456789091625364758";
												$first = str_shuffle($string_1);
												$second = str_shuffle($string_1);
												$user_f = substr($first,33).'-'. substr($second,33);
												//insert
												
												$data = array(
													'User_Id'=>$user_f,
													'fname'=>$fn,
													'mname'=>$mn,
													'lname'=>$ln,
													'gender'=>$gender,
													'contact_no'=>$cn,
													'email'=>$em,
													'username'=>$usr,
													'password'=>$hash_pass,
													'sec_ques'=>$cbq,
													'sec_ans'=>$ans
												);
												$check_login = $this->auth_model->check_user($user);

												if(!$check_login)
												{
													$this->session->set_flashdata($form_data_clear);
													$this->auth_model->Insert_data($data);
													$this->session->set_flashdata('true', 'Your account has been created successfully!');
													redirect(base_url().'index.php/auth/login');
													
												}
												else{
													$this->session->set_flashdata('false', 'Username is already taken!');
												}	
											}else{
												$this->session->set_flashdata('false', 'Please include your security answer.');
											}
										}else{
											$this->session->set_flashdata('false', 'Please include your security question.');
										}
									}else{
										$this->session->set_flashdata('false', 'Two password does not match.');
									}
								}else{
									$this->session->set_flashdata('false', 'Please confirm your password.');
								}
							}else{
								$this->session->set_flashdata('false', 'Please include your password.');
							}
						}else{
							$this->session->set_flashdata('false', 'Please include your username.');
						}
					}else{
						$this->session->set_flashdata('false', 'Please don\'t forget your email.');
					}
				}else{
					$this->session->set_flashdata('false', 'Please don\'t forget your contact no.');
				}
			}else{
				$this->session->set_flashdata('false', 'Please don\'t forget your lastname.');
			}
		}else{

			$this->session->set_flashdata('false', 'Please don\'t forget your firstname.');
		}
		//flash datas
		redirect(site_url().'/auth/register_form');
	}
}
