<?php //echo $cant; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Demo</title>
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
            <h1 class="m-0 text-indigo"> Registro</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 mt-1">
                <!-- -->
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre </th>
                            <th>Apellido</th>
                            <th>Codigo</th>
                            <th>Nro</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                </table>
                <!-- -->
            </div>
        </div>
        <div  class="row">
          <div class="col-md-12 col-sm-12 col-lg-12 mt-1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>
          </div>
        </div>
        
      </div>
    </section>
    <!-- Modal -->
    <div 
        class="modal fade bd-example-modal-xl" 
        tabindex="-1" 
        role="dialog" 
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert" id ="divmjsregistro" style="display: none;">
                        
                    </div>
                    <form>
                        <div class="row px-2">
                            <div class="col py-2">
                            <input type="text" class="form-control" placeholder="Cedula" id="cedula" name="cedula">
                            </div>
                            <div class="col py-2">
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col py-2">
                            <input type="text" class="form-control" placeholder="Apelldio" id="apellido" name="apellido">
                            </div>
                            <div class="col py-2">
                            <input type="text" class="form-control" placeholder="Codeigo wap" id="code" name="code">
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col py-2">
                            <input type="text" class="form-control" placeholder="Nro wap" id ="nro" name="nro">
                            </div>
                            <div class="col py-2">
                            <input type="text" class="form-control" placeholder="Correo" id="correo" name="correo">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id ="btnsaveregistro">Agregar registro</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
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
        
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?= base_url() ?>demo/listadoclientes',
            language:
                {
                    "url": "<?= base_url() ?>/assets/json/Spanish.json"
                },
            columns: 
            [
                { data: 'cliente_cedula' },
                { data: 'cliente_nombre' },
                { data: 'cliente_apellido' },
                { data: 'cliente_codewp' },
                { data: 'cliente_nrowap' },
                { data: 'cliente_correo' },
                {
                    orderable: false,
                    data: "null",
                    className: "center",
                    render: function(data, type, row, meta) 
                    {

                        return `
                        <a href="<?= base_url() ?>admin/crearcita/${row.cliente_id}" 
                            style ="text-decoration:none;">
                            <i  class="fas fa-plus fa-sm"></i>
                        </a>
                         `;
                    }
                },
              ],
        });
        //
        $( "#btnsaveregistro" ).click(function() 
        {
           // validar datos
           let cedula=$("#cedula").val();
           let nombre=$("#nombre").val();
           let apellido=$("#apellido").val();
           let code=$("#code").val();
           let nro=$("#nro").val();
           let correo=$("#correo").val();

           if ( cedula=='')
           {
                $("#divmjsregistro").html('La cedula no puede quedar en blanco')
                $("#divmjsregistro").css('display','block');
           }
           else if (cedula.length <= 5)
           {
                $("#divmjsregistro").html('El nro de cedula debe tener almenos 5 digitos')
                $("#divmjsregistro").css('display','block');
           }
           else
           {
                $("#divmjsregistro").html('')
                $("#divmjsregistro").css('display','none');
                //
                var datas = new FormData();  
                datas.append("cedula",cedula);
                datas.append("nombre",nombre);
                datas.append("apellido",apellido);
                datas.append("code",code);
                datas.append("nro",nro);
                datas.append("correo",correo);
                
                $.ajax(
                {
                    url: "<?php echo base_url(); ?>demo/agregarregistro",
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
                            if (data['result']==200)
                                location.reload(); 
                            else
                            {
                                $("#divmjsregistro").html(data['mjs'])
                                $("#divmjsregistro").css('display','block');    
                            }
                        }
                        else
                        {
                            $("#divmjsregistro").html('NO Se puedo Agregar el registro intente de nuevo')
                            $("#divmjsregistro").css('display','block');
                        }
                        
                    }
                });
                //
           }
           // si esta ok para guardar
            
        });
        //
    });
    function crearcita (id)
    {

    }
</script>
</body>
</html>
