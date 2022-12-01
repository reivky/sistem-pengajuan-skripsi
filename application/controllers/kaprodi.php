<?php 

class Kaprodi extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}
		$this->isKaprodi();
		$this->load->model('m_kaprodi');
	}
	
	 public function getUserData(){
	    // Ambil semua data session
	    $userData = $this->session->userdata();

	    // Return userdata
	    return $userData;
	  }

	  public function isKaprodi()
	  {
	    // Mengambil data session
	    $userData = $this->getUserData();

	    // Jika level user bukan kaprodi
	    // maka redirect halaman sesuai hak akses
	   			 if($userData['akses']=='progdi'){ //Akses kaprodi
                    $this->session->set_userdata('akses','progdi');
 
                 }elseif($userData['akses']=='dosen'){ //akses dosen
                    $this->session->set_userdata('akses','dosen');
                    redirect('dosen');
                 }elseif($userData['akses']=='admin'){ //akses admin
                    $this->session->set_userdata('akses','admin');
                    redirect('admin');
                 }else{ //akses mahasiswa
                    $this->session->set_userdata('akses','mhs');
                    redirect('mahasiswa');
                 }
	  }
	function index(){ 
		$x['skripsi']=$this->m_kaprodi->get_data_pengajuan()->result();
		$this->load->view('home_kaprodi', $x);
	}
	function dosen(){ 
		$x['dosen']=$this->m_kaprodi->get_data_dosen()->result();
		$this->load->view('kaprodi/data_dosen', $x);
	}
	function skripsi(){ 
		$x['skripsi']=$this->m_kaprodi->get_data_skripsi()->result();
		$this->load->view('kaprodi/data_skripsi', $x);
	}
	function mahasiswa(){ 
		$x['skripsi']=$this->m_kaprodi->get_data_skripsi()->result();
		$this->load->view('kaprodi/data_mahasiswa', $x);
	}
	public function ubah()
    {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[150]|matches[new_pass]');

		if($this->form_validation->run() == false){

			$this->load->view('kaprodi/ubah_password');
		}else{

			// Update Data
			$data = array(
				'password' => md5($this->input->post('new_pass'))
			);
			// Check Old {Password}
			$result = $this->m_kaprodi->Check_Old_Password($this->session->userdata('ses_id'), md5($this->input->post('old_pass')));
			if($result > 0 AND $result === true ){
				// updata user data
				$result = $this->m_kaprodi->Update_User_Data($this->session->userdata('ses_id'), $data);
				if($result > 0){
					$this->session->set_flashdata('success_msg', 'Password berhasil diubah');
					return redirect('kaprodi/ubah');
				}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password baru tidak boleh sama');
					return redirect('kaprodi/ubah');
				}
			}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password salah!');
					return redirect('kaprodi/ubah');
				
			}
		}
		
	}
	function terima_skripsi(){
		$id=$this->input->post('id');
        $judul=$this->input->post('judul');
        $bidang=$this->input->post('bidang');
        $dosbing1=$this->input->post('dosbing1');
        $dosbing2=$this->input->post('dosbing2');
        $this->m_kaprodi->terima_skripsi($id,$judul,$bidang,$dosbing1,$dosbing2);
        redirect('kaprodi');
    }
    function tolak_skripsi(){
		$id=$this->input->post('id');
        $this->m_kaprodi->tolak_skripsi($id);
        redirect('kaprodi');
    }
    public function todoc() {
        $x['skripsi']=$this->m_kaprodi->get_data_skripsi()->result();     
        $this->load->view('data_pembimbing', $x);
    }
}