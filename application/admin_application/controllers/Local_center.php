<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local_center extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->data['lo_menuopen'] = 'menu-open';
        $this->data['lo_menuactive'] = 'active';
        $this->load->model('Local_centermodel','lmodel');
    }
	public function index()
	{
         // echo "hii";exit();
        $this->data['title']      = 'List All Local Centers';
        $config['base_url']          = base_url().'local_center';        
        $config['total_rows']        = $this->lmodel->count_all_row();
        foreach ($this->config->item('pagination') as $key => $value)
        {
            $config[$key] = $value;
        }

        $page = $this->uri->segment(2);
        $page = $page > 0 ? (($page - 1) * $config["per_page"]) : $page;
        $this->pagination->initialize($config);        

        $this->data['links'] = $this->pagination->create_links();        
        $this->data['result'] = $this->lmodel->get_all_local_centers($config["per_page"], $page);
       // print_r($this->data['result']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('locations/all_local_centers',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function add()
    {
        // echo "string";exit();
        $this->data['title']='Add Local Centers';
        
        $this->data['action']           =   'local_center/insert';
        $this->data['btn_label']        =   'Submit';
        $this->data['zone']  =   $this->lmodel->get_active_zones();
        $this->load->view('theme/header',$this->data);
        $this->load->view('locations/add_local_centers',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
     public function insert()
    {
        // echo "string";exit();
        $this->data['title']='Add Local Center';
         $this->form_validation->set_rules("local_center", "Local center ", "trim|required");
        // $this->form_validation->set_rules("district", "District Name", "trim|required");
        $this->form_validation->set_rules("zone", "Zone Name", "trim|required");
          if ($this->form_validation->run() == TRUE)
         {
            // echo "eeee";exit;
            if($this->lmodel->insert_local_center()){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('local_center'));
        }else{
            // echo "sssss";exit;
            $this->add();
        }

    }
     public function active_inactive($u_id='',$status=''){
        if($u_id==''){
            redirect(base_url('local_center'));
        }
         $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Delete Local Center';
        $this->lmodel->active_inactive($id,$status);
        $this->session->set_flashdata('success_msg', 'Successfully changed status.');
        redirect(base_url('local_center'));
    }
    public function single_local_center($u_id='')
    {
        if($u_id==''){
            redirect(base_url('local_center'));
        }
        $this->data['title']        ='Single Local Center';
        // $this->data['action']       =   'local_center/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        $this->data['btn_label']    =   'Update';
        $this->data['row']          = $this->lmodel->get_one_row($id);
        // print_r($this->data['row']);
        $loc_di=$this->data['row'] ->d_id;
        $this->data['row_dist']          = $this->lmodel->get_dist($loc_di);

        $this->data['zone']  =   $this->lmodel->get_active_zones();
        // print_r($this->data['row']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('locations/single_local_center',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function edit($u_id='')
    {
        if($u_id==''){
            redirect(base_url('local_center'));
        }
        $this->data['title']        ='Edit Local Center';
        $this->data['action']       =   'local_center/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        $this->data['btn_label']    =   'Update';
        $this->data['row']          = $this->lmodel->get_one_row($id);
        // print_r($this->data['row']);
        $loc_di=$this->data['row'] ->d_id;
        $this->data['row_dist']          = $this->lmodel->get_dist($loc_di);

        $this->data['zone']  =   $this->lmodel->get_active_zones();
        // print_r($this->data['row']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('locations/add_local_centers',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function update($u_id='')
    {
        if($u_id==''){
            redirect(base_url('local_center'));
        }
        $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Edit Local Center';
         $this->form_validation->set_rules("local_center", "Local center ", "trim|required");
        // $this->form_validation->set_rules("district", "District Name", "trim|required");
        $this->form_validation->set_rules("zone", "Zone Name", "trim|required");
          if ($this->form_validation->run() == TRUE)
         {
            if($this->lmodel->update_local_center($id)){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('local_center'));
        }else{
            $this->edit($u_id);
        }

    }

    public function delete($u_id='')
    {
        if($u_id==''){
            redirect(base_url('local_center'));
        }
         $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Delete Local Center';
        $this->lmodel->del_localcenter($id);
        $this->session->set_flashdata('success_msg', 'Successfully deleted item.');
        redirect(base_url('local_center'));
    }
      public function get_district(){
        $cat_id =   $this->input->post('zone');
        $data = $this->lmodel->get_district_by_id($cat_id);
        echo json_encode($data);
    }
    public function search()
    {
         // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Search Local Center';
        $this->data['action']           =   'local_center/search';
        $this->data['btn_label']        =   'Filter';
        $this->data['zone']  =   $this->lmodel->get_active_zones();

        $this->data['result'] = $this->lmodel->get_search_results();
        // print_r($this->data['result'] );exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('locations/search_local_center',$this->data);
        $this->load->view('theme/footer',$this->data);
    }

}
