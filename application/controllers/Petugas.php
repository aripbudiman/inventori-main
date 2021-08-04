<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Petugas extends CI_Controller
{
    function __construct(){
		  parent::__construct();

      if(!isset($this->session->userdata['username'])) {
        $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
        redirect('auth');
      }
      
      if($this->session->userdata['username']  != 'admin') {
        redirect('dashboard');
      }
      $this->load->model('MPetugas');

    } 
    
  function index(){

    $data['petugas'] = $this->MPetugas->data_petugas();
    

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/petugas/vsatuan', $data);
    $this->load->view('templates/footer/tabel');
  }

  function update_view($id){

    $satuan = $this->MPetugas->getpetugasbyid($id);
    $data['petugas'] = $petugas[0];

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/petugas/veditsatuan', $data);
    $this->load->view('templates/footer/tabel');
  }

  function save_data()
  { //data diri

    // print_r($barangno);
    $petugas  = $this->input->post('petugas');

    $data = array(
        'satuan_barang' => $petugas
    );

    $this->MPetugas->input_data($data, 'tbl_petugas');
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Berhasil Ditambahkan
        </div>');
    redirect('Petugas-view');

  }

  function delete($id)
  {
    $where = array ('pk_petugas_id' => $id);
    $hasil = $this->MPetugas->hapus_data($where, 'tbl_petugas');
    
    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
    Data Berhasil Dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>');
    
    redirect('Petugas-view');
      
  }

  function add_view()
  {
    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/petugas/vaddsatuan');
    $this->load->view('templates/footer/tabel');
  }

  function update_save()
  {
    $petugas_id  = $this->input->post('petugas_id');
    $petugas  = $this->input->post('petugas');

    $data = array(
        'nama_petugas' => $petugas
    );

    $where = array(
        'pk_petugas_id' => $petugas_id
    );

      $this->MPetugas->update_data($where,$data, 'tbl_petugas');
      $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">Data Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('Satuan-view');

  }


}
