<?php 

class M_mahasiswa extends CI_Model{
	
	function get_data_pengajuan(){
		$nim = $this->session->userdata('ses_id');		
		return $this->db->query("SELECT * FROM judul_skripsi WHERE nim='$nim'");
	}
	function get_data_skripsi(){
		$nim = $this->session->userdata('ses_id');		
		return $this->db->query("SELECT * FROM judul_skripsi WHERE nim='$nim' AND status=1");
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function Update_User_Data($user_id, $data)
	{
		$this->db->set($data);
		$this->db->where('nim', $user_id);
		$this->db->update('login_mahasiswa');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Check_Old_Password($user_id, $old_password){

		$this->db->where('nim', $user_id);
		$this->db->where('pass', $old_password);
		$query = $this->db->get('login_mahasiswa');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
}