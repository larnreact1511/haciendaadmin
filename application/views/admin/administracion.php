<?php //echo $cant; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ciclogym</title>
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
            <h1 class="m-0 text-indigo"> Administración</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- car antecedentes personales  -->
        <div class="row">
            <!-- -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Antecedentes Personales 
                            <i onclick="abrirmodal(1)" class="fas fa-plus fa-sm"></i> 
                        </h3>

                           
                        
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- -->
                        <table id="tablaap" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo </th>
                                    <th>Accion </th>
                                </tr>
                            </thead>
                            
                        </table>
                        <!-- -->
                    </div>
                    
                </div>
            </div>
            <!-- -->
        </div>
        <!-- car electrocardiograma  -->
        <div class="row">
            <!-- -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Electrocardigrama 
                            <i onclick="abrirmodal(2)" class="fas fa-plus fa-sm"></i> 
                        </h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- -->
                        <table id="tablaelectrocardiograma" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>tipo</th>
                                    <th>Accion </th>
                                </tr>
                            </thead>
                            
                        </table>
                        <!-- -->
                    </div>
                    
                </div>
            </div>
            <!-- -->
        </div>
        <!-- car Examen ficiso  -->
        <div class="row">
            <!-- -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Examen Fisico
                            <i onclick="abrirmodal(3)" class="fas fa-plus fa-sm"></i>  
                        </h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- -->
                        <table id="tablaexamenfisico" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Accion </th>
                                </tr>
                            </thead>
                            
                        </table>
                        <!-- -->
                    </div>
                    
                </div>
            </div>
            <!-- -->
        </div>
        <!-- car Paraclinico -->
        <div class="row">
            <!-- -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Paraclinico 
                            <i onclick="abrirmodal(4)" class="fas fa-plus fa-sm"></i> 
                        </h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- -->
                        <table id="tablaparaclinicos" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Accion </th>
                                </tr>
                            </thead>
                            
                        </table>
                        <!-- -->
                    </div>
                    
                </div>
            </div>
            <!-- -->
        </div>
      </div>
    </section>
    
    <!-- /.content -->
  </div>
<div class="modal fade" id="exampleModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> 
                    Agregar Antecedentes Personales 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light" role="alert" id="diverror_1" style="display: none;">
                    <label id ="error_1"></label>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre Antecendete personal
                            </label>
                            <input type="email" class="form-control" id="ap_des" name="ap_des"  placeholder="Antecedente personal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipooap"> Tipo</label>
                            <select class="form-control" id="tipooap">
                                <option value ="1"> Si/ NO</option>
                                <option value ="2"> Texto</option>
                            </select>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerarmodal(1)">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardar(1)">Guardar Antecedente </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> 
                    Agregar Electrocardiograma
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light" role="alert" id="diverror_2" style="display: none;">
                    <label id ="error_2"></label>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre Electrocardiograma
                            </label>
                            <input type="email" class="form-control" id="electro_des" name="electro_des"  placeholder="Electrocardiograma">
                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipoelectro_tipo"> Tipo</label>
                            <select class="form-control" id="tipoelectro_tipo">
                                <option value ="1"> Si/ NO</option>
                                <option value ="2"> Texto</option>
                            </select>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerarmodal(2)">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardar(2)">Guardar Electrocardiograma </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> 
                    Agregar Examén Fisico 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light" role="alert" id="diverror_3" style="display: none;">
                    <label id ="error_3"></label>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre Examen Fisico
                            </label>
                            <input type="email" class="form-control" id="examen_des" name="examen_des"  placeholder="Examen fisico">
                        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="examen_tipo"> Tipo</label>
                            <select class="form-control" id="examen_tipo">
                                <option value ="1"> Si/ NO</option>
                                <option value ="2"> Texto</option>
                            </select>
                        </div>
                    </div>
                </div> 
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerarmodal(3)">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardar(3)">Guardar Examen </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> 
                    Agregar Paraclinico
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light" role="alert" id="diverror_4" style="display: none;">
                    <label id ="error_4"></label>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre Paraclinico
                            </label>
                            <input type="email" class="form-control" id="paraclinico_des"  placeholder="Paraclinico">
                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paraclinico_tipo"> Tipo</label>
                            <select class="form-control" id="paraclinico_tipo">
                                <option value ="1"> Si/ NO</option>
                                <option value ="2"> Texto</option>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerarmodal(4)">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardar(4)">Guardar Paraclinico</button>
            </div>
        </div>
    </div>
</div>
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
<script>
    $( document ).ready(function() 
    {
        $('#tablaap').DataTable(
        {
            processing: true,
            serverSide: true,
            ajax: '<?= base_url() ?>admin/listatabla1',
            language:
                {
                    "url": "<?= base_url() ?>/assets/json/Spanish.json"
                },
            columns: 
            [
                { data: 'ap_des' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        if ( row.ap_tipo==1)
                            return `SI / NO`; //
                        else
                            return `Texto`;     
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        return ``; // row.ap_id
                    }
                },
            
            ],
        });
        //
        $('#tablaelectrocardiograma').DataTable(
        {
            processing: true,
            serverSide: true,
            ajax: '<?= base_url() ?>admin/listatabla2',
            language:
                {
                    "url": "<?= base_url() ?>/assets/json/Spanish.json"
                },
            columns: 
            [
                { data: 'electro_des' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        if ( row.electro_tipo==1)
                            return `SI / NO`; //
                        else
                            return `Texto`;     
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        return ``; // row.electro_id
                    }
                },
            
            ],
        });
        // 
        $('#tablaexamenfisico').DataTable(
        {
            processing: true,
            serverSide: true,
            ajax: '<?= base_url() ?>admin/listatabla3',
            language:
                {
                    "url": "<?= base_url() ?>/assets/json/Spanish.json"
                },
            columns: 
            [
                { data: 'examen_des' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        if ( row.examen_tipo==1)
                            return `SI / NO`; //
                        else
                            return `Texto`;     
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        return ``; // row.examen_id
                    }
                },
            
            ],
        });
        //
        $('#tablaparaclinicos').DataTable(
        {
            processing: true,
            serverSide: true,
            ajax: '<?= base_url() ?>admin/listatabla4',
            language:
                {
                    "url": "<?= base_url() ?>/assets/json/Spanish.json"
                },
            columns: 
            [
                { data: 'paraclinico_des' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        if ( row.paraclinico_tipo==1)
                            return `SI / NO`; //
                        else
                            return `Texto`;     
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {
                        return ``; // row.paraclinico_id
                    }
                },
            
            ],
        });
        
    });
    function abrirmodal(id)
    {
        $("#error_"+id).html('');
        $("#diverror_"+id).css('display','none');
        $("#exampleModal_"+id).modal("show");
    }
    function cerarmodal(tabla) 
    {
        $("#error_"+tabla).html('');
        $("#diverror_"+tabla).css('display','none');
        $("#exampleModal_"+tabla).modal("hide");
    }
    function guardar(tabla)
    {
        let mjs ='';
        let valor ='';
        let tipo ='';
        if (tabla ==1)
        {
            valor =$("#ap_des").val(); tipo = $("#tipooap").val();
            if (valor=='')
                mjs =' Debe ingresar un antecedente penal ';
        }
        else if (tabla ==2)
        {
            valor =$("#electro_des").val(); tipo = $("#tipoelectro_tipo").val();
            if (valor=='')
                mjs =' Debe ingresar un electrocardiograma ';
        }
        else if (tabla ==3)
        {
            valor =$("#examen_des").val(); tipo = $("#examen_tipo").val();
            if (valor=='')
                mjs =' Debe ingresar un examen fisico';
        }
        else 
        {
            valor =$("#paraclinico_des").val(); tipo = $("#paraclinico_tipo").val();
            if (valor=='')
                mjs =' Debe ingresar un  Paraclinico';
        }
        if (mjs =='')
        {
            $("#error_"+tabla).html('')
            $("#diverror_"+tabla).css('display','none')

            //
            var datas = new FormData();  
            datas.append("valor",valor);
            datas.append("tabla",tabla);
            datas.append("tipo",tipo);
            $.ajax(
            {
                url: "<?php echo base_url(); ?>admin/guardaradmin",
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
                        if (data['result']==2)
                        {
                            location.reload();
                        }
                            
                        else
                        {
                            $("#error_"+tabla).html(data['mjs'])
                            $("#diverror_"+tabla).css('display','none')
                        }

                    }
                    else
                    {
                        
                    }
                    
                }
            });
            //
        }   
        else
        {
            $("#error_"+tabla).html(mjs)
            $("#diverror_"+tabla).css('display','block')
        }     

    }
</script>
</body>
</html>
