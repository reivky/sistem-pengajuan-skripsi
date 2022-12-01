<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}

	    // Cek apakah user login 
	    // sebagai administrator
	    $this->isAdmin();

		$this->load->model('m_kategori');
		$this->load->model('m_admin');

		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	 public function getUserData(){
	    // Ambil semua data session
	    $userData = $this->session->userdata();

	    // Return userdata
	    return $userData;
	  }

	  public function isAdmin()
	  {
	    // Mengambil data session
	    $userData = $this->getUserData();
	    // Jika level user bukan administrator
	    // maka redirect ke halaman sesuai hak akses
	   
                 if($userData['akses']=='admin'){ //Akses admin
                    $this->session->set_userdata('akses','admin');
 
                 }elseif($userData['akses']=='dosen'){ //akses dosen
                    $this->session->set_userdata('akses','dosen');
                    redirect('dosen');
                 }elseif($userData['akses']=='progdi'){ //akses kaprodi
                    $this->session->set_userdata('akses','progdi');
                    redirect('kaprodi');
                 }else{ //akses mahasiswa
                    $this->session->set_userdata('akses','mhs');
                    redirect('mahasiswa');
                 }
	  }

	function index(){ 
		$data = array(
			'jumlah_admin' =>  $this->m_admin->hitung_admin(),
			'jumlah_progdi' =>  $this->m_admin->hitung_progdi(),
			'jumlah_dosen' =>  $this->m_admin->hitung_dosen(),
			'jumlah_mahasiswa' =>  $this->m_admin->hitung_mahasiswa()
		);
		$this->load->view('home_admin', $data);
	}
	public function ubah()
    {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[150]|matches[new_pass]');

		if($this->form_validation->run() == false){

			$this->load->view('admin/ubah_password');
		}else{

			// Update Data
			$data = array(
				'password' => md5($this->input->post('new_pass'))
			);
			// Check Old {Password}
			$result = $this->m_admin->Check_Old_Password($this->session->userdata('id'), md5($this->input->post('old_pass')));
			if($result > 0 AND $result === true ){
				// updata user data
				$result = $this->m_admin->Update_User_Data($this->session->userdata('id'), $data);
				if($result > 0){
					$this->session->set_flashdata('success_msg', 'Password berhasil diubah');
					return redirect('admin/ubah');
				}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password baru tidak boleh sama');
					return redirect('admin/ubah');
				}
			}else{
					$this->session->set_flashdata('error_msg', '<b>Error: </b>Password salah!');
					return redirect('admin/ubah');
				
			}
		}
		
	}
	
	
	function dosen(){ 
		$y = array(
			'baseurl' =>base_url(),
			'fakultas1' => $this->m_admin->get_data_fakultas1()->result(),
			'fakultas2' => $this->m_admin->get_data_fakultas2()->result(),
			'fakultas3' => $this->m_admin->get_data_fakultas3()->result(),
			'data' => $this->m_kategori->get_kategori()
			 );
		$this->load->view('admin/data_dosen',$y);
	}
	function kaprodi(){ 
		$x['kprodi']=$this->m_admin->get_data_kaprodi()->result();
		$this->load->view('admin/data_kaprodi',$x);
	}
	function mahasiswa(){ 
		$x = array(
			'baseurl' =>base_url(),
			'data' => $this->m_kategori->get_kategori()
			 );
		$x['mhasiswa']=$this->m_admin->get_data_mahasiswa()->result();
		$this->load->view('admin/data_mahasiswa',$x);
	}
	function get_subkategori(){
        $id=$this->input->post('id');
        $data=$this->m_kategori->get_subkategori($id);
        echo json_encode($data);
    }
    function tambah_mahasiswa(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$fakultas = $this->input->post('fakultas');
		$prodi = $this->input->post('prodi');
		$password= $this->input->post('pass');
		$pass=md5($password);
		$akses = "mhs";
 
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'fakultas' => $fakultas,
			'prodi' => $prodi,
			'pass' => $pass,
			'akses' => $akses
			);
		$this->m_admin->input_data($data,'login_mahasiswa');
		redirect('admin/mahasiswa');
	}
	function hapus_mahasiswa($id){
		$where = array('nim' => $id);
		$this->m_admin->hapus_data($where,'login_mahasiswa');
		redirect('admin/mahasiswa');
	}
	function tambah_dosen(){
		$nidn = $this->input->post('nidn');
		$nama = $this->input->post('nama');
		$fakultas = $this->input->post('fakultas');
		$prodi = $this->input->post('prodi');
		$bidang = $this->input->post('bidang');
		$password= $this->input->post('password');
		$pass=md5($password);
		$akses = "dosen";
 
		$data = array(
			'nidn' => $nidn,
			'nama' => $nama,
			'fakultas' => $fakultas,
			'prodi' => $prodi,
			'bidang' => $bidang,
			'password' => $pass,
			'akses' => $akses
			);
		$this->m_admin->input_data($data,'login_dosen');
		redirect('admin/dosen');
	}
	function hapus_dosen($id){
		$where = array('nidn' => $id);
		$this->m_admin->hapus_data($where,'login_dosen');
		redirect('admin/dosen');
	}
	function tambah_kaprodi(){
		$prodi = $this->input->post('prodi');
		$nidn = $this->input->post('nidn');
		$nama = $this->input->post('nama');
		$password= $this->input->post('password');
		$pass=md5($password);
		$akses = "progdi";
 
		$data = array(
			'prodi' => $prodi,
			'nidn' => $nidn,
			'nama' => $nama,
			'password' => $pass,
			'akses' => $akses
			);
		$this->m_admin->input_data($data,'login_progdi');
		redirect('admin/kaprodi');
	}
	function hapus_progdi($id){
		$where = array('nidn' => $id);
		$this->m_admin->hapus_data($where,'login_progdi');
		redirect('admin/kaprodi');
	}
	
}