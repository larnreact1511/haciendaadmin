<?php
class Demoo extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->library('session');	
    }
    
    public function login($datos)
    {
        $vec=[];
        $correo =$datos['usuarios_correo'];
        $clave =$datos['usuarios_password'];;
        $sql ="select * from usuarios where usuarios_correo ='$correo' ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if ( count($data) > 0)
        {
            $sql2 ="select * from usuarios where usuarios_correo ='$correo' and  usuarios_password ='$clave' ";
            $query2 = $this->db->query($sql2);
            $data2= $query2->result_array();
            if ( count($data2) > 0)
            {
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('usuarios_id',$data2[0]['usuarios_id'] );
                $this->session->set_userdata('usuarios_nombre',$data2[0]['usuarios_nombre'] );
                $this->session->set_userdata('usuarios_apellido',$data2[0]['usuarios_apellido'] );
                $this->session->set_userdata('usuarios_perfil',$data2[0]['usuarios_perfil'] );
                $vec =array('result'=>'200', 'mjs' =>'usuaio correcto');
            }
            else
            {
                $vec =array('result'=>'600', 'mjs' =>'La contraseña ingresada no es valdia');
            }
           
        }
        else
        {
            $vec =array('result'=>'400', 'mjs' =>'El usuario ingresado no existe');
        }
        return $vec;
    }
    function dashboard()
    {
        echo $this->session->userdata('usuarios_nombre');
    }
    function listadoclientes($nro)
    {
        if ($nro==1)
            $limit =0;
        else
            $limit=($nro-1) *10;
        $this->load->database(); // cargar la base de datos
        $vec['data']=  @$this->db
            ->select('cliente_id,cliente_cedula,cliente_nombre,cliente_apellido,cliente_codewp,cliente_nrowap,cliente_correo')
            ->limit(10,$limit)  
            ->get('clientes')
            ->result_array();
        $vec['count']=count($vec['data']);
        return $vec;
    }
    function agregarregistro($datos)
    {
        if ($this->db->insert('clientes',$datos))
            return $vec =array('result'=>'200', 'mjs' =>'Registro agreado');
        else
            return $vec =array('result'=>'300', 'mjs' =>'NO agrego');
    }
    function consultarcedula($cedula)
    {
        $cedula=trim($cedula);
        $sql2 ="select * from clientes where cliente_cedula ='$cedula' ";
        $query2 = $this->db->query($sql2);
        $data2= $query2->result_array();
        if ( count($data2) > 0)
            return true;
        else
            return false;
        
    }

    public function agregarevento($datos)
    {
        if ($this->db->insert('eventos',$datos))
            return $vec =array('result'=>'200', 'mjs' =>'Registro agreado');
        else
            return $vec =array('result'=>'300', 'mjs' =>'NO agrego');
    }
}

