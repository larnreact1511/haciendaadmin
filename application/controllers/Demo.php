<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->view('demo/inicio');
	}
	public function login()
	{
		$this->load->helper('url');
		$this->load->view('demo/login');
	}

	public function loginverificar()
	{
		$this->load->helper('url');
		//$this->load->helper('utils');
		$this->load->model('Demoo');
		$data = array(
			'usuarios_correo' => $this->input->post('email'),
			'usuarios_password' => $this->input->post('password')
		);
		echo json_encode($this->Demoo->login($data));
	}
	public function dashboard()
	{
		//$this->load->library('session');
		//echo $this->session->userdata('usuarios_nombre');
		$this->load->helper('url');
		$this->load->view('admin/dashboard');
	}
	public  function registro()
	{
		$this->load->helper('url');
		$this->load->view('demo/registro');
	}

	public function listadoclientes()
	{
		$this->load->model('Demoo');
		$data= $this->Demoo->listadoclientes($_REQUEST['draw']);  //echo $_REQUEST['draw'];  die;
        $dataresponce['draw'] =$_REQUEST['draw'];
        $dataresponce['recordsTotal'] =$data['count'];
        $dataresponce['recordsFiltered'] =$data['count'];
        $dataresponce['data']=$data['data'];
        echo json_encode($dataresponce);
	}
	public function agregarregistro()
	{
		$this->load->model('Demoo');
		$cedula =$this->input->post('cedula');

		if (isset($cedula))
		{
			if ($this->Demoo->consultarcedula($cedula) )
				echo json_encode($vec =array('result'=>'300', 'mjs' =>'La cedula ya existe'));
			else
			{
				$nombre=$this->input->post('nombre');
				$apellido =$this->input->post('apellido');
				$code=$this->input->post('code');
				$nro =$this->input->post('nro');
				$correo=$this->input->post('correo');

				$data=array(
					'cliente_cedula'=>$cedula,
					'cliente_nombre'=>$nombre,
					'cliente_apellido'=>$apellido,
					'cliente_codewp'=>$code,
					'cliente_nrowap'=>$nro,
					'cliente_correo'=>$correo);
				echo json_encode($this->Demoo->agregarregistro($data));
			}
		}
		else
		{
			echo json_encode($vec =array('result'=>'300', 'mjs' =>'Debe agregar una cedula'));
		}
			
	}
}
