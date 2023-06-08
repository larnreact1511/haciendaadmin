<?php
class Administracion extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->library('session');	
    }
    
    public function guardartabla($datos,$tabla)
    {
        if ($tabla ==1 )
            $this->db->insert('ap',$datos);
        else if ($tabla ==2 )
            $this->db->insert('electrocardiograma',$datos);
        else if ($tabla ==3 )
            $this->db->insert('examen_fisico',$datos);
        else 
            $this->db->insert('paraclinicos',$datos);     

        return array('result'=>2,'mjs'=>'');
    }

    public function listartablas ($nro,$search,$tabla) 
    {
        $this->load->database(); // cargar la base de datos
        if ($nro==1)
            $limit =0;
        else
            $limit=($nro-1) *10;
        $this->load->database(); // cargar la base de datos

        if ($tabla==1) // ap
        {
            if ($search['value']=='')
            {
                $vec['data']= @$this->db->select('ap_id,ap_des, ap_tipo')->limit(10,$limit)->get('ap')->result_array();
                $cant= @$this->db->select('ap_id,ap_des, ap_tipo')->limit(10,$limit)->get('ap')->result_array();
            }
            else
            {
                $array = array('ap_des' => $search['value']);
                $vec['data']= @$this->db->select('ap_id,ap_des,ap_tipo')
                ->like($array)
                ->get('ap')->result_array();
                $cant =$vec['data'];
            }
            $vec['count']=count($cant);
        }
        else if ($tabla==2) //electrocardiograma
        {
            if ($search['value']=='')
            {
                $vec['data']= @$this->db->select('electro_id,electro_des,electro_tipo')->limit(10,$limit)->get('electrocardiograma')->result_array();
                $cant= @$this->db->select('electro_id,electro_des,electro_tipo')->limit(10,$limit)->get('electrocardiograma')->result_array();
            }
            else
            {
                $array = array('electro_des' => $search['value']);
                $vec['data']= @$this->db->select('electro_id,electro_des,electro_tipo')
                ->like($array)
                ->get('electrocardiograma')->result_array();
                $cant =$vec['data'];
            }
            $vec['count']=count($cant);
        }
        else if ($tabla==3) // examen_fisico
        {
            if ($search['value']=='')
            {
                $vec['data']= @$this->db->select('examen_id,examen_des,examen_tipo')->limit(10,$limit)->get('examen_fisico')->result_array();
                $cant= @$this->db->select('examen_id,examen_des,examen_tipo')->limit(10,$limit)->get('examen_fisico')->result_array();
            }
            else
            {
                $array = array('examen_des' => $search['value']);
                $vec['data']= @$this->db->select('examen_id,examen_des,examen_tipo')
                ->like($array)
                ->get('examen_fisico')->result_array();
                $cant =$vec['data'];
            }
            $vec['count']=count($cant);
        }
        else  // paraclinicos
        {
            if ($search['value']=='')
            {
                $vec['data']= @$this->db->select('paraclinico_id,paraclinico_des')->limit(10,$limit)->get('paraclinicos')->result_array();
                $cant= @$this->db->select('paraclinico_id,paraclinico_des')->limit(10,$limit)->get('paraclinicos')->result_array();
            }
            else
            {
                $array = array('paraclinico_des' => $search['value']);
                $vec['data']= @$this->db->select('paraclinico_id,paraclinico_des')
                ->like($array)
                ->get('paraclinicos')->result_array();
                $cant =$vec['data'];
            }
            $vec['count']=count($cant);
        }
        return $vec;
    }
    public function listartablasalls ($tabla) 
    {
        
        if ($tabla==1) // ap
        {
            return @$this->db->select('ap_id,ap_des, ap_tipo')->get('ap')->result_array();
        }
        else if ($tabla==2) //electrocardiograma
        {
            return @$this->db->select('electro_id,electro_des,electro_tipo')->get('electrocardiograma')->result_array();
        }
        else if ($tabla==3) // examen_fisico
        {
            return @$this->db->select('examen_id,examen_des,examen_tipo')->get('examen_fisico')->result_array();
        }
        else  // paraclinicos
        {
            return @$this->db->select('paraclinico_id,paraclinico_des')->get('paraclinicos')->result_array();
        }
    }
}

