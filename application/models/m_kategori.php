<?php
class M_kategori extends CI_Model{
 
    function get_kategori(){
        $hasil=$this->db->query("SELECT * FROM kategori");
        return $hasil;
    }
 
    function get_subkategori($id){
        $hasil=$this->db->query("SELECT * FROM subkategori WHERE subkategori_fakultas='$id'");
        return $hasil->result();
    }
}