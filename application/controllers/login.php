<?php 

class login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('login_model');

	}
	
	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $akses=htmlspecialchars($this->input->post('akses',TRUE),ENT_QUOTES);
 
        $cek_dosen=$this->login_model->auth_dosen($username,$password,$akses);
        $cek_admin=$this->login_model->auth_admin($username,$password,$akses);
        $cek_progdi=$this->login_model->auth_progdi($username,$password,$akses);
 
        if($cek_dosen->num_rows() > 0){ //jika login sebagai dosen 
                        $data=$cek_dosen->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['akses']=='dosen'){ //Akses kaprodi
                    $this->session->set_userdata('akses','dosen');
                    $this->session->set_userdata('ses_id',$data['nidn']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('dosen');
 
                 }
        }
        elseif ($cek_progdi->num_rows() > 0){ //jika login sebagai progdi
                        $data=$cek_progdi->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['akses']=='progdi'){ //Akses progdi
                    $this->session->set_userdata('akses','progdi');
                    $this->session->set_userdata('ses_id',$data['nidn']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_prodi',$data['prodi']);
                    redirect('kaprodi');
 
                 }
 
        }

        elseif ($cek_admin->num_rows() > 0){ //jika login sebagai admin
                        $data=$cek_admin->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['akses']=='admin'){ //Akses admin
                    $this->session->set_userdata('akses','admin');
                    $this->session->set_userdata('ses_nama',$data['username']);
                    $this->session->set_userdata('id',$data['id']);
                    redirect('admin');
 
                 }
 
        }
        else{ //jika login sebagai mahasiswa
                    $cek_mahasiswa=$this->login_model->auth_mahasiswa($username,$password,$akses);
                    if($cek_mahasiswa->num_rows() > 0){
                            $data=$cek_mahasiswa->row_array();
                   		 	$this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','mhs');
                            $this->session->set_userdata('ses_id',$data['nim']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            $this->session->set_userdata('ses_prodi',$data['prodi']);
                            redirect('mahasiswa');
                    }else{
                            echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Username atau password salah!
                                </div>');
                            redirect('login');
					}

        }
 
    }
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	public function index()
        {

			$data = array(
							'base_url' => base_url()
          				);

            $this->load->view("v_login",$data);
        }
}