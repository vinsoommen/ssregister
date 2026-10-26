<?php
class Studentmodel extends CI_Model {
    private $tab_groups;
    public function __construct() {
        parent::__construct();
    }
    function count_all_row(){
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
       
        $lev=$admin_det->admin_level;
        $z_on=$admin_det->zon_id;
        $d_ist=$admin_det->dis_id;
        $l_oc=$admin_det->loc_id;

        $this->db->select("*");
        $this->db->from("nwt_str_students");
        $this->db->where("del_status",0);
       
       if($lev==2)
        {
             $this->db->where("std_zone",$z_on);
        }
        elseif($lev==3)
        {
            $this->db->where("std_zone",$z_on);
            $this->db->where("std_district",$d_ist);
        }
        elseif($lev==4)
        {
            $this->db->where("std_local",$l_oc);

        }
        $query = $this->db->count_all_results(); 
         // echo $this->db->last_query();
        // exit();
        return $query;
    }
    function get_all_students($limit='', $start=''){
      
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
       
        $lev=$admin_det->admin_level;
        $z_on=$admin_det->zon_id;
         $d_ist=$admin_det->dis_id;
         $l_oc=$admin_det->loc_id;

        $this->db->select("*");
        $this->db->from("nwt_str_students");
        $this->db->join("nwt_str_class",'nwt_str_class.class_id=nwt_str_students.std_class');
        $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
        $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
        $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local'); 
        $this->db->where("nwt_str_students.del_status",0);
        if($lev==2 )
        {
        
            $this->db->where("nwt_str_students.std_zone",$z_on);
            // $this->db->where("nwt_str_students.entry_by",$admn_id);
            $this->db->limit($limit, $start);
            $this->db->order_by('nwt_str_students.std_id','DESC');
        }
        elseif($lev == 3)
        {
            // echo "string";exit;
            $this->db->where("nwt_str_students.std_zone",$z_on);
            $this->db->where("nwt_str_students.std_district",$d_ist);
            // $this->db->where("nwt_str_students.entry_by",$admn_id);
            $this->db->limit($limit, $start);
            $this->db->order_by('nwt_str_students.std_id','DESC');
        }
        elseif($lev == 4)
        {
            // echo "string";exit;
            $this->db->where("nwt_str_students.std_zone",$z_on);
            $this->db->where("nwt_str_students.std_district",$d_ist);
             $this->db->where("nwt_str_students.std_local",$l_oc);
            
            $this->db->limit($limit, $start);
            $this->db->order_by('nwt_str_students.std_id','DESC');
        }
        else
        {

             $this->db->limit($limit, $start);
             $this->db->order_by('nwt_str_students.std_id','DESC');
        }
        
        
        $query      =   $this->db->get();
         // echo $this->db->last_query();
        // exit();
        $result     =   $query->result();
        return $result;
    }
     function get_active_classes(){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_class");
        
        $query      =   $this->db->get();
        $result     =   $query->result();
        return $result;
    }
     function get_active_districts($dis){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        
        $this->db->where("zoneId", $dis); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $result     =   $query->result();
        return $result;
    }
     function get_active_locat($distr){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        
        $this->db->where("d_id", $distr); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $result     =   $query->result();
        return $result;
    }
    function insert_student(){

        // echo "dgd";exit();
         $mId='ST';
        $random = rand(101,999);
        $student_id = $mId.'_'.$random.'_'.time().'';
        $this->tab_groups['std_name'] = $this->input->post('std_name');
        $this->tab_groups['std_dob'] = $this->input->post('std_dob');
        $this->tab_groups['std_class'] = $this->input->post('std_class');
        $this->tab_groups['std_id_proof'] = $this->input->post('std_proof');
        $this->tab_groups['std_reg_date'] =date('d-m-Y');
        $this->tab_groups['std_phone'] = $this->input->post('phone');
        $this->tab_groups['std_gender'] = $this->input->post('gender');
        $this->tab_groups['std_medium'] = $this->input->post('medium');
        $this->tab_groups['std_status']=1;
        $this->tab_groups['std_reg_no'] = $student_id;
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
        // print_r($admin_det);exit;
       

        $lev=$admin_det->admin_level;
         $z=$admin_det->zon_id;
        if($lev==1)
        {
              $this->tab_groups['std_zone'] = $this->input->post('std_zone');
             $this->tab_groups['std_district'] = $this->input->post('std_district');
            $this->tab_groups['std_local'] = $this->input->post('std_local');
        }
        elseif($lev==2)
        {
            
            $this->tab_groups['std_zone'] =$z;
            $this->tab_groups['std_district'] = $this->input->post('std_district');
            $this->tab_groups['std_local'] = $this->input->post('std_local');
        }
        elseif($lev==3)
        {
             $this->tab_groups['std_zone'] =$z;
             $di=$admin_det->dis_id;
             $this->tab_groups['std_district']=$di;
             $this->tab_groups['std_local'] = $this->input->post('std_local');       
         }
        else
        {
            $this->tab_groups['std_zone'] =$z;
            $di=$admin_det->dis_id;
            $this->tab_groups['std_district']=$di;
             $lc=$admin_det->loc_id;
             $this->tab_groups['std_local'] =$lc;
        }

        $this->tab_groups['entry_by']=$this->session->userdata('admin_id');
        $this->tab_groups['reg_year'] = date('Y');
        // $this->tab_groups['std_district'] = $this->input->post('std_district');
        // $this->tab_groups['std_local'] = $this->input->post('std_local');



        $this->db->insert(' nwt_str_students', $this->tab_groups);
         // echo $this->db->last_query();exit();
        $id = $this->db->insert_id();
        IF($this->tab_groups['std_local'] != NULL)
        {
            $config['upload_path']   =  $this->config->item('image_path').'student';

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']                 = '20000';
        @$config['file_name']               =   $id.'_'.time().$config['file_ext'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (  $this->upload->do_upload('image'))
        {       
                $data = array('upload_data' => $this->upload->data());
                $this->process_uploaded_image($data['upload_data']['file_name']);
                $img_data['std_photo']              =   $data['upload_data']['file_name'];
                $this->db->update('nwt_str_students', $img_data,array('std_id'=>$id));
        }   
        else
        {
            $error = $this->upload->display_errors();   
        }
        }
       else
       {

       }
        
        return $id;

       
    }
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_students");
        // $this->db->where("stf_status",1);
        $this->db->where("std_status",1);
        
        $this->db->where("std_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function get_local($std_loc=''){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        // $this->db->where("stf_status",1);
        // $this->db->where("std_status",1);
         $this->db->where("center_id",$std_loc);
        // $this->db->where("center_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
     function get_dist($std_di=''){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        // $this->db->where("stf_status",1);
        // $this->db->where("std_status",1);
         $this->db->where("dist_id",$std_di);
        // $this->db->where("center_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }

    function update_student($id=''){
        $this->tab_groups['std_name'] = $this->input->post('std_name');
        $this->tab_groups['std_dob'] = $this->input->post('std_dob');
        $this->tab_groups['std_class'] = $this->input->post('std_class');
        $this->tab_groups['std_id_proof'] = $this->input->post('std_proof');
        $this->tab_groups['std_phone'] = $this->input->post('phone');
        $this->tab_groups['std_gender'] = $this->input->post('gender');
        $this->tab_groups['std_medium'] = $this->input->post('medium');
        $this->tab_groups['reg_year'] = date('Y');
         $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
        // print_r($admin_det);exit;
       
        $lev=$admin_det->admin_level;
        if($lev==1)
        {
              $this->tab_groups['std_zone'] = $this->input->post('std_zone');
             $this->tab_groups['std_district'] = $this->input->post('std_district');
            $this->tab_groups['std_local'] = $this->input->post('std_local');
        }
        elseif($lev==2)
        {
             $z=$admin_det->zon_id;
            $this->tab_groups['std_zone'] =$z;
            $this->tab_groups['std_district'] = $this->input->post('std_district');
            $this->tab_groups['std_local'] = $this->input->post('std_local');
        }
        elseif($lev==3)
        {
             $this->tab_groups['std_zone'] =$z;
             $di=$admin_det->dis_id;
             $this->tab_groups['std_district']=$di;
             $this->tab_groups['std_local'] = $this->input->post('std_local');       
         }
        else
        {
            $z=$admin_det->zon_id;
            $this->tab_groups['std_zone'] =$z; 
            $di=$admin_det->dis_id;
            $this->tab_groups['std_district']=$di;
            $lc=$admin_det->loc_id;
            $this->tab_groups['std_local'] =$lc;
        }

         $config['upload_path']   =  $this->config->item('image_path').'student';

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']                 = '20000';
        @$config['file_name']               =   $id.'_'.time().$config['file_ext'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (  $this->upload->do_upload('image'))
        {       
                $data = array('upload_data' => $this->upload->data());
                $this->process_uploaded_image($data['upload_data']['file_name']);
                $img_data['std_photo']              =   $data['upload_data']['file_name'];
                $this->db->update('nwt_str_students', $img_data,array('std_id'=>$id));
        }   
        else
        {
            $error = $this->upload->display_errors();   
        }
        // return $id;

        $this->db->where('std_id', $id);
        $this->db->update('nwt_str_students', $this->tab_groups);
        return $id;
    }
    function del_student($id=''){
        $this->tab_groups['del_status']  = 1;
        $this->db->where('std_id', $id);
        $this->db->update('nwt_str_students', $this->tab_groups);
        return $id;
    }
    function active_inactive($id='',$status=''){
        $this->tab_groups['std_status']           = $status;
        $this->db->where('std_id', $id);
        $this->db->update('nwt_str_students', $this->tab_groups);
         // echo $this->db->last_query();exit();
        return $id;    
    }
    function process_uploaded_image($filename){
    
    $large_path = $this->config->item('image_path').'student/'.$filename;
    $thumb_path = $this->config->item('image_path').'student/small/'.$filename;

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
     function get_local_center_by_id($distr_id){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        // $this->db->join("nwt_str_district","nwt_str_district.dist_id = nwt_str_local_center.d_id");
        $this->db->where("local_status",1);
        $this->db->where("del_status",0);
        $this->db->where("d_id",$distr_id);
        $query      =   $this->db->get();
        $result     =   $query->result();
        return $result;
    }
   
    
    function get_admin_details($admn_id)
    {
        $this->db->select('*');
        $this->db->from('nwt_str_admin');
        $this->db->where('admin_id',$admn_id);
        $query      =   $this->db->get();
          // echo $this->db->last_query();
        // exit();
         $row     =   $query->row();
        return $row;
    }
    function get_student_by_name($student)
    {
        $this->db->select('std_name');
        $this->db->like('std_name', $student);
        $query = $this->db->get('nwt_str_students');
        return $query->result();
    }
    function get_search_results()
    {
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
        // print_r($admin_det);exit();
       
        $lev=$admin_det->admin_level;
        $z_on=$admin_det->zon_id;
         $d_ist=$admin_det->dis_id;
         $l_oc=$admin_det->loc_id;
        
        $std_name=$this->input->post('name');
        $std_class = $this->input->post('class');
        $std_zon = $this->input->post('std_zone');
        $std_dis=$this->input->post('std_district');
        $std_loc=$this->input->post('std_local');
         if(($std_name) && ($std_class))
        {
            // echo "string";exit();
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
             $this->db->where("nwt_str_students.std_class",$std_class);
             $this->db->like('nwt_str_students.std_name', $std_name);

            // $this->db->where("nwt_str_students.std_name",$std_name);
           
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }

            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        if($std_class != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
            
            $this->db->where("nwt_str_students.std_class",$std_class);
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
             $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
             $result     =   $query->result();
            return $result;

            
        }
        if(($std_name != null) && ($std_zon != null) && ($std_class != null))
        {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
             $this->db->like('nwt_str_students.std_name', $std_name);
             $this->db->where("nwt_str_students.std_class",$std_class);
            $this->db->where("nwt_str_students.std_zone",$std_zon);
           
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        if(($std_name != null) && ($std_zon != null))
        {
            // echo "string";exit();
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
             $this->db->like('nwt_str_students.std_name', $std_name);
             $this->db->where("nwt_str_students.std_zone",$std_zon);
           
           
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
         if(($std_zon != null) && ($std_dis != null) && ($std_loc != null)) 
         {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
            $this->db->where("nwt_str_students.std_zone",$std_zon);
             $this->db->where("nwt_str_students.std_district",$std_dis); 
              $this->db->where("nwt_str_students.std_local",$std_loc); 
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
         }
       if(($std_zon != null) && ($std_dis != null)) 
        {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
            $this->db->where("nwt_str_students.std_zone",$std_zon);
             $this->db->where("nwt_str_students.std_district",$std_dis); 
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;

        }
        if(($std_zon != null) && ($std_name != null))
        {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
            $this->db->where("nwt_str_students.std_zone",$std_zon);
             $this->db->like('nwt_str_students.std_name', $std_name);
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        if($std_zon != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
            $this->db->where("nwt_str_students.std_zone",$std_zon);
           
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
        if($std_name != null)
        {
            $this->db->select("*");
            $this->db->from("nwt_str_students");
            $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_students.std_class");
            $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_students.std_zone');
            $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_students.std_district');
            $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_students.std_local');
             $this->db->like('nwt_str_students.std_name', $std_name);
            // $this->db->where("nwt_str_students.std_name",$std_name);
           
            $this->db->where("nwt_str_students.del_status",0);
            if($lev==2)
            {
                 $this->db->where("nwt_str_students.std_zone",$z_on);
            }
            elseif($lev==3)
            {
                $this->db->where("nwt_str_students.std_district",$d_ist);
            }
            elseif($lev==4)
            {
                 $this->db->where("nwt_str_students.std_local",$l_oc);
            }
            $query      =   $this->db->get();
             // echo $this->db->last_query();exit();
            $result     =   $query->result();
            return $result;
        }
       
        
    }

}