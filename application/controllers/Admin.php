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

}
