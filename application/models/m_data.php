<?php
class M_data extends CI_Model{
    //function tampil_data(){
    //    return $this->db->get('daftar_game');
    //}
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    function getTable(){
        $this->db->select('*');
        $this->db->from('daftar_game');
        $this->db->join('jenis_game','daftar_game.idJen = jenis_game.idJen');
        $query = $this->db->get();
        return $query->result();
    }
    function update($data, $kode){
        return $this->db->where('kode_gm',$kode)->update('daftar_game',$data);
    }
    function delete($kode_gm){
        return $this->db->where('kode_gm',$kode_gm)->delete('daftar_game');
        
    }
}