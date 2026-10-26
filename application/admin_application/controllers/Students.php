<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->load->model('Studentmodel','studmodel');
        $this->load->model('Staffmodel','smodel');
        $this->data['stud_menuopen'] = 'menu-open';
        $this->data['stud_menuactive'] = 'active';
        $this->data['pscat_menuactive'] = 'active';
    }
    public function index()
    {
          // echo "hii";exit();
        
        
       // print_r(  $config['admin_det']);exit;
        $this->data['title']      = 'List All Students';
        $config['base_url']          = base_url().'students';  
        $lev=$this->session->userdata('admin_level');      
        $config['total_rows']        = $this->studmodel->count_all_row();
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
        $admin=$this->session->userdata('admin_id');
        $this->data['admin_det'] = $this->studmodel->get_admin_details($admin);   
         // print_r($data['admin_det']);exit;
        $this->data['result'] = $this->studmodel->get_all_students($config["per_page"], $page);
       // print_r($this->data['result']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('student/all_student',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function add()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Add Student';
        $this->data['action']           =   'students/insert';
        $this->data['btn_label']        =   'Submit';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        
        $this->data['std_class']  =   $this->studmodel->get_active_classes();
        $this->data['admin_details']  =   $this->studmodel->get_admin_details($admn_id);
        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->studmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->studmodel->get_active_locat($distr);
        // print_r($this->data['loc']);exit();
       $this->load->view('theme/header',$this->data);
        $this->load->view('student/add_student',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function insert()
    {
        // echo "string";exit();
        $this->data['title']='Add Student';
        $this->form_validation->set_rules("std_name", "Student  Name", "trim|required");
        $this->form_validation->set_rules("std_dob", "Student  Date of Birth", "trim|required");
        $this->form_validation->set_rules("std_class", "Student Class ", "trim|required");
        

        if ($this->form_validation->run() == TRUE)
         {
            // echo "string";exit();
            if($this->studmodel->insert_student()){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('students'));
        }else{
            // echo "fgfgfh";exit();
            $this->add();
        }

    }
    public function single_student($u_id='')
    {
        // echo $u_id;exit();
        $admn_id=$this->session->userdata('admin_id');
        if($u_id==''){
            redirect(base_url('students'));
        }
        $this->data['title']        ='View Student';
        // $this->data['action']       =   'students/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        // echo $id;exit();
        $this->data['btn_label']    =   'Update';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->data['std_class']  =   $this->studmodel->get_active_classes();
        $this->data['row']          = $this->studmodel->get_one_row($id);
        // print_r($this->data['row'] );exit();
        $std_loc=$this->data['row'] ->std_local;
        $this->data['row_local']          = $this->studmodel->get_local($std_loc);

        $std_di=$this->data['row'] ->std_district;
        $this->data['row_dist']          = $this->studmodel->get_dist($std_di);

        $this->data['admin_details']  =   $this->studmodel->get_admin_details($admn_id);

        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->studmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->studmodel->get_active_locat($distr);
        // print_r($this->data['loc']);exit();
        $this->load->view('theme/header',$this->data);
        $this->load->view('student/single_student',$this->data);
        $this->load->view('theme/footer',$this->data);
    }

    public function edit($u_id='')
    {
        // echo $u_id;exit();
        $admn_id=$this->session->userdata('admin_id');
        if($u_id==''){
            redirect(base_url('students'));
        }
        $this->data['title']        ='Edit Student';
        $this->data['action']       =   'students/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        // echo $id;exit();
        $this->data['btn_label']    =   'Update';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        $this->data['std_class']  =   $this->studmodel->get_active_classes();
        $this->data['row']          = $this->studmodel->get_one_row($id);
        // print_r($this->data['row'] );exit();
        $std_loc=$this->data['row'] ->std_local;
        $this->data['row_local']          = $this->studmodel->get_local($std_loc);

        $std_di=$this->data['row'] ->std_district;
        $this->data['row_dist']          = $this->studmodel->get_dist($std_di);

        $this->data['admin_details']  =   $this->studmodel->get_admin_details($admn_id);

        $sdate= $this->data['admin_details']->start_date;
        $edate= $this->data['admin_details']->end_date;
         
        $cdate=date('Y-m-d');

         if(($cdate <= $sdate) && ($cdate <= $edate))
         {
             // echo "rrrr";exit;
            redirect(base_url('students'));
            
           
         }
         else
        {
             // echo "string";exit();
            $dis=$this->data['admin_details']->zon_id;
            $distr=$this->data['admin_details']->dis_id;
            $this->data['district']  =   $this->studmodel->get_active_districts($dis);
            $this->data['loc']  =   $this->studmodel->get_active_locat($distr);
            // print_r($this->data['loc']);exit();
            $this->load->view('theme/header',$this->data);
            $this->load->view('student/add_student',$this->data);
            $this->load->view('theme/footer',$this->data);
        }
        
    }
    public function update($u_id='')
    {
        if($u_id==''){
            redirect(base_url('students'));
        }
        $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Edit Students';
        $this->data['title']='Add Student';
        $this->form_validation->set_rules("std_name", "Student  Name", "trim|required");
        $this->form_validation->set_rules("std_dob", "Student  Date of Birth", "trim|required");
        $this->form_validation->set_rules("std_class", "Student Class ", "trim|required");
        // $this->form_validation->set_rules("std_proof", "AAdhaar Number", "trim|required");
          if ($this->form_validation->run() == TRUE)
         {
            if($this->studmodel->update_student($id)){
                $this->session->set_flashdata('success_msg', 'Successfully Updated.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('students'));
        }else{
            $this->edit($u_id);
        }

    }

    public function delete($u_id='')
    {
        // echo $u_id;exit;
        if($u_id==''){
            redirect(base_url('students'));
        }
         $id = $this->common_functions->url_decode($u_id);
         // echo $id;exit();
        $this->data['title']='Delete Students';
        $this->studmodel->del_student($id);
        $this->session->set_flashdata('success_msg', 'Successfully deleted item.');
        redirect(base_url('students'));
    }
    public function active_inactive($u_id='',$status=''){
        if($u_id==''){
            redirect(base_url('students'));
        }
         $id = $this->common_functions->url_decode($u_id);

        $this->data['title']='Delete Students';
        $this->studmodel->active_inactive($id,$status);
        $this->session->set_flashdata('success_msg', 'Successfully changed status.');
        redirect(base_url('students'));
    }
     public function get_local_centers(){
        $cat_id =   $this->input->post('district');
        $data = $this->smodel->get_local_center_by_id($cat_id);
        // print_r($data);exit();
        echo json_encode($data);
    }
   
    public function search()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Search Students';
        $this->data['action']           =   'students/search';
        $this->data['btn_label']        =   'Filter';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        
        $this->data['std_class']  =   $this->studmodel->get_active_classes();
        $this->data['admin_details']  =   $this->studmodel->get_admin_details($admn_id);
        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->studmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->studmodel->get_active_locat($distr);

        $this->data['result'] = $this->studmodel->get_search_results();
        // print_r($this->data['result'] );exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('student/search_student',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
     public function search_report()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Search Students';
        $this->data['action']           =   'students/search_report';
        $this->data['btn_label']        =   'Filter';
        $this->data['zone']  =   $this->smodel->get_active_zones();
        
        $this->data['std_class']  =   $this->studmodel->get_active_classes();
        $this->data['admin_details']  =   $this->studmodel->get_admin_details($admn_id);
        $dis=$this->data['admin_details']->zon_id;
        $distr=$this->data['admin_details']->dis_id;
        $this->data['district']  =   $this->studmodel->get_active_districts($dis);
        $this->data['loc']  =   $this->studmodel->get_active_locat($distr);
        
        $this->data['result'] = $this->studmodel->get_search_results();
        // print_r($this->data['result'] );exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('student/search_report',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    

}
