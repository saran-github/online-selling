<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class madmin extends CI_Model{
    function verify_login(){
        //print_r($_POST);die;
        $rs = $this->db->select('id, concat(firstname, " ", lastname) as name,last_login', false)->where('username', $this->input->post('username', true))->where('password', $this->input->post('password', true))->where('status','1')->get('admins');
        //echo $this->db->last_query();die;
        if($rs->num_rows() > 0){    # authenticated make session
            $data   = array();
            $data   = $rs->row_array();
            $this->session->set_userdata('logged_admin', $data);
            $update['last_login'] = date('Y-m-d H:i:s');
            $this->db->where('id',$data['id']);
            $this->db->update("admins",$update);
            return true;
        }else{
            return false;
        }
    }
    function get_profile(){
    	 $logged_admin = $this->session->userdata('logged_admin');
    	 $rs = $this->db->select('*', false)->where('id',$logged_admin['id'])->get('admins');
    	 $data   = $rs->row_array();
    	 return $data;
    }
    function update_profile($data,$id)
    {
    	if(count($data) > 0)
    	{
    		$this->db->where("id",$id);
    		$this->db->update("admins",$data);
    		return 1;
    	}
    	return 0;
    }
}
