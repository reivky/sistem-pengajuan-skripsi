<?php 

class M_dosen extends CI_Model{
	
	function get_data_skripsi(){
		$nama = $this->session->userdata('ses_nama');
		return $this->db->query("SELECT * FROM judul_skripsi WHERE dosbing1='$nama' AND status=1 OR dosbing2='$nama' AND status=1 ORDER BY `nim` ASC");
	}
	public function Update_User_Data($user_id, $data)
	{
		$this->db->set($data);
		$this->db->where('nidn', $user_id);
		$this->db->update('login_dosen');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Check_Old_Password($user_id, $old_password){

		$this->db->where('nidn', $user_id);
		$this->db->where('password', $old_password);
		$query = $this->db->get('login_dosen');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
}