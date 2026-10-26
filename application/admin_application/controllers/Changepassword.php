<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->load->model('Changepasswordmodel','cpmodel');
        $this->data['cp_menuopen'] = 'menu-open';
        $this->data['cp_menuactive'] = 'active';
        $this->data['cp_menuactive'] = 'active';
    }
   
    public function index()
    {
         // echo "string";exit();
        $this->data['title']='Change Password';
        $this->data['action']           =   'changepassword/update_password';
        $this->data['btn_label']        =   'Submit';
        // $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->load->view('theme/header',$this->data);
        $this->load->view('changepassword',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
   
    public function update_password()
    {
       $this->form_validation->set_rules("cpass", "Current Password", "trim|required");
       $this->form_validation->set_rules("npass", "New Password ", "trim|required");
       $id=$this->session->userdata('admin_id');
       $this->data['row']  =   $this->cpmodel->get_admin_details($id);  
       $cpass=$this->data['row']->admin_pass;
       
        $this->data['title']='Change Password';
        $pass=$this->cpmodel->changepassword($cpass);
        if($pass==1)
        {
            $this->session->set_flashdata('success_msg', 'Successfully Changed Password.');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Current Password not currect....');
        }
        
        redirect(base_url('changepassword'));
    }
}
