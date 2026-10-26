<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->data['zon_menuopen'] = 'menu-open';
        $this->data['zon_menuactive'] = 'active';
        $this->load->model('Zonemodel','zone');
    }
	public function index()
	{
         // echo "hii";exit();
        $this->data['title']      = 'List All Zones';
        $config['base_url']          = base_url().'zone';        
        $config['total_rows']        = $this->zone->count_all_zone();
        foreach ($this->config->item('pagination') as $key => $value)
        {
            $config[$key] = $value;
        }

        $page = $this->uri->segment(2);
        $page = $page > 0 ? (($page - 1) * $config["per_page"]) : $page;
        $this->pagination->initialize($config);        

        $this->data['links'] = $this->pagination->create_links();        
        $this->data['result'] = $this->zone->get_all_zone($config["per_page"], $page);
       // print_r($data);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('zone/all_zone',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
    public function add()
    {
        $this->data['title']='Add Zone';
        $this->data['action']           =   'zone/insert';
        $this->data['btn_label']        =   'Submit';
        $this->load->view('theme/header',$this->data);
        $this->load->view('zone/add_zone',$this->data);
        $this->load->view('theme/footer',$this->data);
    }
     public function insert()
    {
        $this->data['title']='Add Zone';
        $this->form_validation->set_rules("zone", "Zone Name", "trim|required");
        $this->form_validation->set_rules("pre_name", "President Name", "trim|required");
        $this->form_validation->set_rules("pre_phone", "President Phone", "trim|required");
        $this->form_validation->set_rules("sec_name", "Secretory Name", "trim|required");
        $this->form_validation->set_rules("sec_phone", "Secretory Phone", "trim|required");
        $this->form_validation->set_rules("jsec_name", "Join Secretory Name", "trim|required");
        $this->form_validation->set_rules("jsec_phone", "Join Secretory Phone", "trim|required");
        $this->form_validation->set_rules("tre_name", "Treasurer Name", "trim|required");
        $this->form_validation->set_rules("tre_phone", "Treasurer Phone Number", "trim|required");

        if ($this->form_validation->run() == TRUE)
         {
            if($this->zone->insert_zone()){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('zone'));
        }else{
            $this->add();
        }

    }
     public function active_inactive($u_id='',$status=''){
        if($u_id==''){
            redirect(base_url('zone'));
        }
         $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Delete Zone';
        $this->zone->active_inactive($id,$status);
        $this->session->set_flashdata('success_msg', 'Successfully changed status.');
        redirect(base_url('zone'));
    }
    public function edit($u_id='')
    {
        if($u_id==''){
            redirect(base_url('zone'));
        }
        $this->data['title']        ='Edit Zone';
        $this->data['action']       =   'zone/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        $this->data['btn_label']    =   'Update';
        $this->data['row']          = $this->zone->get_one_row($id);
        // print_r($this->data['row']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('zone/add_zone',$this->data);
        $this->load->view('theme/footer',$this->data);
    } 
    public function single_zone($u_id='')
    {
        if($u_id==''){
            redirect(base_url('zone'));
        }
        $this->data['title']        ='Single Zone';
        $this->data['action']       =   'zone/update/'.$u_id;
        $id = $this->common_functions->url_decode($u_id);
        $this->data['btn_label']    =   'Update';
        $this->data['row']          = $this->zone->get_one_row($id);
        // print_r($this->data['row']);exit;
        $this->load->view('theme/header',$this->data);
        $this->load->view('zone/single_zone',$this->data);
        $this->load->view('theme/footer',$this->data);
    }

    public function update($u_id='')
    {
        if($u_id==''){
            redirect(base_url('zone'));
        }
        $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Edit Zone';
        $this->form_validation->set_rules("zone", "Zone Name", "trim|required");
        $this->form_validation->set_rules("pre_name", "President Name", "trim|required");
        $this->form_validation->set_rules("pre_phone", "President Phone", "trim|required");
        $this->form_validation->set_rules("sec_name", "Secretory Name", "trim|required");
        $this->form_validation->set_rules("sec_phone", "Secretory Phone", "trim|required");
        $this->form_validation->set_rules("jsec_name", "Join Secretory Name", "trim|required");
        $this->form_validation->set_rules("jsec_phone", "Join Secretory Phone", "trim|required");
        $this->form_validation->set_rules("tre_name", "Treasurer Name", "trim|required");
        $this->form_validation->set_rules("tre_phone", "Treasurer Phone Number", "trim|required");
        if ($this->form_validation->run() == TRUE)
         {
            if($this->zone->update_zone($id)){
                $this->session->set_flashdata('success_msg', 'Successfully added.');
            }else{
            $this->session->set_flashdata('error_msg', 'Please try again..');
            }
            redirect(base_url('zone'));
        }else{
            $this->edit($u_id);
        }

    }

    public function delete($u_id='')
    {
        if($u_id==''){
            redirect(base_url('zone'));
        }
         $id = $this->common_functions->url_decode($u_id);
        $this->data['title']='Delete Zone';
        $this->zone->del_zone($id);
        $this->session->set_flashdata('success_msg', 'Successfully deleted item.');
        redirect(base_url('zone'));
    }
}
