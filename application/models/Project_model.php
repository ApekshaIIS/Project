<?php

class Project_model extends CI_Model {

    function __construct() {
        parent::__construct(); 
    }

    public function GetAllProjects($project_type)
    {
      if($this->session->userdata('set_projectorder'))
      {
        $order=$this->session->userdata('set_projectorder');
      }else
      {
        $order='DESC';
      }
      $query= $this->db->query('select P.*,S.school_name from '.Gately_Projects.'  P, '.Gately_User.' S where P.project_type="'.$project_type.'" and P.school_name=S.user_id ORDER BY project_id '.$order.'  ');
     return $result=$query->result_array(); 
    }

    public function getProject($project_ID)
    {
    	$query= $this->db->query('select P.*,P.kanton_id as K_id,P.school_subject as S_id,P.school_grade as P_grade,S.link_home_page,Kanton_name as kanton_id,subject_name as school_subject,grade as school_grade from 
        '.Gately_Projects.'  P  
        LEFT JOIN 
        '.Gately_school_grade.' SG on P.school_grade=SG.grade_id LEFT JOIN 
        '.Gately_Kantons.' SK  on P.kanton_id=SK.id LEFT JOIN 
        '.Gately_school_subject.' SS on P.school_subject=SS.sub_id ,
        '.Gately_User.' S where  

         P.school_name=S.user_id and project_id="'.$project_ID.'"    limit 1 ');

        // $query= $this->db->query('select P.*,P.kanton_id as K_id,P.school_subject as S_id,P.school_grade as P_grade,S.link_home_page,Kanton_name as kanton_id,subject_name as school_subject,grade as school_grade from 
      //   '.Gately_Projects.'  P   
      //   LEFT JOIN 
      //   '.Gately_school_grade.' SG on P.school_grade=SG.grade_id,
      //   '.Gately_Projects.'  P   
      //   LEFT JOIN 
      //   '.Gately_Kantons.' SK on P.kanton_id=SK.id, 
      //   '.Gately_school_subject.' SS , 
      //   '.Gately_User.' S where  

      //    P.school_name=S.user_id and project_id="'.$project_ID.'"   and P.school_subject=SS.sub_id  limit 1 ');
    	//echo $this->db->last_query();
     return $result=$query->row_array(); 
    }

    public function GetTags($gallryID)
    {
         $query=$this->db->query('select tagged_css,Tag_id,Firstname,LastName,user_id from  '.Gately_Tag.' ,'.Gately_User.' where user_id=Friend_ID and Gallry_ID='.$gallryID.' ');
         return $query->result_array();


    }

    public function GetTagsMe($gallryID,$user_id)
    {
         $query=$this->db->query('select tagged_css,Tag_id,Firstname,LastName,user_id from  '.Gately_Tag.' ,'.Gately_User.' where user_id=Friend_ID and Gallry_ID='.$gallryID.' and user_id='.$user_id.' ');
         return $query->result_array();


    }

}

 
 

