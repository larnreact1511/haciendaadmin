<?php
class Ventas extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->library('session');	
    }
    public function todaslasventas($start,$length,$search)
    {
        
        
        $sqlbase="SELECT s.sale_id, s.invoice_number,
        sp.payment_type ,  FORMAT(sp.payment_amount,2,'de_DE') as payment_amount,
        FORMAT(sp.payment_amount,2,'de_DE') AS total, sp.payment_amount as total2,
        FORMAT(ot.exchangerate,4,'de_DE') AS exchangerate ,
        (SELECT SUM(t.item_tax_amount) FROM ospos_sales_items_taxes t WHERE t.sale_id = s.sale_id )AS iva2,
        FORMAT( (SELECT SUM(t.item_tax_amount) FROM ospos_sales_items_taxes t WHERE t.sale_id = s.sale_id)  ,2,'de_DE') AS iva,
        FORMAT( (sp.payment_amount -(SELECT SUM(t.item_tax_amount) FROM ospos_sales_items_taxes t WHERE t.sale_id = s.sale_id) ) ,2,'de_DE')  AS subtotal,
        (sp.payment_amount -(SELECT SUM(t.item_tax_amount) FROM ospos_sales_items_taxes t WHERE t.sale_id = s.sale_id) ) AS subtotal2,
        FORMAT(sp.payment_amount,2,'de_DE') AS total, sp.payment_amount as total2,
        op.first_name AS nombre, op.last_name AS apellido
        FROM ospos_sales s
        LEFT JOIN ospos_sales_payments sp ON s.sale_id = sp.sale_id 
        LEFT JOIN ospos_tasa ot ON ot.sale_id = s.sale_id
        LEFT JOIN ospos_people op  ON op.person_id = s.customer_id
        ORDER BY(s.sale_id) desc";

        $sql =$sqlbase ." LIMIT $start,$length";


        $v2=[];
        $cadena='';
        $this->load->database(); // cargar la base de datos
        if ($search['value']=='')
        {
            
            $vec['data']= @$this->db->query($sql)->result();
            $cant= @$this->db->query($sqlbase)->result();
            $vec['count']=count($cant);
        }
        else
        {
            $value = $search['value'];
            $sqlbus ="SELECT  op.person_id  FROM  ospos_people op  WHERE op.first_name  LIKE '%$value%'   OR op.last_name  LIKE '%$value%'";
            $v1 = @$this->db->query($sqlbus)->result();
            if (  count($v1) > 0 )
            {
                foreach ($v1 as $v11)
                {
                    array_push($v2, $v11->person_id);
                    $cadena = $cadena.''.$v11->person_id.',';
                }
                $cadena .='0';
                $sql="SELECT s.customer_id, s.employee_id, s.invoice_number, s.sale_type,s.sale_id, sp.payment_type ,  FORMAT(sp.payment_amount,2,'de_DE') as payment_amount ,FORMAT(ot.exchangerate,4,'de_DE') AS exchangerate ,FORMAT(ot.subtotal,4,'de_DE') AS subtotal,FORMAT(ot.iva,4,'de_DE') AS iva , FORMAT(ot.total,4,'de_DE') AS total, op.first_name AS nombre, op.last_name AS apellido FROM ospos_sales s LEFT JOIN ospos_sales_payments sp ON s.sale_id = sp.sale_id LEFT JOIN ospos_tasa ot ON ot.sale_id = s.sale_id LEFT JOIN ospos_people op  ON op.person_id = s.customer_id where s.sale_status =0 and s.customer_id IN (".$cadena.")";
                $vec['data']= @$this->db->query($sql)->result();
                $cant= @$this->db->query($sql)->result();
                $vec['count']=count($cant);
            }
            else
            {
                $vec['data']=[] ;
                $vec['count']=0;
            }   
        }
        return $vec;

    }
    public function guardarabono($insert)
    {
        $m=@$this->montos($insert['sale_id']);
        $mm=$m[0];
        $saldorestante = floatval($mm->montot) -  floatval($mm->montopagado) ;
        if (    floatval($insert['monto']) >= floatval($mm->montot)  ) // ingresa mas que el monto de la factura
        {
            return array('result'=>false,'message'=>'El monto de la factura es de '.$mm->montot. ' y esta ingresado '.$insert['monto'] );
        }
        else if  ( floatval($insert['monto'])  > floatval($saldorestante))  // ingresa mas que el saldo restante
        {
            return array('result'=>false,'message'=>'El monto de la restante  es de '.$saldorestante. ' y esta ingresado '.$insert['monto'] );
        }
        else if (  $this->db->insert('ospos_amortization',$insert) ) // guardo bien
        {
            return array('result'=>true,'message'=>' Abono ingresado con exito' );
        }    
        else // no guardo
            return array('result'=>false,'message'=>'No se pudo ingresar el abono');
    }

    function montos ($id)
    {
        $sql = "SELECT (SELECT SUM(sp.payment_amount) FROM ospos_sales_payments sp WHERE sp.sale_id =$id ) AS montot, (SELECT SUM(sa.monto) FROM ospos_amortization sa WHERE sa.sale_id =$id ) AS montopagado";
        return @$this->db->query($sql)->result();
    }

    public function verabonos($id)
    {
        $this->load->database(); 
        $resul = @$this->db->select('*')->where('sale_id',$id)->get('ospos_amortization')->result_array();
        return array('result'=>true,'message'=>'', 'data'=>$resul);
    }
    public function factura($id)
    {
            $sql1 ="SELECT os.*, osp.payment_amount  , ot.exchangerate, ot.subtotal, ot.total , 
            it.item_tax_amount AS iva
            FROM ospos_sales os 
            LEFT JOIN ospos_sales_payments osp ON osp.sale_id =os.sale_id 
            LEFT JOIN ospos_tasa ot ON ot.sale_id = os.sale_id 
            LEFT JOIN ospos_sales_items_taxes it ON it.sale_id =os.sale_id
            WHERE os.sale_id =$id";
            $data['sales']= @$this->db->query($sql1)->result();
            $sql2 ="SELECT * , i.name as nombrrproducto FROM ospos_sales_items osi LEFT JOIN ospos_items i ON i.item_id = osi.line   WHERE osi.sale_id =$id";
            $data['items']= @$this->db->query($sql2)->result();
            $sql3 ="SELECT * FROM ospos_app_config c WHERE c.`key` ='address' OR c.`key` ='company'  OR c.`key` ='phone' ; ";
            $data['info']= @$this->db->query($sql3)->result();
            //
            $this->db->from('ospos_customers');
            $this->db->join('ospos_people', 'ospos_people.person_id = ospos_customers.person_id');
            $this->db->where('ospos_customers.person_id', 2);
            $query = $this->db->get();
            $data['customer']=$query->row();
            return $data;
    }
    public function guardarcomentario($insert)
    {
        
        $sql ="SELECT COUNT(sale_id) cant FROM ospos_tasa WHERE sale_id =".$insert['sale_id']; 
        $c = @$this->db->query($sql)->result();
        if ( $c[0]->cant > 0)
        {
            if ($this->db->where('sale_id',$insert['sale_id'])->update('ospos_tasa', $insert))
                return array('result'=>true,'message'=>'Tasa de cambio actulizada con exito' );
            else
                return array('result'=>false,'message'=>'No se pudo ingresar la tasa de cambio');
        }
        else
        {
            if (  $this->db->insert('ospos_tasa',$insert) ) // guardo bien
            {
                return array('result'=>true,'message'=>'Tasa de cambio actulizada con exito' );
            }    
            else // no guardo
                return array('result'=>false,'message'=>'No se pudo ingresar la tasa de cambio');
        }
        
    }

    public function exportarabonos ($id)
    {
        $sql ="SELECT FORMAT(oa.monto,2,'de_DE') monto , oa.fechapgo FROM ospos_amortization oa WHERE oa.sale_id =".$id;
        $query = $this->db->query($sql); //echo $sql;
        $data = $query->result_array();
        return  $data;
    }
}