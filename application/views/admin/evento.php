<?php //echo $cant; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Demo</title>
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
            <!-- -->
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Eventos</h3>
                    </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/crearevento');?>
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input 
                                      type="text" 
                                      name="tituloevento" 
                                      id ="tituloevento" 
                                      class="form-control my-colorpicker1"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Fecha de evento</label>
                                    <input 
                                      type="date" 
                                      name="fechaevento" 
                                      id ="fechaevento" 
                                      class="form-control my-colorpicker1">
                                </div>
                                <div class="form-group">
                                    <label>imagen</label>
                                    <input 
                                      type="file" 
                                      name="userfile" 
                                      id ="userfile" 
                                      size="20" />
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input 
                                      type="text" 
                                      name="descripcion" 
                                      id ="descripcion" 
                                      class="form-control my-colorpicker1">
                                </div>
                                <input type="submit" value="enviar" />
                            </form>
                        </div>
                    
                    </div>
                    
                </div>
            </div>

            
            <!-- -->
        </div>
      </div>
    </section>
    
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
    
</script>
</body>
</html>
