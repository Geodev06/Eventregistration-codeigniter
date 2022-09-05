<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function __construct()
    {
        parent:: __construct();
    }
    public function check_user($username){
		$query = $this->db->get_where("tbl_accounts",array("username" => $username));
		return $query->result();
	}
    public function Insert_data($data)
    {
        if($this->db->insert("tbl_accounts",$data))
        {
            return true;
        }
    }
    public function check_login($username,$password)
    {
        $query = $this->db->get_where("tbl_accounts",array("username"=>$username,"password"=>$password));
        return $query->result();
    }
    public function set_cookie_remember($username)
    {
        setcookie('remember_me',$username, time() + (86400 * 30), "/");
    }
    public function unset_cookie_remember(){
		setcookie('remember_me','',0,'/');
    }
    public function get_profile($user_id)
    {
        $sql = "Select * from tbl_accounts where id = ".$user_id;
        $query = $this->db->query($sql);
        $row = $query->row();
        $last_name = $row->lname;
        $first_name = $row->fname;
        $full_name = $last_name.' '.trim($first_name," ");
        return strtolower($full_name);
    }
    public function get_full_data($user_id)
    {
        $sql = "Select * from tbl_accounts where id = ".$user_id;
        $query = $this->db->query($sql);

        $user_id;
        $fname;
        $mname;
        $lname;
        $gender;
        $contact;
        $email;
        $user;
        $pass;
        //friends here
        $my_request;
        foreach($query->result() as $row)
        {
            $user_id = $row->User_Id;
            $fname = $row->fname;
            $mname = $row->mname;
            $lname = $row->lname;
            $gender = $row->gender;
            $contact = $row->contact_no;
            $email = $row->email;
            $user = $row->username;
            $pass = $row->password;
            $my_request = $row->my_request;
        }
        $set = array(
            'user_id'=>$user_id,
            'fname'=>$fname,
            'mname'=>$mname,
            'lname' =>$lname,
            'gender'=>$gender,
            'contact_no'=>$contact,
            'email'=>$email,
            'username'=>$user,
            'password'=>$pass,
            'my_request'=>$my_request
        );
        $this->session->set_userdata($set);
    }
    public function get_Acronym($user_id)
    {
        $sql = "Select * from tbl_accounts where id = ".$user_id;
        $query = $this->db->query($sql);
        $row = $query->row();
        $last_name = $row->lname;
        $first_name = $row->fname;
        $f = lcfirst($first_name);
        $s = ucfirst($last_name);
        $acr = $s[0].''.$f[0];
        return $acr;
    }
    public function set_session($id,$username,$fullname,$acro)
    {
        $newdata = array(
            'id'=>$id,
            'username'=>$username,
            'fullname'=>$fullname,
            'acro'=>$acro,
            'logged_in'=>TRUE
        );
        $this->session->set_userdata($newdata);
    }
    public function unset_session()
    {
        session_destroy();
    }
    public function check_oldpass($id,$pass)
    {
        $query = $this->db->get_where("tbl_accounts",array("User_Id"=>$id,"password"=>$pass));
        return $query->result();
    }
    public function changepass($id,$newpass)
    {
        $this->db->set('password',$newpass);
        $this->db->where('User_Id', $id);
        $this->db->update('tbl_accounts');   
    }
    public function verify($email,$user)
    {
        $query = $this->db->get_where("tbl_accounts",array("username"=>$user,"email"=>$email));
        $rows = $query->num_rows();

        $User_id;
        $question;

        if($rows >= 1)
        {
            foreach($query->result() as $data)
            {
                $User_id = $data->User_Id;
                $question = $data->sec_ques;
            }
            $_SESSION["user_name"] = $user;
            $_SESSION["user_id_forgot"] = $User_id;
            $_SESSION["security_question"] = $question;

            return true;
        }  
    }
    public function verify_answer($id,$question,$answer)
    {
        $query = $this->db->get_where("tbl_accounts",array("User_Id"=>$id,"sec_ques"=>$question,"sec_ans"=>$answer));
        $rows = $query->num_rows();

        $User_id;

        if($rows >= 1)
        {
            foreach($query->result() as $data)
            {
                $User_id = $data->User_Id;
            }

            return true;
        } 
    }
    public function resetted($id,$newdata)
    {
        $this->db->set('password',$newdata);
        $this->db->where('User_Id', $id);
        $this->db->update('tbl_accounts');  
    }
    public function get_search_profile($id)
    {
        $query = $this->db->get_where("tbl_accounts",array("User_id"=>$id));
        $rows = $query->num_rows();

        $fn;
        $mn;
        $ln;
        $gender;
        $contact_n;
        $email;
        $acc_id;
        $f_request;
        if($rows >= 1)
        {
            foreach($query->result() as $data)
            {
                $fn = $data->fname;
                $mn = $data->mname;
                $ln = $data->lname;
                $gender = $data->gender;
                $contact_n = $data->contact_no;
                $email = $data->email;
                $acc_id = $data->User_Id;
                $f_request = $data->friends;

            }
            $first_n = strtolower($fn);
            $second_n = strtoupper($ln);
            $acr = $second_n[0].''.$first_n[0];
            $newdata = array(
                's_id'=>$acc_id,
                's_acro'=>$acr,
                's_fname'=>$fn,
                's_mname'=>$mn,
                's_lname'=>$ln,
                's_gender'=>$gender,
                's_contact'=>$contact_n,
                's_email'=>$email,
                'friend_request'=>$f_request
            );

            $this->session->set_userdata($newdata);

            return true;
        } 
    }
    public function send_friend_request($data)
    {
        if($this->db->insert("tbl_connections",$data))
        { 
            return true;
        }
    }
    public function notify_request($data)
    {
        $this->db->insert("tbl_notifications",$data);
    }
    public function check_friend($visited_id,$visitor_id)
    {
        $sql = "select * from tbl_connections where account_id = '".$visited_id."' and visitor_id = '".$visitor_id."' and request = 'pending' or account_id = '".$visitor_id."' and visitor_id = '".$visited_id."' and request ='pending'";
        $query = $this->db->query($sql);
        $rows = $query->num_rows();
        if($rows>= 1 )
        {
            $_SESSION["status_"] = "pending";

            $sql_ = "select * from tbl_connections where receiver = '".$visited_id."' and sender = '".$visitor_id."' and request = 'pending'";
            $query_ = $this->db->query($sql_);
            $rows_ = $query_->num_rows();

            if($rows_ >= 1)
            {
                $_SESSION["friend_request_sent"] = "yes";
            }
            else
            {
                $_SESSION["accept_request"]  = "yes";
            }
            return true;
            
        }
        $sql_s = "select * from tbl_connections where account_id = '".$visited_id."' and visitor_id = '".$visitor_id."' and request = 'accepted' or account_id = '".$visitor_id."' and visitor_id = '".$visited_id."' and request ='accepted'";
        $query_s = $this->db->query($sql_s);
        $rows_s = $query_s->num_rows();
            if($rows_s>= 1 )
            {
                $_SESSION["status_"]  = "accepted";
                $_SESSION["accepted"] = "yes";
            }
            else
            {
                $_SESSION["status_"]  = ""; 
            }
    }
    public function accept_process($sender,$receiver)
    {
        $this->db->set('request','accepted');
        $this->db->where(array("sender"=>$sender,"receiver"=>$receiver));
        $this->db->or_where(array("sender"=>$receiver,"receiver"=>$sender));
        $this->db->update('tbl_connections');
        
        $_SESSION["accepted"] = "yes";
        $_SESSION["friend_request_sent"] = "";
        $_SESSION["accept_request"] = "";
        $_SESSION["status_"] = "accepted";
    }
    public function accept_backend($back_data)
    {
        $this->db->insert("tbl_connections",$back_data);
    }
    public function readed($sender,$receiver)
    {
        $this->db->set("res_action","read");
        $this->db->where(array("user_id"=>$receiver,"sender"=>$sender));
        $this->db->update("tbl_notifications");
    }
    public function update_notify_no($user_id,$rows)
    {
        $this->db->set("notifications",$rows);
        $this->db->where(array("user_id"=>$user_id));
        $this->db->update("tbl_accounts");   
    }
    public function count_noti($id)
    {
        $query = $this->db->get_where("tbl_notifications",array("user_id"=>$id,"res_action"=>"unread"));
        $rows = $query->num_rows();
        return $rows;
    }
    public function get_post_num()
    {
        $query = $this->db->get_where("tbl_feed",array("type_p"=>'1'));
        $rows = $query->num_rows();
        return $rows;
    }
    public function friendcount($user_id)
    {
        $query = $this->db->get_where("tbl_connections",array("account_id"=>$user_id,"request"=>"accepted"));
        $rows = $query->num_rows();
        return $rows;
    }
    public function get_message_id($sender,$receiver)
    {
       $ssql = "Select * from tbl_connections where sender = '".$sender."' and receiver = '".$receiver."' or receiver = '".$sender."' and sender = '".$receiver."'";
        $res = $this->db->query($ssql);
       $message_id;
       foreach($res->result() as $data)
       {
           $message_id = $data->message_id;
       }
       return $message_id;
       
    }
    public function send_message($data)
    {
        $this->db->insert("tbl_conversations",$data);
    }
    public function insertpost($data)
    {
        $this->db->insert("tbl_feed",$data);
    }
    public function insertcomment($data)
    {
        $this->db->insert("tbl_feed",$data);
    }
    public function insertevent($data)
    {
        $this->db->insert("tbl_events",$data);
    }
    public function join_e($data)
    {
        $this->db->insert("tbl_events",$data);
    }
    public function get_event_info($post_id)
    {
        $query = $this->db->get_where("tbl_events",array("event_id"=>$post_id));
        $rows = $query->num_rows();
        if($rows >= 1)
        {
            foreach($query->result() as $data)
            {
                $_SESSION["event_id"] = $data->event_id;
                $_SESSION["event_title"] = $data->title;
                $_SESSION["event_date"] = $data->target_date;
                $_SESSION["event_place"] =$data->place;
                $_SESSION["event_duration"] = $data->duration;
    
            }
        }
    }
    public function check_user_events($user_id,$post_id)
    {
        $sql = "select * from tbl_events where user_id = '".$user_id."' and event_id = '".$post_id."' and respond = 'joined'";
        $query = $this->db->query($sql);
        $row = $query->num_rows();
        if($row >= 1)
        {
            $_SESSION["going"] = "yes";
        }
        else
        {
            $_SESSION["going"] = "pending";
        }
    }
    public function get_mysched($user_id)
    {
        $qry = $this->db->get_where("tbl_events",array("user_id"=>$user_id));
        $nums = $qry->num_rows();
        return $nums;
    }
    public function cancel_evt($post_id,$user_id)
    {
        $query = "DELETE from tbl_events where event_id = '".$post_id."' and user_id = '".$user_id."' ";
        $this->db->query($query);
    }
    public function getinfo($post_id)
    {
        $sql = $this->db->get_where("tbl_feed",array("post_id"=>$post_id,"type_p"=>'1'));
        
        foreach($sql->result() as $data)
        {
            $_SESSION["post_id"] = $data->post_id;
            $_SESSION["post_content"] = $data->content;
            $_SESSION["post_comments"] = $data->comments;
            $_SESSION["post_sender"] = $data->sender;
            $_SESSION["post_date_c"] = $data->date_c;
        }

    }
}
