<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Loginmodel','loginmodel');
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function admin_login() {
        //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");
          if ($this->form_validation->run() == TRUE)
         {
            $username = $this->input->post('txt_username');
            $password = $this->input->post('txt_password');
            
           $login_id = $this->loginmodel->login_valid($username, $password);
            if ($login_id) {

                $this->session->set_userdata('admin_id', $login_id);
                // $admn_id=$this->session->userdata('admin_id');
               // $admin_lev =   $this->loginmodel->get_admin_details($login_id);
                $this->data['admin_details']  =   $this->loginmodel->get_admin_details($login_id);
                // print_r($this->data['admin_details'] );
               $admin_name=$this->data['admin_details']->name;
               $admin_desig=$this->data['admin_details']->designation;
               $admin_lev=$this->data['admin_details']->admin_level;
            $this->session->set_userdata('admin_level' ,$admin_lev);
            $this->session->set_userdata('name' ,$admin_name);
            $this->session->set_userdata('designation' ,$admin_desig);
            
                redirect(base_url('dashboard'));
            } else {
 
                $this->session->set_flashdata('error_msg', 'Invalid Username/Password');
                redirect(base_url('login'));
            }
        } else {
            $this->load->view('login');
        }
    }
 
    public function logout() {
        $this->session->unset_userdata('admin_id');
        redirect(base_url('login'));
    }
}
