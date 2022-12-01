<?php 

class M_kaprodi extends CI_Model{
	
	function get_data_pengajuan(){	
		$prodi = $this->session->userdata('ses_prodi');	
		return $this->db->query("SELECT * FROM judul_skripsi WHERE prodi='$prodi' AND status=0 ORDER BY `tanggal` ASC");
	}
	function get_data_skripsi(){
		$prodi = $this->session->userdata('ses_prodi');
		return $this->db->query("SELECT * FROM judul_skripsi WHERE prodi='$prodi' AND status=1 ORDER BY `nim` ASC");
	}
	function get_data_dosen(){
		$prodi = $this->session->userdata('ses_prodi');
		return $this->db->query("SELECT * FROM login_dosen WHERE prodi='$prodi' ORDER BY `nidn` ASC");
	}
	public function Update_User_Data($user_id, $data)
	{
		$this->db->set($data);
		$this->db->where('nidn', $user_id);
		$this->db->update('login_progdi');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Check_Old_Password($user_id, $old_password){

		$this->db->where('nidn', $user_id);
		$this->db->where('password', $old_password);
		$query = $this->db->get('login_progdi');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
	function terima_skripsi($id,$judul,$bidang,$dosbing1,$dosbing2){
        $hasil=$this->db->query("UPDATE judul_skripsi SET judul='$judul',bidang='$bidang',dosbing1='$dosbing1',dosbing2='$dosbing2',status=1 WHERE id='$id'");
        return $hasil;
    }
    function tolak_skripsi($id){
        $hasil=$this->db->query("UPDATE judul_skripsi SET status=2 WHERE id='$id'");
        return $hasil;
    }

}