<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Trab M.S | Service Client</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            
    <!-- Botão FULLSCREEN -->   
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    <!-- Botão Controle --> 
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TRAB M.S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Foto + Nome do Usuário) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Time
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="clientView.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Listar serviços
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cadastrar serviços
              </p>
            </a>
          </li>
        </ul>
      </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <?php 
    // Conexao com o banco
    require_once('php/connection.php');
  
    // Query para popular combobox
    $result_clientes = $conn->prepare(" SELECT * FROM cliente ORDER BY nomeCliente");
    $result_clientes->execute();
    $rows_clientes = $result_clientes->fetchAll(PDO::FETCH_ASSOC);

    $result_pacote = $conn->prepare(" SELECT * FROM pacote ORDER BY idPacote DESC");
    $result_pacote->execute();
    $rows_pacote = $result_pacote->fetchAll(PDO::FETCH_ASSOC);
    ?>


 <!-- INICIO DE CONTEUDO -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastro de Servico para Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">

                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>

                    <div class="row">
                      <div class="col-sm-10">
                        <!-- select -->
                        <div class="form-group">
                          <label>Selecione o cliente</label>
                          <select class="custom-select" id="form_cliente" required>
                          <?php 
                          foreach ($rows_clientes as $row) {
                              echo "<option value=".$row['cpfCliente'].">".$row['nomeCliente']."</option>";
                          }
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-10">
                      <!-- select -->
                      <div class="form-group">
                          <label>Selecione o pacote</label>
                          <select class="custom-select" id="form_pacote"  required>
                          <?php 
                          foreach ($rows_pacote as $row) {
                              echo "<option value=".$row['idPacote'].">".$row['tipoPacote']." - ".$row['produtoPacote']."</option>";
                          }
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-footer">
                      <button type="button" class="btn btn-primary" id="btn_registrar">Registrar serviço</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->

            
                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>

// Confirmando insercao
$(document).ready(function() {
  $('#btn_registrar').click(function() {
    if (confirm('Voce deseja registrar esse serviço?')) {
      $.post('php/insert.php', {cliente: $('#form_cliente').val(), pacote: $('#form_pacote').val()}, function(response){ 
        alert("Esse serviço foi registrado com sucesso!");
        window.location.href = "clientView.php";
      });
    }
  });
});
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
