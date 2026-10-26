<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->data['dds_menuopen'] = 'menu-open';
        $this->data['ds_menuactive'] = 'active';
        $this->load->model('Districtmodel','dmodel');
    }
	public function index()
	{
         // echo "hii";exit();
        $this->data['title']      = 'List Districts';
        $config['base_url']          = base_url().'district';        
        $config['total_rows']        = $this->dmodel->count_all_row();
        foreach ($this->config->item('pagination') as $key => $value)
        {
            $config[$key] = $value;
        }

        $page = $this->uri->segment(2);
        $page = $page > 0 ? (($page - 1) * $config["per_page"]) : $page;
        $this->pagination->initialize($config);        

        $this->data['links'] = $this->pagination->create_links();        
        $this->data['result'] = $this->dmodel->get_all_district($config["per_page"], $page);
       // print_r($data);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('district/all_district',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function add()
    {
        $this->data['title']='Add District';
        $this->data['action']           =   'district/insert';
        $this->data['btn_label']        =   'Submit';
        $this->data['zone']  =   $this->dmodel->get_active_zones();
        $this->load->view('theme/header',$this->data);
        $this->load->view('district/add_district',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
     public function insert()
    {
        // echo "string";exit();
        $this->data['title']='Add District';
        $this->form_validation->set_rules("district", "District Name", "trim|required");
        $this->form_validation->set_rules("zone_id", "Zone Name", "trim|required");
        $this->form_validation->set_rules("pre_name", "President Name", "trim|required");
        $this->form_validation->set_rules("pre_phone", "President Phone Number", "trim|required");
        $this->form_validation->set_rules("sec_name", "Secretary Name", "trim|required");
        $this->form_validation->set_rules("sec_phone", "Secretary Phone Number", "trim|required");
        if ($this->form_validation->run() == TRUE)
         {
            if($this->dmodel->insert_district()){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('district'));
        }else{
            $this->add();
        }

    }
     public function active_inactive($u_id='',$status=''){
        if($u_id==''){
            redirect(base_url('district'));
        }
         $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Delete District';
        $this->dmodel->active_inactive($id,$status);
        $this->session->set_flashdata('success_msg', 'Successfully changed status.');
        redirect(base_url('district'));
    }
    public function edit($u_id='')
    {
        if($u_id==''){
            redirect(base_url('district'));
        }
        $this->data['title']        ='Edit District';
        $this->data['action']       =   'district/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        $this->data['btn_label']    =   'Update';
        $this->data['row']          = $this->dmodel->get_one_row($id);
        $this->data['zone']  =   $this->dmodel->get_active_zones();
        // print_r($this->data['row']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('district/add_district',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function update($u_id='')
    {
        if($u_id==''){
            redirect(base_url('district'));
        }
        $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Edit District';
        $this->form_validation->set_rules("district", "District Name", "trim|required");
        $this->form_validation->set_rules("zone_id", "Zone Name", "trim|required");
        $this->form_validation->set_rules("pre_name", "President Name", "trim|required");
        $this->form_validation->set_rules("pre_phone", "President Phone Number", "trim|required");
        $this->form_validation->set_rules("sec_name", "Secretary Name", "trim|required");
        $this->form_validation->set_rules("sec_phone", "Secretary Phone Number", "trim|required");
        if ($this->form_validation->run() == TRUE)
         {
            if($this->dmodel->update_district($id)){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('district'));
        }else{
            $this->edit($u_id);
        }

    }

    public function delete($u_id='')
    {
        if($u_id==''){
            redirect(base_url('district'));
        }
         $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Delete District';
        $this->dmodel->del_district($id);
        $this->session->set_flashdata('success_msg', 'Successfully deleted item.');
        redirect(base_url('district'));
    }
    public function search()
    {
         // echo "string";exit();
        
        $admn_id=$this->session->userdata('admin_id');
        $this->data['title']='Search  Districts';
        $this->data['action']           =   'district/search';
        $this->data['btn_label']        =   'Filter';
        $this->data['zone']  =   $this->dmodel->get_active_zones();

        $this->data['result'] = $this->dmodel->get_search_results();
        // print_r($this->data['result'] );exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('district/search_district',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
}
