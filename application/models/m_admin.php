<?php 

class M_admin extends CI_Model{
	public function hitung_admin()
	{   
	    $query = $this->db->get('login_admin');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	public function hitung_progdi()
	{   
	    $query = $this->db->get('login_progdi');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	public function hitung_dosen()
	{   
	    $query = $this->db->get('login_dosen');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	public function hitung_mahasiswa()
	{   
	    $query = $this->db->get('login_mahasiswa');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	function get_data_mahasiswa(){		
		return $this->db->get('login_mahasiswa');
	}
	function get_data_kaprodi(){		
		return $this->db->get('login_progdi');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}
	public function Update_User_Data($user_id, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $user_id);
		$this->db->update('login_admin');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Check_Old_Password($user_id, $old_password){

		$this->db->where('id', $user_id);
		$this->db->where('password', $old_password);
		$query = $this->db->get('login_admin');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
	function get_data_fakultas1(){		
		$this->db->order_by('kategori_id', 'ASC');
        return $this->db->from('kategori')
          ->join('login_dosen', 'login_dosen.fakultas=kategori.kategori_nama')
          ->where('kategori_id','1')
          ->get();
	} 
	function get_data_fakultas2(){		
		$this->db->order_by('kategori_id', 'ASC');
        return $this->db->from('kategori')
          ->join('login_dosen', 'login_dosen.fakultas=kategori.kategori_nama')
          ->where('kategori_id','2')
          ->get();
	} 
	function get_data_fakultas3(){		
		$this->db->order_by('kategori_id', 'ASC');
        return $this->db->from('kategori')
          ->join('login_dosen', 'login_dosen.fakultas=kategori.kategori_nama')
          ->where('kategori_id','3')
          ->get();
	} 
	

}