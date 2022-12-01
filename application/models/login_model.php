<?php
class Login_model extends CI_Model{
    //cek nip dan password dosen
    function auth_dosen($username,$password,$akses){
        $query=$this->db->query("SELECT * FROM login_dosen WHERE nidn='$username' AND password=MD5('$password') AND akses='$akses' LIMIT 1");
        return $query;
    }
    function auth_progdi($username,$password,$akses){
        $query=$this->db->query("SELECT * FROM login_progdi WHERE nidn='$username' AND password=MD5('$password') AND akses='$akses' LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password,$akses){
        $query=$this->db->query("SELECT * FROM login_mahasiswa WHERE nim='$username' AND pass=MD5('$password') AND akses='$akses' LIMIT 1");
        return $query;
    }
    function auth_admin($username,$password,$akses){
        $query=$this->db->query("SELECT * FROM login_admin WHERE username='$username' AND password=MD5('$password') AND akses='$akses' LIMIT 1");
        return $query;
    }
 }