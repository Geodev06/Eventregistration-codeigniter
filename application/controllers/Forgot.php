<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

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
        session_destroy();
		$this->load->view('forgotpass');
    }
    public function securityquestion()
    {
        if(!isset($_SESSION["security_question"]))
        {
            redirect(site_url().'/forgot');
        }
        $this->load->view('securityquestion');
    }
    public function verify()
    {
        $this->load->helper('security');
        $this->load->model('auth_model');

        $email = html_escape($this->input->post('email'));
        $user = html_escape($this->input->post('user'));
        
        if($email != "")
        {
            if($user != "")
            {
                $verified = $this->auth_model->verify($email,$user);
                if($verified)
                {
                    redirect(site_url().'/forgot/securityquestion');
                }
                else
                {
                    $this->session->set_flashdata('login_f','Account is not existing!');
                }
            }
            else
            {
                $this->session->set_flashdata('login_f','Username is required!');
            }
        }else
        {
            $this->session->set_flashdata('login_f','Email is required!');
        }
        redirect(site_url().'/forgot');
    }
    public function verifyanswer()
    {
        $this->load->model('auth_model');
        $id = $_SESSION["user_id_forgot"];
        $ques = $_SESSION["security_question"];
        $answer = html_escape($this->input->post('answer'));

        if($answer != "")
        {
            $accepted = $this->auth_model->verify_answer($id,$ques,$answer);
            if($accepted)
            {
                unset($_SESSION["security_question"]);
                //unset($_SESSION["user_name"]);
                //unset($_SESSION["user_id_forgot"]);
                //unset_userdata('user_name');
                //unset_userdata('user_id_forgot');
                $this->session->set_flashdata('true','Verified! you can now set up your new password.');
                $_SESSION["success"] = "success";
                redirect(site_url().'/forgot/newpass');
               
                
            }else
            {
                $this->session->set_flashdata('login_f','Wrong answer');
            }
        }
        else
        {
            $this->session->set_flashdata('login_f','Answer is required!');
        }
        redirect(site_url().'/forgot/securityquestion');
    }
    public function newpass()
    {
        if(!isset($_SESSION["success"]))
        {
            redirect(site_url().'/forgot');
        }
        $this->load->view('newpass');
    }
    public function resetpassword()
    {
        $this->load->helper('security');
        $this->load->model('auth_model');
        $Nass = html_escape($this->input->post('Npass'));
        $Cpass = html_escape($this->input->post('Cpass'));

        if($Nass != "")
        {
            if($Cpass)
            {
                if($Nass == $Cpass)
                {
                    $newpass = do_hash($Cpass);
                    $id = $_SESSION["user_id_forgot"];
                    $this->auth_model->resetted($id,$newpass);
                    unset($_SESSION["user_name"]);
                    unset($_SESSION["user_id_forgot"]);
                    $this->session->set_flashdata("true","Password successfully updated!");
                    redirect(site_url().'/auth/login');
                    

                }
                else
                {
                    $this->session->set_flashdata("login_f","Two password does not match!.");
                }

            }else
            {
                $this->session->set_flashdata("login_f","Please Confirm your password.");
            }
        }
        else
        {
            $this->session->set_flashdata("login_f","Please provide new password.");
        }
        redirect(site_url().'/forgot/newpass');
    }
}
