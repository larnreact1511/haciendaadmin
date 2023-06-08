<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		
		$this->load->helper('url');
		$this->load->library('session');
		if (  !$this->session->userdata('login') )
			redirect(base_url());
		$this->load->view('admin/ventas');
	}
	public function guardaradmin ()
	{
		if ($_REQUEST['valor']=='')
		{
			$res =array('result'=>1,'mjs'=>' Debe ingresar un valor');
		}
		else if ($_REQUEST['tabla']=='')
		{
			$res =array('result'=>1,'mjs'=>' Debe ingresar un valor');
		}
		else if ($_REQUEST['tabla'] < 0)
		{
			$res =array('result'=>1,'mjs'=>' Debe ingresar un valor');
		}
		else
		{
			$this->load->model('Administracion');
			if ($_REQUEST['tabla']==1)
			{
				$datos=array('ap_des'=>$_REQUEST['valor'], 'ap_tipo'=>$_REQUEST['tipo']);
			}
			else  if ($_REQUEST['tabla']==2)
			{
				$datos=array('electro_des'=>$_REQUEST['valor'],'electro_tipo'=>$_REQUEST['tipo']);
			}
			else  if ($_REQUEST['tabla']==3)
			{
				$datos=array('examen_des'=>$_REQUEST['valor'],'examen_tipo'=>$_REQUEST['tipo']);
			}
			else  
			{
				$datos=array('paraclinico_des'=>$_REQUEST['valor'],'paraclinico_tipo'=>$_REQUEST['tipo']);
			}
			$res =$this->Administracion->guardartabla($datos,$_REQUEST['tabla']);
		}
		echo json_encode($res);
	}
	public function crearcita($id)
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Administracion');
		$search['value'] ='';
		$data['listaap']=  $this->Administracion->listartablasalls(1);
		$data['listaelectro']=  $this->Administracion->listartablasalls(2);
		$data['listaexamenfisico']=  $this->Administracion->listartablasalls(3);
		$data['listapara']=  $this->Administracion->listartablasalls(4);
		$this->load->view('admin/crearcita',$data);
	}
	public function listatabla1()
	{
		$this->load->model('Administracion');
		$search=$_REQUEST['search'];
		$data=  $this->Administracion->listartablas($_REQUEST['draw'],$search,1);
        $dataresponce['draw'] =$_REQUEST['draw'];
        $dataresponce['recordsTotal'] =$data['count'];
        $dataresponce['recordsFiltered'] =$data['count'];
        $dataresponce['data']=$data['data'];
        echo json_encode($dataresponce);
	}
	public function listatabla2()
	{
		$this->load->model('Administracion');
		$search=$_REQUEST['search'];
		$data=  $this->Administracion->listartablas($_REQUEST['draw'],$search,2);
        $dataresponce['draw'] =$_REQUEST['draw'];
        $dataresponce['recordsTotal'] =$data['count'];
        $dataresponce['recordsFiltered'] =$data['count'];
        $dataresponce['data']=$data['data'];
        echo json_encode($dataresponce);
	}
	public function listatabla3()
	{
		$this->load->model('Administracion');
		$search=$_REQUEST['search'];
		$data=  $this->Administracion->listartablas($_REQUEST['draw'],$search,3);
        $dataresponce['draw'] =$_REQUEST['draw'];
        $dataresponce['recordsTotal'] =$data['count'];
        $dataresponce['recordsFiltered'] =$data['count'];
        $dataresponce['data']=$data['data'];
        echo json_encode($dataresponce);
	}
	public function listatabla4()
	{
		$this->load->model('Administracion');
		$search=$_REQUEST['search'];
		$data=  $this->Administracion->listartablas($_REQUEST['draw'],$search,14);
        $dataresponce['draw'] =$_REQUEST['draw'];
        $dataresponce['recordsTotal'] =$data['count'];
        $dataresponce['recordsFiltered'] =$data['count'];
        $dataresponce['data']=$data['data'];
        echo json_encode($dataresponce);
	}
	public function evento()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Administracion');
		$data['result'] ='';
		$data['mjs'] ='';
		$this->load->view('admin/evento',$data);
	}
	public function crearevento()
	{
		$nombre =time();
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name']			= $nombre;
		$this->load->model('Demoo');
		$post = @$this->input->post(null, true);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());
				$data['result'] =305;
				$data['mjs'] =$error;
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$data=array(
					'event_titulo'=>$post['tituloevento'],
					'event_fecha'=>$post['fechaevento'],
					'event_descripcorta'=>$post['descripcion'],
					'event_descriplarga'=>'',
					'img'=>$nombre);
				$result =$this->Demoo->agregarevento($data);
				$data['result'] =$result['result'];
				$data['mjs'] =$result['mjs'];
		}
		$this->load->view('admin/evento',$data);
	}

	public function ventas()
	{
		$this->load->helper('url');
		$this->load->library('session');
		if (  !$this->session->userdata('login') )
			redirect(base_url());
		$this->load->view('admin/ventas');
	}
	// hacienda
	public function todaslasventas()
	{
		$this->load->model('ventas');
		$search=$_REQUEST['search'];
		$data=  $this->ventas->todaslasventas($_REQUEST['draw'],$search);
        $dataresponce['draw'] =$_REQUEST['draw'];
        $dataresponce['recordsTotal'] =$data['count'];
        $dataresponce['recordsFiltered'] =$data['count'];
        $dataresponce['data']=$data['data'];
        echo json_encode($dataresponce);
	}
	public function guardarabono()
	{
		$res =[];
		if ( (isset($_REQUEST['idsales'])) && (isset($_REQUEST['montoaboono'])) )
		{
			$this->load->model('ventas');
			$insert =array(
				'sale_id'=>$_REQUEST['idsales'],
				'monto'=>$_REQUEST['montoaboono'],
				'fechapgo'=>$_REQUEST['fechaabono']
			);
			$res=  $this->ventas->guardarabono($insert);
		}
		else
		{
			$res = array('result'=>false,'message'=>'faltan datos para poder validar el abono');
		}
		echo json_encode($res);
	} 
	public function verabonos()
	{
		if ( isset($_REQUEST['idsales']) )
		{
			$this->load->model('ventas');
			$res=  $this->ventas->verabonos($_REQUEST['idsales']);
		}
		else
		{
			$res = array('result'=>false,'message'=>'No se pudo encontrar factura');
		}
		echo json_encode($res);
	}
	public function mypdf()
	{
		/*
		$this->load->library('pdf');
		$this->pdf->load_view('examples/pdfexample');
		$this->pdf->render();
		$this->pdf->stream("pdfexample");
		*/
		$this->load->library('pdf');
        $html = $this->load->view('examples/pdfexample', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
	}
	public function mypdf2($id)
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('ventas');
		$data = $this->ventas->factura($id);
		$data['nro'] =$id;
		$this->load->library('pdf');
		//echo "<pre>";print_r($data); die;
		$this->load->view('examples/pdfexample2',$data);
		//$html = file_get_contents($this->load->view('examples/pdfexample2',$data)); 
		//$html = $this->load->view('examples/pdfexample2', $data, true);
        //$this->pdf->createPDF($html, 'mypdf', false);
	}
	public function mypdf3($id)
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('ventas');
		$data = $this->ventas->factura($id);
		$data['nro'] =$id;
		$this->load->library('pdf');
		//echo "<pre>";print_r($data); die;
		//$this->load->view('examples/facturapdf',$data);
		//$html = file_get_contents($this->load->view('examples/pdfexample2',$data)); 
		$html = $this->load->view('examples/facturapdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
	}
	public function guardarcomentario()
	{
		
		if ( (isset($_REQUEST['idsales'])) && (isset($_REQUEST['montotasacambio'])) && (isset($_REQUEST['monotiva16'])) && (isset($_REQUEST['montototal']))  && (isset($_REQUEST['montosubtotal']))  )
		{
			$this->load->model('ventas');
			$insert =array(
				'sale_id'=>$_REQUEST['idsales'],
				'exchangerate'=>$_REQUEST['montotasacambio'],
				'iva'=>$_REQUEST['monotiva16'],
				'total'=>$_REQUEST['montototal'],
				'subtotal'=>$_REQUEST['montosubtotal']
			);
			$res=  $this->ventas->guardarcomentario($insert);
		}
		else
		{
			$res = array('result'=>false,'message'=>'faltan datos para poder validar');
		}
		echo json_encode($res);
	} 
	public function loginverificar()
	{
		$this->load->helper('url');
		$this->load->model('usuarios');
		// $this->input->post('email'),
		// $this->input->post('password')
		if ( ($this->input->post('email')) && ($this->input->post('password')) )
		{
			$data = array(
				'usuarios_correo' => $this->input->post('email'),
				'usuarios_password' => $this->input->post('password')
			);
			echo json_encode($this->usuarios->loginverificar($data));
		}
		else
		{
			echo json_encode( array('result'=>'400', 'mjs' =>'Datos incompletos') );
		}
		
	}

	public function salir()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->session->set_userdata('login',false);
		redirect(base_url());
	}
	public function is_logged_in()
	{
		return ($this->session->userdata('login'));
	}
}
