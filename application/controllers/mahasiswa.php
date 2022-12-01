<?php 

class Mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}
		$this->isMahasiswa();
		$this->load->model('m_mahasiswa');
	}
	
	 public function getUserData(){
	    // Ambil semua data session
	    $userData = $this->session->userdata();

	    // Return userdata
	    return $userData;
	  }

	  public function isMahasiswa()
	  {
	    // Mengambil data session
	    $userData = $this->getUserData();

	    // Jika level user bukan mahasiswa
	    // maka redirect ke halaman sesuai hak akses
	   			 if($userData['akses']=='mhs'){ //Akses mahasiswa
                    $this->session->set_userdata('akses','mhs');
 
                 }elseif($userData['akses']=='dosen'){ //akses dosen
                    $this->session->set_userdata('akses','dosen');
                    redirect('dosen');
                 }elseif($userData['akses']=='progdi'){ //akses kaprodi
                    $this->session->set_userdata('akses','progdi');
                    redirect('kaprodi');
                 }else{ //akses admin
                    $this->session->set_userdata('akses','admin');
                    redirect('admin');
                 }
	  }
	function index(){ 
		$x['skripsi']=$this->m_mahasiswa->get_data_pengajuan()->result();
		$this->load->view('home_mahasiswa', $x);
	}
	function skripsi(){ 
		$x['skripsi']=$this->m_mahasiswa->get_data_skripsi()->result();
		$this->load->view('mahasiswa/data_skripsi', $x);
	}
	public function ubah()
    {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[150]|matches[new_pass]');

		if($this->form_validation->run() == false){

			$this->load->view('mahasiswa/ubah_password');
		}else{

			// Update Data
			$data = array(
				'pass' => md5($this->input->post('new_pass'))
			);
			// Check Old {Password}
			$result = $this->m_mahasiswa->Check_Old_Password($this->session->userdata('ses_id'), md5($this->input->post('old_pass')));
			if($result > 0 AND $result === true ){
				// updata user data
				$result = $this->m_mahasiswa->Update_User_Data($this->session->userdata('ses_id'), $data);
				if($result > 0){
					$this->session->set_flashdata('success_msg', 'Password berhasil diubah');
					return redirect('mahasiswa/ubah');
				}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password baru tidak boleh sama');
					return redirect('mahasiswa/ubah');
				}
			}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password salah!');
					return redirect('mahasiswa/ubah');
				
			}
		}
		
	}
	function tambah_judul(){
		$tanggal = $this->input->post('tanggal');
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$prodi = $this->session->userdata('ses_prodi');
		$judul = $this->input->post('judul');
		$bidang = $this->input->post('bidang');
		$dosbing1= $this->input->post('dosbing1');
		$dosbing2= $this->input->post('dosbing2');
		$status = 0;
 
		$data = array(
			'tanggal' => $tanggal,
			'nama' => $nama,
			'nim' => $nim,
			'prodi' => $prodi,
			'judul' => $judul,
			'bidang' => $bidang,
			'dosbing1' => $dosbing1,
			'dosbing2' => $dosbing2,
			'status' => $status
			);
		$this->m_mahasiswa->input_data($data,'judul_skripsi');
		redirect('mahasiswa');
	}
}