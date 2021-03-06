<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $metodo = $this->router->fetch_method();
    if(!isset($_SESSION['gale_user']) && $metodo != 'login'){
      redirect('admin/login');
    }
  }

  function index()
  {
    $this->load->view('admin/inicio');
  }
  function login(){
      $this->load->view('admin/login');
  }
  function salir(){
    unset($_SESSION['gale_user']);
    redirect('admin/login');
  }
  function edit($cod=0){
    if($cod == 0){
      redirect('admin');
    }
    $d = array();
    $d['cod'] = $cod;
    $this->load->view('admin/edit',$d);
  }
  function delete($cod=0){
    if($cod == 0){
      redirect('admin');
    }
    $CI =& get_instance();
    $CI->db->where('id',$cod);
    $CI->db->delete('imagenes');
    $dir = 'C:/xampp/htdocs/galeria/fotos/';
    $file =  $dir.$cod.'.jpg';
    unlink($file);
    redirect('admin');

  }

}
