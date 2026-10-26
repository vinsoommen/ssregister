<?php
class Bannermodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    function count_all_row(){
        $this->db->select("id");
        $this->db->from("nwt_mat_banner");
        $this->db->where("del_status",0);
        $query = $this->db->count_all_results(); 
        return $query;
    }
    function get_all_banner($limit='', $start=''){
        $this->db->select("nwt_mat_banner.*");
        $this->db->from("nwt_mat_banner");
        $this->db->where("del_status",0);
        $this->db->limit($limit, $start);
        $query      =   $this->db->get();
        $result     =   $query->result();
        return $result;
    }
    
    function insert_banner(){
		$this->tab_groups['title']		 		= $this->input->post('title');
		$this->tab_groups['sub_title'] 			= $this->input->post('sub_title');
		$this->tab_groups['url'] 				= $this->input->post('url');
		$this->db->insert('nwt_mat_banner', $this->tab_groups);
		$id = $this->db->insert_id();
		$config['upload_path']	 =  $this->config->item('image_path').'banner';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] 				= '20000';
		@$config['file_name']  				= 	$id.$config['file_ext'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (  $this->upload->do_upload('image'))
		{		
				$data = array('upload_data' => $this->upload->data());
				$this->process_uploaded_image($data['upload_data']['file_name']);
				$img_data['image']				=	$data['upload_data']['file_name'];
				$this->db->update('nwt_mat_banner', $img_data,array('id'=>$id));
		}	
		else
		{
			$error = $this->upload->display_errors();	
		}
		return $id;

    }
    
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_mat_banner");
        $this->db->where("id", $id); 
        $query      =   $this->db->get();
        $row     =   $query->row();
        return $row;
    }
    function update_banner($id=''){

		$this->tab_groups['title']		 		= $this->input->post('title');
		$this->tab_groups['sub_title'] 			= $this->input->post('sub_title');
		$this->tab_groups['url'] 				= $this->input->post('url');
		if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $config['upload_path']   =  $this->config->item('image_path').'banner';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']                 = '20000';
        $config['overwrite'] = TRUE;
        @$config['file_name']               =   $id.$config['file_ext'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (  $this->upload->do_upload('image')){   
                $data = array('upload_data' => $this->upload->data());
                $this->process_uploaded_image($data['upload_data']['file_name']);
                $this->tab_groups['image']              =   $data['upload_data']['file_name'];
        }   
        else{
            $error = $this->upload->display_errors();   
        }
        }
        $this->db->update('nwt_mat_banner', $this->tab_groups,array('id'=>$id));

        if (!empty(array_filter($this->db->error())))
            return FALSE;
        else
            return TRUE;
    }
    function del_banner($id=''){
        $this->tab_groups['del_status']           = 1;
        $this->db->where('id', $id);
        $this->db->update('nwt_mat_banner', $this->tab_groups);
        return $id;
    }
    function active_inactive($id='',$status=''){
        $this->tab_groups['status']           = $status;
        $this->db->where('id', $id);
        $this->db->update('nwt_mat_banner', $this->tab_groups);
        return $id;    
    }
    function process_uploaded_image($filename){
    
    $large_path = $this->config->item('image_path').'banner/'.$filename;
    $thumb_path = $this->config->item('image_path').'banner/small/'.$filename;

    $thumb_config['image_library'] = 'gd2';
    $thumb_config['source_image'] = $large_path;
    $thumb_config['new_image'] = $thumb_path;
    $thumb_config['maintain_ratio'] = TRUE;
    $thumb_config['overwrite'] = TRUE;
    $thumb_config['width'] = 100;
    $thumb_config['height'] = 100;
    $this->load->library('image_lib', $thumb_config);
    $this->image_lib->initialize($thumb_config);
    
    if (!$this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
        return false;
    }
     
    return true;    
    
    }
}