<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_id'))
            redirect(base_url('login'));
        $this->data['dash_menuopen'] = 'menu-open';
        $this->data['dash_smenuactive'] = 'active';
        $this->load->model('Dashboardmodel','dashboard');
    }
	public function index()
	{
        
		$this->data['title']                = 'Dashboard';
        // $this->data['count_new_order']      = $this->dashboard->count_new_order();
        // $this->data['count_doctor_cons']    = $this->dashboard->count_doctor_cons();
        // $this->data['count_reg_users']      = $this->dashboard->count_reg_users();
        // $this->data['count_lab_cons']       = $this->dashboard->count_lab_cons();
        // echo "string";
        // exit;
        $this->load->view('theme/header',$this->data);
		$this->load->view('dashboard',$this->data);
        $this->load->view('theme/footer',$this->data);
	}
}
