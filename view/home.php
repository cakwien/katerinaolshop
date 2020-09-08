<?php
        if(empty($_SESSION['username']))
        {
            header('location:?p=login');
        }
        
        $user=$_SESSION['username'];
        $aktif=$induk->useraktif($con,$user);
        $lv = $induk->level($con,$user);
        if ($lv[0] == "1")
        {
          $user_tipe = "Admin";
          $warna = "red";
          $warna2 = "danger";
        }else{
          $user_tipe = "Kasir";
          $warna = "green";
          $warna2="success";

        }
        

        
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Katerina Olshop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    
  <link rel="icon" href="img/katerina.png">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed skin-<?=$warna?> sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="?p=main" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>Ol</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Katerina</b>Olshop</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
         
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a class="logo-lg"><strong><?=tglindo(date('Y-m-d',time()))?></strong></a>
          </li>
          <li>
            <a><strong id="clock"></strong></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$aktif['nm_user']?></p>
          <a class="btn-xs btn-<?=$warna2?>"><?=$user_tipe?></a>
        </div>
      </div>
      <!-- search form -->
          <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
          
         <li class="<?=$beranda?>" >
          <a href="?p=main">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
          
          <?php 

            if ($lv[0] == "1")
            {
          
          ?>
       
        
         <li class="treeview <?=$in_barang?>">
          <a href="#">
            <i class="fa fa-dropbox"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$hal_jenis?>"><a href="?p=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
            <li class="<?=$hal_sup?>"><a href="?p=supplier"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <li class="<?=$hal_barang?>"><a href="?p=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
            <li class="<?=$hal_stokmasuk?>"><a href="?p=stokmasuk"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
          </ul>
        </li>
          
         
          <li class="<?=$hal_member?>">
          <a href="?p=member">
            <i class="fa fa-users"></i> <span>Member</span>
          </a>
        </li>
            <?php } ?>
          
            <li class="<?=$hal_trans?>">
          <a href="?p=transaksi&n=<?php echo $nt=$penjualan->nota($con,"","8"); ?>">
            <i class="fa  fa-cart-plus"></i> <span>Penjualan</span>
          </a>
        </li>
          
          <?php if($lv[0] == "1"){ ?>
          
          <li class="treeview <?=$in_lap?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$hal_lapstok?>"><a href="?p=lapstok"><i class="fa fa-circle-o"></i> Lap. Stok Barang</a></li>
            <li class="<?=$hal_lapjual?>"><a href="?p=lapjual"><i class="fa fa-circle-o"></i> Lap. Penjualan</a></li>
            <li class="<?=$hal_laplabarugi?>"><a href="?p=laplabarugi"><i class="fa fa-circle-o"></i> Lap. Laba Rugi</a></li>
            
          </ul>
        </li>
          
          
          
         <li class="header">SETTING</li>
    
       
          <li class="<?=$hal_profil?>">
          <a href="?p=profil">
            <i class="fa fa-home"></i> <span>Setting Profil</span>
          </a>
        </li>
          
          <?php } ?>

          <li>
          <a href="?p=logout" data-confirm="Anda ingin keluar dari aplikasi ?">
            <i class="fa fa-reply"></i> <span>Logout</span>
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      
      
      
      
     
     <?php 
   
       if ($_GET['p'] == "main")
       {
            if ($lv[0] == "1")
            {
           require_once("beranda.php");
            } else{
              echo "";
            }
       }
      elseif ($_GET['p'] == "jenis")
      {
          require_once("jenis.php");
      }
      elseif ($p=="barang")
      {
          require_once("barang.php");
      }
      elseif($p=="supplier")
      {
          require_once("supplier.php");
      }
      elseif($p=="member")
      {
          require_once("member.php");
      }
      elseif ($p=="transaksi")
      {
          require_once("transaksi.php");
      }
      elseif ($p=="lapjual")
      {
        require_once("lap_penjualan.php");
      }
      elseif ($p=="profil")
      {
        require_once("profil_admin.php");
      }
      elseif ($p=="tambahstok")
      {
        require_once("tambahstok.php");
      }
      elseif($p=="stokmasuk")
      {
        require_once("stok_masuk.php");
      }
      elseif($p=="lapstok")
      {
        require_once('lap_stok.php');
      }
      elseif($p=="barang_edit")
      {
        require_once('edit_barang.php');
      }
      elseif($p=="laplabarugi")
      {
        require_once('lap_labarugi.php');
      }
      
      else
      {
          echo "anda salah alamat";
      }
     
    
     ?>
      
      
      
      
    <!-- modal laporan-->

      
    <!-- modal laporan-->
      
      <!-- modal laporan-->

      
      <div class="modal fade" id="lapstok">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Laporan Stok</h4>
              </div>
              <div class="modal-body">
               <form>
                
                   
                  <div class="form-group">
                      <label>Dari Tanggal :</label>
                      <input type="date" name="nm_barang" class="form-control">
                  </div>
                   
                    <div class="form-group">
                      <label>Hingga Tanggal :</label>
                      <input type="date" name="nm_barang" class="form-control">
                  </div>
                 
                  
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Tampilkan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      
    <!-- modal laporan-->
     
     
      
   
    <!-- /.content -->
      
      
      
      
      
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Developed By : <b>WienSoftDev</b>
    </div>
      Sistem Informasi Penjualan 
    <strong>Katerina Olshop</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<?php //echo '<script>toastr.warning("Selamat Datang");</script>'; 
    if (!empty($_GET['ps']))
    {
        $ps=bukarhs($_GET['ps']);
        echo '<script>toastr.info("'.$ps.'");</script>'; 
    }
    
    if (!empty($_GET['pse']))
    {
        $pse=bukarhs($_GET['pse']);
        echo '<script>toastr.warning("'.$pse.'");</script>'; 
    }
?>

    


<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
     $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
     })
    
    
  $(function () {
    
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- PESAN KONFIRMASI -->
<script src="plugins/mycustom/konfirmasi.js"></script>
<!-- JAM REALTIME / AUTOLOAD -->
<script type="text/javascript" src="plugins/mycustom/realtime.js"></script>
    
    
</body>
</html>
