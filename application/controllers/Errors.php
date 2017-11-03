<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');


class Errors extends CI_Controller
{
 private $data = array();

 function __construct()
 {
 parent::__construct();
 $this->load->helper('html');
 }

 function error_404()
 {
  $dados['tela'] = 'errors/404';
  $this->load->view('view_home', $dados);
 }

 function error_500()
 {
  $dados['tela'] = 'errors/404';
  $this->load->view('view_home', $dados);
 }
}
