<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Crud extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
        $this->load->helper('url');
    }
    function index(){
        $this->load->view('template/inc/header.php');
        $this->load->view('template/inc/footer.php');

        $data['daftar_game']=$this->m_data->getTable();
        //$data['daftar_game']=$this->m_data->tampil_data()->result();
        $this->load->view('v_daftargame.php',$data);
    }
    function tambah(){
        $this->load->view('template/inc/header.php');
        $this->load->view('v_input');
       $this->load->view('template/inc/footer.php');
    }
    function tambah_aksi(){
        $kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$ukuran = $this->input->post('ukuran');
		$genre = $this->input->post('genre');
		$spek = $this->input->post('spek');
		$jenis = $this->input->post('jenis');
		$dev = $this->input->post('dev');
		$date = $this->input->post('date');
        $foto = $this->input->post('foto');
        
        $data = array(
			'kode_gm'=>$kode,
			'nama_gm'=>$nama,
			'ukuran'=>$ukuran,
			'genre'=>$genre,
			'spesifikasi'=>$spek,
			'idJen'=>$jenis,
			'developer'=>$dev,
			'tahun_rilis'=>$date,
            'foto'=>$foto);
            
        $this->m_data->input_data($data,'daftar_game');
        redirect('<?php echo site_url("Home"); ?>');
    }
   function edit($kode){
       $this->load->model('m_data');
       $kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$ukuran = $this->input->post('ukuran');
		$genre = $this->input->post('genre');
		$spek = $this->input->post('spek');
		$jenis = $this->input->post('jenis');
		$dev = $this->input->post('dev');
		$date = $this->input->post('date');
        $foto = $this->input->post('foto');

        $data = array(
			'nama_gm'=>$nama,
			'ukuran'=>$ukuran,
			'genre'=>$genre,
			'spesifikasi'=>$spek,
			'idJen'=>$jenis,
			'developer'=>$dev,
			'tahun_rilis'=>$date,
            'foto'=>$foto);
        
            $save=$this->m_data->update($data, $kode);
            if($save) {
                 $this->session->set_flashdata('msg_success', 'Data telah diubah!');
             } else {
                 $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
             }
              redirect('<?php echo site_url("Home"); ?>');
   }
   function delete($kode_gm){
       $this->load->model('m_data');
       $delete = $this->m_data->delete($kode_gm);

        redirect('<?php echo site_url("Home"); ?>');
   }
  
}