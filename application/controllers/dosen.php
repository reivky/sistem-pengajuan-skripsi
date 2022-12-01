<?php 

class Dosen extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}
		$this->isDosen();
		$this->load->model('m_dosen');
	}
	
	 public function getUserData(){
	    // Ambil semua data session
	    $userData = $this->session->userdata();

	    // Return userdata
	    return $userData;
	  }

	  public function isDosen()
	  {
	    // Mengambil data session
	    $userData = $this->getUserData();

	    // Jika level user bukan administrator
	    // maka redirect ke halaman sesuai hak akses
	    		if($userData['akses']=='dosen'){ //Akses dosen
                    $this->session->set_userdata('akses','dosen');
 
                 }elseif($userData['akses']=='admin'){ //akses admin
                    $this->session->set_userdata('akses','admin');
                    redirect('admin');
                 }elseif($userData['akses']=='progdi'){ //akses kaprodi
                    $this->session->set_userdata('akses','progdi');
                    redirect('kaprodi');
                 }else{ //akses mahasiswa
                    $this->session->set_userdata('akses','mhs');
                    redirect('mahasiswa');
                 }
	  }
	function index(){ 
		$x['skripsi']=$this->m_dosen->get_data_skripsi()->result();
		$this->load->view('home_dosen',$x);
	}
	function mahasiswa(){ 
		$x['mahasiswa']=$this->m_dosen->get_data_skripsi()->result();
		$this->load->view('dosen/data_mahasiswa', $x);
	}
	public function ubah()
    {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[150]|matches[new_pass]');

		if($this->form_validation->run() == false){

			$this->load->view('dosen/ubah_password');
		}else{

			// Update Data
			$data = array(
				'password' => md5($this->input->post('new_pass'))
			);
			// Check Old {Password}
			$result = $this->m_dosen->Check_Old_Password($this->session->userdata('ses_id'), md5($this->input->post('old_pass')));
			if($result > 0 AND $result === true ){
				// updata user data
				$result = $this->m_dosen->Update_User_Data($this->session->userdata('ses_id'), $data);
				if($result > 0){
					$this->session->set_flashdata('success_msg', 'Password berhasil diubah');
					return redirect('dosen/ubah');
				}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password baru tidak boleh sama');
					return redirect('dosen/ubah');
				}
			}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password salah!');
					return redirect('dosen/ubah');
				
			}
		}
		
	}
	
}