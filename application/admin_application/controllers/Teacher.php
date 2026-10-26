<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->load->model('Teachermodel','tmodel');
        $this->load->model('Staffmodel','smodel');
        $this->load->model('Studentmodel','studmodel');
        $this->data['te_menuopen'] = 'menu-open';
        $this->data['tea_menuactive'] = 'active';
        $this->data['pscat_menuactive'] = 'active';
    }
    public function index()
    {
          // echo "hii";exit();
        $this->data['title']      = 'List All Teachers';
        $config['base_url']          = base_url().'students';        
        $config['total_rows']        = $this->tmodel->count_all_row();
        // print_r($config['pagination']);exit;

       foreach ($this->config->item('pagination') as $key => $value)
        {
            $config[$key] = $value;
        }

        $page = $this->uri->segment(2);
        // echo $page;exit;
        $page = $page > 0 ? (($page - 1) * $config["per_page"]) : $page;
        $this->pagination->initialize($config);        

        $this->data['links'] = $this->pagination->create_links();   
         
        $this->data['result'] = $this->tmodel->get_all_teachers($config["per_page"], $page);
       // print_r($this->data['result']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('teacher/all_teachers',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function add()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Add Teacher';
        $this->data['action']           =   'teacher/insert';
        $this->data['btn_label']        =   'Submit';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->data['std_class']  =   $this->tmodel->get_active_classes();
        $this->data['admin_details']  =   $this->tmodel->get_admin_details($admn_id);
        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->tmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->tmodel->get_active_locat($distr);
        // print_r($this->data['loc']);exit();
        $this->load->view('theme/header',$this->data);
        $this->load->view('teacher/add_teacher',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function insert()
    {
        // echo "string";exit();
        $this->data['title']='Add Teacher';
        $this->form_validation->set_rules("t_name", "Teacher  Name", "trim|required");
        $this->form_validation->set_rules("t_age", " Age", "trim|required");
        $this->form_validation->set_rules("t_phone", "Phone number ", "trim|required");
        

        if ($this->form_validation->run() == TRUE)
         {
            // echo "string";exit();
            if($this->tmodel->insert_teacher()){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('teacher'));
        }else{
            // echo "fgfgfh";exit();
            $this->add();
        }

    }

    public function edit($u_id='')
    {
        // echo $u_id;exit();
        $admn_id=$this->session->userdata('admin_id');
        if($u_id==''){
            redirect(base_url('teacher'));
        }
        $this->data['title']        ='Edit Teacher';
        $this->data['action']       =   'teacher/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        // echo $id;exit();
        $this->data['btn_label']    =   'Update';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->data['std_class']  =   $this->tmodel->get_active_classes();
        $this->data['row']          = $this->tmodel->get_one_row($id);
        $t_loc=$this->data['row'] ->t_center;
        $this->data['row_local']          = $this->tmodel->get_local($t_loc);

        $t_di=$this->data['row'] ->t_district;
        $this->data['row_dist']          = $this->tmodel->get_dist($t_di);
        // print_r($this->data['row']   );exit;
        $this->data['admin_details']  =   $this->tmodel->get_admin_details($admn_id);

        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->tmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->tmodel->get_active_locat($distr);
        // print_r($this->data['loc']);exit();
        $this->load->view('theme/header',$this->data);
        $this->load->view('teacher/add_teacher',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
     public function view($u_id='')
    {
        // echo $u_id;exit();
        $admn_id=$this->session->userdata('admin_id');
        if($u_id==''){
            redirect(base_url('teacher'));
        }
        $this->data['title']        =' Teacher';
        $this->data['action']       =   'teacher/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        // echo $id;exit();
        $this->data['btn_label']    =   'Update';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->data['std_class']  =   $this->tmodel->get_active_classes();
        $this->data['row']          = $this->tmodel->get_one_row($id);
        $t_loc=$this->data['row'] ->t_center;
        $this->data['row_local']          = $this->tmodel->get_local($t_loc);

        $t_di=$this->data['row'] ->t_district;
        $this->data['row_dist']          = $this->tmodel->get_dist($t_di);
        // print_r($this->data['row']   );exit;
        $this->data['admin_details']  =   $this->tmodel->get_admin_details($admn_id);

        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->tmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->tmodel->get_active_locat($distr);
        // print_r($this->data['loc']);exit();
        $this->load->view('theme/header',$this->data);
        $this->load->view('teacher/single_teacher',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function update($u_id='')
    {
        if($u_id==''){
            redirect(base_url('teacher'));
        }
        $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Edit Teacher';
      
        $this->form_validation->set_rules("t_name", "Teacher  Name", "trim|required");
        $this->form_validation->set_rules("t_age", " Age", "trim|required");
        $this->form_validation->set_rules("t_phone", "Phone number ", "trim|required");

          if ($this->form_validation->run() == TRUE)
         {
            if($this->tmodel->update_teacher($id)){
                $this->session->set_flashdata('success_msg', 'Successfully Updated.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('teacher'));
        }else{
            $this->edit($u_id);
        }

    }

    public function delete($u_id='')
    {
        // echo $u_id;exit;
        if($u_id==''){
            redirect(base_url('teacher'));
        }
         $id = $this->common_functions->url_decode($u_id);
         // echo $id;exit();
        $this->data['title']='Delete Teacher';
        $this->tmodel->del_teacher($id);
        $this->session->set_flashdata('success_msg', 'Successfully deleted item.');
        redirect(base_url('teacher'));
    }
    public function active_inactive($u_id='',$status=''){
        if($u_id==''){
            redirect(base_url('teacher'));
        }
         $id = $this->common_functions->url_decode($u_id);

        $this->data['title']='Delete Teacher';
        $this->tmodel->active_inactive($id,$status);
        $this->session->set_flashdata('success_msg', 'Successfully changed status.');
        redirect(base_url('teacher'));
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
        if($result)
        {
        echo  1;    
        }
        else
        {
        echo  0;    
        }
    }   
    public function search()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Search Teacher';
        $this->data['action']           =   'teacher/search';
        $this->data['btn_label']        =   'Filter';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        
        $this->data['std_class']  =   $this->tmodel->get_active_classes();
        $this->data['admin_details']  =   $this->tmodel->get_admin_details($admn_id);
        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->tmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->tmodel->get_active_locat($distr);

        $this->data['result'] = $this->tmodel->get_search_results();
        // print_r($this->data['result'] );exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('teacher/search_teacher',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
     public function search_report()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Search Teacher Report';
        $this->data['action']           =   'teacher/search_report';
        $this->data['btn_label']        =   'Filter';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        
        $this->data['std_class']  =   $this->studmodel->get_active_classes();
        $this->data['admin_details']  =   $this->studmodel->get_admin_details($admn_id);
        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->studmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->studmodel->get_active_locat($distr);
        
        $this->data['result'] = $this->tmodel->get_search_results();
        // print_r($this->data['result'] );exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('teacher/search_report',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    

}
