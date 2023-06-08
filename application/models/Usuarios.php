<?php
class Usuarios extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->library('session');	
    }
    public function loginverificar($datos)
    {
        $vec=[];
        $correo =$datos['usuarios_correo'];
        $clave =$datos['usuarios_password'];
        $sql ="select * from ospos_employees where username ='$correo' ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if ( count($data) > 0)
        {
            
            if ( password_verify($clave,$data[0]['password'] ) )
            {
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('person_id',$data[0]['person_id'] );
                $this->session->set_userdata('username',$data[0]['username'] );
                $vec =array('result'=>'200', 'mjs' =>'usuaio correcto');
            }
            else
            {
                $vec =array('result'=>'600', 'mjs' =>'La contraseña ingresada no es valdia','pass'=>$data[0]['password']);
            }
            
        }
        else
        {
            $vec =array('result'=>'400', 'mjs' =>'El usuario ingresado no existe');
        }
        return $vec;
    }
}

