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
            <h1 class="m-0 text-indigo"> Crear Cita</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mc">Motivo consulta</label>
                        <input type="text" class="form-control" id="mc" name="mc" placeholder="Motivo consulta">
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mc">HEA</label>
                        <input type="text" class="form-control" id="mc" name="mc" placeholder="HEA">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4> Antecedente Personales </h4>
                    <?php 
                        //echo "<pre>"; print_r($listaap); die;
                        foreach ($listaap as $ap) 
                        {
                            if ($ap['ap_tipo']==1) // si / no
                            {
    
                                ?>
                                <label> <?=$ap['ap_des'] ?>  </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1"> Si </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2"> NO </label>
                                </div>
                                <?php
                            }
                            else if ($ap['ap_tipo']==2) // texto
                            {
                                
                                ?>
                                <div class="form-group">
                                    <label> <?=$ap['ap_des'] ?>  </label>
                                    <input type="text" class="form-control" id="" size="10"; placeholder="">
                                </div>
                                <?php
                            }
                            else
                            { }
                        }
                    
                    ?>
                </div>
                
            </div>
        </form>
        
        
      </div>
    </section>
    
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
        

    });
    
</script>
</body>
</html>
