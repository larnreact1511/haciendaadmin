<?php //echo $cant; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>hacienda Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view('admin/css'); ?>

  <!-- -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style>
      
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('admin/navbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view('admin/imgsidebar'); ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php $this->load->view('admin/imgperfil'); ?>
      </div>

      <!-- Sidebar Menu -->
      <?php $this->load->view('admin/sidebar'); ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-indigo"> Ventas</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!--   -->
        <div class="row">
            
            <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                               Ventas realizadas
                               
                            </h3>
                            <div class="card-tools">
                                <div style="display: none;" id="div_btn">
                                  <i onclick="agregarpago()" title="agregar abono" class="fas fa-plus fa-sm p-1"></i>
                                  <i onclick="verabonos()" class="fa fa-eye p-1" title ="ver abonos" aria-hidden="true"></i>
                                  <i onclick="agregorcomentario()"  class="fa fa-comment-o p-1" aria-hidden="true"></i>  
                                  <i onclick="verfactura()" class="fa fa-file-text-o p-1" aria-hidden="true"></i>
                                  <i onclick="exportarabonos()" class="fa fa-file-excel-o p-1" aria-hidden="true"></i>
                                </div>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse" style="display: none;">
                                    <i class="fas fa-minus p-1"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- -->
                            <table id="tablaventas" class="table" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th>Nombre </th>
                                        <th>Apellido </th>
                                        <th>Numero de factura </th>
                                        <th>Tipo de pago </th>
                                        <th>Tasa BCV  </th>
                                        <th>Subtotal </th>
                                        <th>Iva 16 </th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                
                            </table>
                            <!-- -->
                        </div>
                        
                    </div>
                </div>
            </div>
        
      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <div class="modal fade" id="modalabono" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> 
                      Agregar Abono
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="alert alert-light" role="alert" id="diverror_1" style="display: none;">
                      <label id ="error_1"></label>

                  </div>
                  <input type="text" class="form-control" id="idsales" name="idsales" readonly hidden>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="montoaboono">
                                Monto
                              </label>
                              <input type="number" class="form-control" id="montoaboono" name="montoaboono"  placeholder="Ingrese monto del abono">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="fechaabono">
                                Fecha Abono
                              </label>
                              <input type="date" class="form-control" id="fechaabono" name="fechaabono"  placeholder="Ingrese fecha abono">
                          </div>
                      </div>
                  </div>   
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" onclick="cerarmodal()">Cerrar</button>
                  <button type="button" class="btn btn-primary" onclick="guardar()">Guardar abono </button>
              </div>
          </div>
      </div>
  </div>
  <!-- -->
  <div class="modal fade" id="modalabonmos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> 
                      Abonos Realizados
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div>
                  <ul class="list-group" id="listaabonos">
                  </div>    
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" onclick="cerarmodal2()">Cerrar</button>
              </div>
          </div>
      </div>
  </div>
  <!-- -->
  <div class="modal fade" id="modalcommentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> 
                      Agregar tasa de cambio
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="alert alert-light" role="alert" id="diverror_1" style="display: none;">
                      <label id ="error_2"></label>

                  </div>
                  <input type="text" class="form-control" id="idsalesmonto" name="idsalesmonto"  readonly hidden>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="montotasacambio">
                                Expresado a tasa BCV 
                              </label>
                              <input 
                                type="number" 
                                class="form-control" 
                                id="montotasacambio" 
                                name="montotasacambio"  
                                placeholder=" Expresado a tasa BCV "
                                onkeypress="calcularmontos()"
                                onblur="calcularmontos()"
                              >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="montosubtotal">
                                Subtotal
                              </label>
                              <input type="number" class="form-control" id="montosubtotal" name="montosubtotal" readonly  placeholder=" Subtotal">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="monotiva16">
                                IVA 16%
                              </label>
                              <input type="number" class="form-control" id="monotiva16" name="monotiva16" readonly  placeholder="IVA 16%">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="montototal">
                                Total
                              </label>
                              <input type="number" class="form-control" id="montototal" name="montototal" readonly  placeholder="Total">
                          </div>
                      </div>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" onclick="cerarmodal3()">Cerrar</button>
                  <button type="button" class="btn btn-primary" onclick="guardar3()">Guardar </button>
              </div>
          </div>
      </div>
  </div>
  <!-- -->
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/footer'); ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/scrips'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let iva2 =0;
    let sub2 =0;
    let total2 =0;
    localStorage.setItem("sale_id",0);
    localStorage.setItem("iva2",0);
    localStorage.setItem("subtotal2",0);
    localStorage.setItem("total2",0);
    $( document ).ready(function() 
    {
        
        $('#tablaventas').DataTable(
        {
            processing: true,
            serverSide: true,
            ajax: '<?= base_url() ?>admin/todaslasventas',
            language:
                {
                    "url": "<?= base_url() ?>/assets/json/Spanish.json"
                },
            columns: 
            [
                
              {
                    orderable: false,
                    data: "null",
                    className: "center",
                    defaultContent:'',
                    render: function(data, type, row, meta) 
                    {
                      return  `<input type="radio" name="radioop" value="" onclick="datos('${row.sale_id}','${row.iva2}','${row.subtotal2}','${row.total2}')">`;
                    }
                },
                { data: 'nombre' },
                { data: 'apellido' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                      
                     if ( row.invoice_number )
                     {
                        return  `${row.invoice_number} `;
                     }
                     else
                      return '';                      
                    }
                }, 
                //{ data: 'payment_type' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                      
                     if (  (row.payment_type) && (row.payment_type =='venta a credito (TBD)')) 
                     {
                        return  `${row.payment_type} `;
                     }
                     else
                      return ''; 
                      
                    }
                },
                { data: 'exchangerate' },
                { data: 'subtotal' },
                { data: 'iva' },
                { data: 'total' },
                /*
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    defaultContent:'',
                    render: function(data, type, row, meta) 
                    {
                      // .toLocaleString('es-MX')
                      if (row.payment_type ===null)
                      {

                      }
                      else if (  (row.payment_type) && (row.payment_type =='venta a credito (TBD)') && (row.invoice_number !=null) ) 
                      {
                          return  `
                          <i onclick="agregarpago(${row.sale_id})" title="agregar abono" class="fas fa-plus fa-sm"></i>
                          <i onclick="verabonos(${row.sale_id})" class="fa fa-eye" title ="ver abonos" aria-hidden="true"></i><br>
                          <i onclick="agregorcomentario(${row.sale_id},'${row.iva2}','${row.subtotal2}','${row.total2}')"  class="fa fa-comment-o" aria-hidden="true"></i>  
                          <i onclick="verfactura(${row.sale_id})" class="fa fa-file-text-o" aria-hidden="true"></i><br>
                          <i onclick="exportarabonos(${row.sale_id})" class="fa fa-file-excel-o" aria-hidden="true"></i>`;
                      }
                    }
                },
                */
            ],
        });
    });
    function agregarpago()
    {
      $("#idsales").val(localStorage.getItem("sale_id"));
      $("#modalabono").modal("show");
    }
    function cerarmodal()
    {
      $("#idsales").val()
      $("#modalabono").modal("hide");
    }
    function cerarmodal2()
    {
      $("#modalabonmos").modal("hide");
    }
    function guardar()
    {
          if ($("#montoaboono").val() =='')
          {

          } 
          else
          {
            var datas = new FormData(); 
            datas.append("idsales",$("#idsales").val() );
            datas.append("montoaboono",$("#montoaboono").val() ); 
            datas.append("fechaabono",$("#fechaabono").val() );
            
            $.ajax(
            {
                url: "<?php echo base_url(); ?>admin/guardarabono",
                dataType: 'json', // what to expect back from the server                                                                  
                data: datas,
                processData: false,
                cache: false,
                contentType: false,
                type: 'post',
                success: function(data) 
                {
                    if (data)
                    {
                        if (data['result'])
                        {
                            //location.reload();
                            Swal.fire({
                            title: 'Abono realizado con exito',
                            showDenyButton: false,
                            showCancelButton: true,
                            confirmButtonText: 'ok',
                            
                          }).then((result) => 
                          {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                              //Swal.fire('Saved!', '', 'success')
                              location.reload();
                            } 
                            else if (result.isDenied) 
                            {
                              //Swal.fire('Changes are not saved', '', 'info')
                              location.reload();
                            }
                          });
                        }
                            
                        else
                        {
                          Swal.fire({
                            title: data['message'],
                            showDenyButton: false,
                            showCancelButton: true,
                            confirmButtonText: 'ok',
                            
                          }).then((result) => 
                          {
                            
                            if (result.isConfirmed) 
                            {
                              
                            } 
                            else if (result.isDenied) 
                            {
                              
                            }
                          })
                        }
                    }
                    else
                    {
                        
                    }

                }
            });
          }
            
    }
    function verabonos ()
    {
      var datas = new FormData(); 
      datas.append("idsales",localStorage.getItem("sale_id") );
      $.ajax(
      {
          url: "<?php echo base_url(); ?>admin/verabonos",
          dataType: 'json', // what to expect back from the server                                                                  
          data: datas,
          processData: false,
          cache: false,
          contentType: false,
          type: 'post',
          success: function(data) 
          {
              if (data)
              {
                  abonos = data['data'];
                  $("#listaabonos").html('')
                  abonos.forEach(element => 
                  {
                      $("#listaabonos").append(`<li class="list-group-item"> Abono de ${element.monto} el dia  ${element.fechapgo}</li>`);
                  });
                  $("#modalabonmos").modal("show");
              }
              else
              {
                Swal.fire('No hubo respuesta del servidor')
              }
          }
      });
    }
    function agregorcomentario()
    {
      iva2=iva;
      total2=total;
      sub2=sub;
      $("#idsalesmonto").val(id)
      $("#montotasacambio").val('');
      $("#monotiva16").val(iva);
      $("#montototal").val(total);
      $("#montosubtotal").val(sub);
      $("#error_2").html('');
      $("#error_2").css('display','none');
      $("#modalcommentario").modal("show");
    }
    function cerarmodal3()
    {
      $("#idsalesmonto").val('');
      $("#montotasacambio").val('');
      $("#monotiva16").val('');
      $("#montototal").val('');
      $("#montosubtotal").val('');
      $("#error_2").html('');
      $("#error_2").css('display','none');
      $("#modalcommentario").modal("hide");
    }
    function guardar3()
    {
          if ((  $("#idsalesmonto").val() =='') || (  $("#montotasacambio").val() =='')  || (  $("#monotiva16").val() =='')  || (  $("#montototal").val() =='') || (  $("#montosubtotal").val() =='') )
          {
              $("#error_2").html('Debe completar los datos para poder guardar tasa de cambio');
              $("#error_2").css('display','block');
          } 
          else
          {
            var datas = new FormData(); 
            datas.append("idsales",$("#idsalesmonto").val() );
            datas.append("montotasacambio",$("#montotasacambio").val() ); 
            datas.append("monotiva16",$("#monotiva16").val() );
            datas.append("montototal",$("#montototal").val() ); 
            datas.append("montosubtotal",$("#montosubtotal").val() );
            
            $.ajax(
            {
                url: "<?php echo base_url(); ?>admin/guardarcomentario",
                dataType: 'json', // what to expect back from the server                                                                  
                data: datas,
                processData: false,
                cache: false,
                contentType: false,
                type: 'post',
                success: function(data) 
                {
                    if (data)
                    {
                        if (data['result'])
                        {
                            //location.reload();
                            Swal.fire({
                            title: 'Tasa de cambio actulizada con exito',
                            showDenyButton: false,
                            showCancelButton: true,
                            confirmButtonText: 'ok',
                            
                          }).then((result) => 
                          {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) 
                            {
                              location.reload();
                            } 
                            else if (result.isDenied) 
                            {
                              location.reload();
                            }
                          });
                        }
                            
                        else
                        {
                          Swal.fire({
                            title: data['message'],
                            showDenyButton: false,
                            showCancelButton: true,
                            confirmButtonText: 'ok',
                            
                          }).then((result) => 
                          {
                            
                            if (result.isConfirmed) 
                            {
                              
                            } 
                            else if (result.isDenied) 
                            {
                              
                            }
                          })
                        }
                    }
                    else
                    {
                        
                    }

                }
            });
          }
            
    }
    function verfactura()
    {
      window.open('<?php echo base_url(); ?>/admin/mypdf2/'+localStorage.getItem("sale_id"), '_blank');
    }
    function calcularmontos(evt)
    {
        let m = $("#montotasacambio").val(); 
        $("#monotiva16").val( parseFloat(iva2)* parseFloat(m) );
        $("#montototal").val( parseFloat(total2)* parseFloat(m)  ); 
        $("#montosubtotal").val( parseFloat(sub2)* parseFloat(m) )
    }
    function exportarabonos()
    {
      let url ='<?php echo base_url(); ?>/admin/exportarabonos/'+localStorage.getItem("sale_id");
      window.open(url, 'excel', "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");    
    }
    function datos(id,iva,sub,total)
    {
      localStorage.setItem("sale_id",id);
      localStorage.setItem("iva2",iva);
      localStorage.setItem("subtotal2",sub);
      localStorage.setItem("total2",total);
      $("#div_btn").css("display","block")
    }
</script>
</body>
</html>
