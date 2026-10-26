<?php
class Teachermodel extends CI_Model {
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
        $this->db->from("nwt_str_teacher");
        $this->db->where("del_status",0);
        if($lev==2)
        {
             $this->db->where("t_zone",$z_on);
        }
        elseif($lev==3)
        {
            $this->db->where("t_zone",$z_on);
            $this->db->where("t_district",$d_ist);
        }
        elseif($lev==4)
        {
            $this->db->where("t_center",$l_oc);

        }
        $query = $this->db->count_all_results(); 
         // echo $this->db->last_query();
        // exit();
        return $query;
    }
    function get_all_teachers($limit='', $start=''){
        // echo $limit;exit;
        // echo "string";exit();
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
       
        $lev=$admin_det->admin_level;
        $z_on=$admin_det->zon_id;
         $d_ist=$admin_det->dis_id;
         $l_oc=$admin_det->loc_id;

        $this->db->select("*");
        $this->db->from("nwt_str_teacher");
        $this->db->join("nwt_str_class",'nwt_str_class.class_id=nwt_str_teacher.t_class');
        $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
        $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
        $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center'); 
        
        $this->db->where("nwt_str_teacher.del_status",0);

        if($lev==2 )
        {
        
            $this->db->where("nwt_str_teacher.t_zone",$z_on);
            $this->db->limit($limit, $start);
            $this->db->order_by('nwt_str_teacher.t_id','DESC');
        }
        elseif($lev == 3)
        {
            // echo "string";exit;
            $this->db->where("nwt_str_teacher.t_zone",$z_on);
            $this->db->where("nwt_str_teacher.t_district",$d_ist);
            $this->db->limit($limit, $start);
            $this->db->order_by('nwt_str_teacher.t_id','DESC');
        }
        elseif($lev == 4)
        {
            // echo "string";exit;
            $this->db->where("nwt_str_teacher.t_zone",$z_on);
            $this->db->where("nwt_str_teacher.t_district",$d_ist);
             $this->db->where("nwt_str_teacher.t_center",$l_oc);
            $this->db->limit($limit, $start);
            $this->db->order_by('nwt_str_teacher.t_id','DESC');
        }
        else
        {

             $this->db->limit($limit, $start);
             $this->db->order_by('nwt_str_teacher.t_id','DESC');
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
     function get_active_qualifications(){
        // echo "string";exit();
        $this->db->select("*");
        $this->db->from(" nwt_str_teacher_qualification");
        
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
    function insert_teacher(){

        // echo "dgd";exit();
         $mId='TH';
        $random = rand(101,999);
        $teacher_id = $mId.'_'.$random.'_'.time().'';
        $this->tab_groups['t_name'] = $this->input->post('t_name');
        $this->tab_groups['t_age'] = $this->input->post('t_age');
        $this->tab_groups['t_qualification'] = $this->input->post('t_qualification');
        $this->tab_groups['t_job'] = $this->input->post('t_job');
        $this->tab_groups['t_reg_date'] =date('d-m-Y');
        $this->tab_groups['t_gender'] = $this->input->post('t_gender');
        $this->tab_groups['t_phone'] = $this->input->post('t_phone');
        $this->tab_groups['t_medium'] = $this->input->post('t_medium');
        $this->tab_groups['t_proof'] = $this->input->post('t_proof');
        $this->tab_groups['t_class'] = $this->input->post('t_class');
        $this->tab_groups['t_status']=1;
        $this->tab_groups['t_reg_number'] = $teacher_id;
        $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
        // print_r($admin_det);exit;
       
        $lev=$admin_det->admin_level;
        if($lev==1)
        {
            $this->tab_groups['t_zone'] = $this->input->post('t_zone');
            $this->tab_groups['t_district'] = $this->input->post('t_district');
            $this->tab_groups['t_center'] = $this->input->post('t_local');
        }
        elseif($lev==2)
        {
            $z=$admin_det->zon_id;
            $this->tab_groups['t_zone'] =$z;
            $this->tab_groups['t_district'] = $this->input->post('t_district');
            $this->tab_groups['t_center'] = $this->input->post('t_local');
        }
        elseif($lev==3)
        {
              $z=$admin_det->zon_id;
             $this->tab_groups['t_zone'] =$z;
             $di=$admin_det->dis_id;
             $this->tab_groups['t_district']=$di;
             $this->tab_groups['t_center'] = $this->input->post('t_local');       
         }
        else
        {
              $z=$admin_det->zon_id;
            $this->tab_groups['t_zone'] =$z;
            $di=$admin_det->dis_id;
            $this->tab_groups['t_district']=$di;
            $lc=$admin_det->loc_id;
            $this->tab_groups['t_center'] =$lc;
        }

        $this->tab_groups['entry_by']=$this->session->userdata('admin_id');
   
      $this->db->insert(' nwt_str_teacher', $this->tab_groups);
         // echo $this->db->last_query();exit();
        $id = $this->db->insert_id();
      
        
        return $id;

       
    }
    function get_one_row($id=''){
        $this->db->select("*");
        $this->db->from("nwt_str_teacher");
        // $this->db->where("stf_status",1);
        $this->db->where("t_status",1);
        
        $this->db->where("t_id", $id); 
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
     function get_local($t_loc=''){
        $this->db->select("*");
        $this->db->from("nwt_str_local_center");
        $this->db->where("center_id",$t_loc);
       
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
     function get_dist($t_di=''){
        $this->db->select("*");
        $this->db->from("nwt_str_district");
        $this->db->where("dist_id",$t_di);
        $query      =   $this->db->get();
        // echo $this->db->last_query();exit();
        $row     =   $query->row();
        return $row;
    }
    function update_teacher($id=''){
        $this->tab_groups['t_name'] = $this->input->post('t_name');
        $this->tab_groups['t_age'] = $this->input->post('t_age');
        $this->tab_groups['t_qualification'] = $this->input->post('t_qualification');
        $this->tab_groups['t_job'] = $this->input->post('t_job');
        $this->tab_groups['t_gender'] = $this->input->post('t_gender');
        $this->tab_groups['t_phone'] = $this->input->post('t_phone');
        $this->tab_groups['t_medium'] = $this->input->post('t_medium');
        $this->tab_groups['t_proof'] = $this->input->post('t_proof');
        $this->tab_groups['t_class'] = $this->input->post('t_class');

         $admn_id=$this->session->userdata('admin_id');
        $admin_det= $this->get_admin_details($admn_id);
        // print_r($admin_det);exit;
       
        $lev=$admin_det->admin_level;
        if($lev==1)
        {
            $this->tab_groups['t_zone'] = $this->input->post('t_zone');
            $this->tab_groups['t_district'] = $this->input->post('t_district');
            $this->tab_groups['t_center'] = $this->input->post('t_local');
        }
        elseif($lev==2)
        {
            $z=$admin_det->zon_id;
            $this->tab_groups['t_zone'] =$z;
            $this->tab_groups['t_district'] = $this->input->post('t_district');
            $this->tab_groups['t_center'] = $this->input->post('t_local');
        }
        elseif($lev==3)
        {
             $this->tab_groups['t_zone'] =$z;
             $di=$admin_det->dis_id;
             $this->tab_groups['t_district']=$di;
             $this->tab_groups['t_center'] = $this->input->post('t_local');      
         }
        else
        {
            $this->tab_groups['t_zone'] =$z;
            $di=$admin_det->dis_id;
            $this->tab_groups['t_district']=$di;
            $lc=$admin_det->loc_id;
            $this->tab_groups['t_center'] =$lc;
        }

      

        $this->db->where('t_id', $id);
        $this->db->update('nwt_str_teacher', $this->tab_groups);
        return $id;
    }
    function del_teacher($id=''){
        $this->tab_groups['del_status']  = 1;
        $this->db->where('t_id', $id);
        $this->db->update('nwt_str_teacher', $this->tab_groups);
        return $id;
    }
    function active_inactive($id='',$status=''){
        $this->tab_groups['t_status']           = $status;
        $this->db->where('t_id', $id);
        $this->db->update('nwt_str_teacher', $this->tab_groups);
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
   
    function checkuser($uname){
        $this->db->select("*");
        $this->db->from("nwt_str_admin");
        $this->db->where("admin_name",$uname);
        $query = $this->db->count_all_results(); 
        //  echo $this->db->last_query();
        // exit();
        return $query;
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
       
        $lev=$admin_det->admin_level;
        $z_on=$admin_det->zon_id;
        $d_ist=$admin_det->dis_id;
        $l_oc=$admin_det->loc_id;

        $t_name=$this->input->post('name');
        $t_class = $this->input->post('class');
        $t_zon = $this->input->post('std_zone');
        $t_dis=$this->input->post('std_district');
        $t_loc=$this->input->post('std_local');

        if(($t_class != null) && $t_name != null)
          {
                    $this->db->select("*");
                    $this->db->from("nwt_str_teacher");
                    $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_teacher.t_class");
                    $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
                    $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
                    $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center');
                    
                    $this->db->where("nwt_str_teacher.t_class",$t_class);

                     $this->db->like('nwt_str_teacher.t_name', $t_name);
                    $this->db->where("nwt_str_teacher.del_status",0);
                    if($lev==2)
                    {
                         $this->db->where("nwt_str_teacher.t_zone",$z_on);
                    }
                    elseif($lev==3)
                    {
                         $this->db->where("nwt_str_teacher.t_district",$d_ist);
                    }
                    elseif($lev==4)
                    {
                        $this->db->where("nwt_str_teacher.t_center",$l_oc);
                    }
                     $query      =   $this->db->get();
                     // echo $this->db->last_query();exit();
                     $result     =   $query->result();
                    return $result;

                    
                }
                if($t_class != null)
                {
                   $this->db->select("*");
                    $this->db->from("nwt_str_teacher");
                    $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_teacher.t_class");
                    $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
                    $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
                    $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center');
                    
                    $this->db->where("nwt_str_teacher.t_class",$t_class);

              
                    $this->db->where("nwt_str_teacher.del_status",0);
                    if($lev==2)
                    {
                         $this->db->where("nwt_str_teacher.t_zone",$z_on);
                    }
                    elseif($lev==3)
                    {
                         $this->db->where("nwt_str_teacher.t_district",$d_ist);
                    }
                    elseif($lev==4)
                    {
                        $this->db->where("nwt_str_teacher.t_center",$l_oc);
                    }
                     $query      =   $this->db->get();
                     // echo $this->db->last_query();exit();
                     $result     =   $query->result();
                    return $result; 
                }
                 if(($t_zon != null) && ($t_dis != null) && ($t_loc != null)) 
                 {
                    $this->db->select("*");
                    $this->db->from("nwt_str_teacher");
                    $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_teacher.t_zone");
                    $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
                    $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
                    $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center');
                    
                    $this->db->where("nwt_str_teacher.t_zone",$t_zon);
                    $this->db->where("nwt_str_teacher.t_district",$t_dis); 
                    $this->db->where("nwt_str_teacher.t_center",$t_loc); 
                    $this->db->where("nwt_str_teacher.del_status",0);
                    if($lev==2)
                    {
                         $this->db->where("nwt_str_teacher.t_zone",$z_on);
                    }
                    elseif($lev==3)
                    {
                         $this->db->where("nwt_str_teacher.t_district",$d_ist);
                    }
                    elseif($lev==4)
                    {
                        $this->db->where("nwt_str_teacher.t_center",$l_oc);
                    }
                    $query      =   $this->db->get();
                     // echo $this->db->last_query();exit();
                    $result     =   $query->result();
                    return $result;
                 }
               if(($t_zon != null) && ($t_dis != null)) 
                {
                    $this->db->select("*");
                    $this->db->from("nwt_str_teacher");
                    $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_teacher.t_zone");
                    $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
                    $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
                    $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center');
                    
                    $this->db->where("nwt_str_teacher.t_zone",$t_zon);
                     $this->db->where("nwt_str_teacher.t_district",$t_dis); 
                    $this->db->where("nwt_str_teacher.del_status",0);
                    if($lev==2)
                    {
                         $this->db->where("nwt_str_teacher.t_zone",$z_on);
                    }
                    elseif($lev==3)
                    {
                         $this->db->where("nwt_str_teacher.t_district",$d_ist);
                    }
                    elseif($lev==4)
                    {
                        $this->db->where("nwt_str_teacher.t_center",$l_oc);
                    }
                    $query      =   $this->db->get();
                     // echo $this->db->last_query();exit();
                    $result     =   $query->result();
                    return $result;

                }
                if($t_zon != null)
                {
                    $this->db->select("*");
                    $this->db->from("nwt_str_teacher");
                    $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_teacher.t_zone");
                    $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
                    $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
                    $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center');
                     $this->db->join("nwt_str_teacher_qualification",'nwt_str_teacher_qualification.q_id=nwt_str_teacher.t_qualification');
                    // $this->db->where("nwt_str_teacher.t_zone",$t_zon);
                   
                    $this->db->where("nwt_str_teacher.del_status",0);
                    if($lev==2)
                    {
                         $this->db->where("nwt_str_teacher.t_zone",$z_on);
                    }
                    elseif($lev==3)
                    {
                         $this->db->where("nwt_str_teacher.t_district",$d_ist);
                    }
                    elseif($lev==4)
                    {
                        $this->db->where("nwt_str_teacher.t_center",$l_oc);
                    }
                    $query      =   $this->db->get();
                     // echo $this->db->last_query();exit();
                    $result     =   $query->result();
                    return $result;
                }
                if($t_name != null)
                {
                    $this->db->select("*");
                    $this->db->from("nwt_str_teacher");
                    $this->db->join("nwt_str_class","nwt_str_class.class_id = nwt_str_teacher.t_zone");
                    $this->db->join("nwt_str_zone",'nwt_str_zone.zone_id=nwt_str_teacher.t_zone');
                    $this->db->join("nwt_str_district",'nwt_str_district.dist_id=nwt_str_teacher.t_district');
                    $this->db->join("nwt_str_local_center",'nwt_str_local_center.center_id=nwt_str_teacher.t_center');
                    
                     $this->db->like('nwt_str_teacher.t_name', $t_name);
                    // $this->db->where("nwt_str_students.std_name",$std_name);
                   
                    $this->db->where("nwt_str_teacher.del_status",0);
                    if($lev==2)
                    {
                         $this->db->where("nwt_str_teacher.t_zone",$z_on);
                    }
                    elseif($lev==3)
                    {
                         $this->db->where("nwt_str_teacher.t_district",$d_ist);
                    }
                    elseif($lev==4)
                    {
                        $this->db->where("nwt_str_teacher.t_center",$l_oc);
                    }
                    $query      =   $this->db->get();
                     // echo $this->db->last_query();exit();
                    $result     =   $query->result();
                    return $result;
                }
                
            
               
        }
        
       
        

}