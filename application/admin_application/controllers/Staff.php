<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->load->model('Staffmodel','smodel');
        $this->data['st_menuopen'] = 'menu-open';
        $this->data['st_menuactive'] = 'active';
        $this->data['pscat_menuactive'] = 'active';
    }
    public function index()
    {
          // echo "hii";exit();
        $this->data['title']      = 'List All Login Details';
        $config['base_url']          = base_url().'staff';        
        $config['total_rows']        = $this->smodel->count_all_row();

        foreach ($this->config->item('pagination') as $key => $value)
        {
            $config[$key] = $value;
        }

        $page = $this->uri->segment(2);
        $page = $page > 0 ? (($page - 1) * $config["per_page"]) : $page;
        $this->pagination->initialize($config);        

        $this->data['links'] = $this->pagination->create_links();        
        $this->data['result'] = $this->smodel->get_all_staff($config["per_page"], $page);
       // print_r($this->data['result']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('staff/all_staff',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function add()
    {
         // echo "string";exit();
        $this->data['title']='Add Login';
        $this->data['action']           =   'staff/insert';
        $this->data['btn_label']        =   'Submit';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->load->view('theme/header',$this->data);
        $this->load->view('staff/add_staff',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function insert()
    {
        // echo "string";exit();
        $this->data['title']='Add Login';
        $this->form_validation->set_rules("stf_name", "Staff Name", "trim|required");
        $this->form_validation->set_rules("stf_desg", "Staff Designation ", "trim|required");
        $this->form_validation->set_rules("email", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        // $this->form_validation->set_rules("zone", "Zone", "trim|required");
      

          if ($this->form_validation->run() == TRUE)
         {
            if($this->smodel->insert_staff()){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('staff'));
        }else{
            $this->add();
        }

    }

    public function edit($u_id='')
    {
        if($u_id==''){
            redirect(base_url('staff'));
        }
        $this->data['title']        ='Edit Login';
        $this->data['action']       =   'staff/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        // echo $id;exit();
        $this->data['btn_label']    =   'Update';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->data['row']          = $this->smodel->get_one_row($id);
        // print_r($this->data['row']);exit();
        if($this->data['row'] ==null)
        {
            redirect(base_url("staff"));
        }
       else
       {
         $s_loc=$this->data['row'] ->loc_id;
        $this->data['row_local']          = $this->smodel->get_local($s_loc);
        // print_r($this->data['row_local']);exit();
        $s_di=$this->data['row'] ->dis_id;
        $this->data['row_dist']          = $this->smodel->get_dist($s_di);
        // print_r($this->data['row_dist']   );exit;
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->load->view('theme/header',$this->data);
        $this->load->view('staff/add_staff',$this->data);
        $this->load->view('theme/footer',$this->data);
       }
    }
    public function update($u_id='')
    {
        if($u_id==''){
            redirect(base_url('staff'));
        }
        $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Edit Login';
        $this->form_validation->set_rules("stf_name", "Staff Name", "trim|required");
        // $this->form_validation->set_rules("stf_type", "Staff Type", "trim|required");
        $this->form_validation->set_rules("stf_desg", "Staff Designation ", "trim|required");
        // $this->form_validation->set_rules("uname", "Username", "trim|required");
        // $this->form_validation->set_rules("password", "Password", "trim|required");
        if ($this->form_validation->run() == TRUE)
         {
            // echo "string";exit();
            if($this->smodel->update_staff($id)){
                $this->session->set_flashdata('success_msg', 'Successfully Updated.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('staff'));
        }else{
            // echo "ggggg";exit();
            $this->edit($u_id);
        }

    }

    public function delete($u_id='')
    {
        // echo $u_id;exit;
        if($u_id==''){
            redirect(base_url('staff'));
        }
         $id = $this->common_functions->url_decode($u_id);
         // echo $id;exit();
        $this->data['title']='Delete Login';
        $this->smodel->del_staff($id);
        $this->session->set_flashdata('success_msg', 'Successfully deleted item.');
        redirect(base_url('staff'));
    }
    public function active_inactive($u_id='',$status=''){
        if($u_id==''){
            redirect(base_url('staff'));
        }
         $id = $this->common_functions->url_decode($u_id);
         // echo $id;exit();
        $this->data['title']='Delete Login';
        $this->smodel->active_inactive($id,$status);
        $this->session->set_flashdata('success_msg', 'Successfully changed status.');
        redirect(base_url('staff'));
    }
     public function get_local_centers(){
        $cat_id =   $this->input->post('district');
        $data = $this->smodel->get_local_center_by_id($cat_id);
        // print_r($data);exit();
        echo json_encode($data);
    }
    public function checkUser()
    {
      
        $email=$this->input->post('email');
        
        // $this->load->model('AjaxModel');
        
        $result=$this->smodel->checkuser($email);
        // print_r($result);
        if($result)
        {
        echo  1;    
        }
        else
        {
        echo  0;    
        }
    }   
   
}
