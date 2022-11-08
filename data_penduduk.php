<?php
ini_set('display_errors',1);
error_reporting(-1);

class database{
  private $dbhost;
  private $dbuser;
  private $dbpass;
  private $dbname;

  function __construct($a,$b,$c,$d){
    $this->dbhost=$a;
    $this->dbuser=$b;
    $this->dbpass=$c;
    $this->dbname=$d;
  }

  function conn_mysql(){
    $konek_db=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
    return $konek_db;
  }
}

class penduduk{
  public $nik;
  public $nama;
  public $gender;
  public $alamat;
  public $status;
  public $pekerjaan;
  public $warga;
  public $asal;
  public $tanggal;
  public $darah;

  function set_all_data($nik,$nama,$gender,$alamat,$status,$pekerjaan,$warga,$asal,$tanggal,$darah){
    $this->nik=$nik;
    $this->nama=$nama;
    $this->gender=$gender;
    $this->alamat=$alamat;
    $this->status=$status;
    $this->pekerjaan=$pekerjaan;
    $this->warga=$warga;
    $this->asal=$asal;
    $this->tanggal=$tanggal;
    $this->darah=$darah;
  }

  // TAMBAH PENDUDUK
  function tambahpenduduk ($koneksi,$nik,$nama,$kelamin,$alamat,$status,$pekerjaan,$kewarganegaraan,$tempatlahir,$tanggallahir,$golongandarah){
    $tambahdata = "INSERT INTO tbl_penduduk values ('', '$nik','$nama','$kelamin','$alamat','$status','$pekerjaan','$kewarganegaraan','$tempatlahir','$tanggallahir','$golongandarah')";
		$proses_tambah =mysqli_query($koneksi, $tambahdata);
	}

  function ambildata_penduduk ($koneksi){
    $data_penduduk = "select * from tbl_penduduk";
    $proses_ambil =mysqli_query($koneksi, $data_penduduk);
    return  $proses_ambil;
  }

  function hapus_data ($koneksi, $id){
    $hapus = "DELETE FROM data WHERE id_penduduk = '$id'";
    $proses_hapus = mysqli_query($koneksi,$hapus);
    return "Berhasil Hapus";
  }
}


$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'kependudukan';
$db = new database($host,$user,$pass,$db);
$koneksi = $db->conn_mysql();

$penduduk_post = new Penduduk();
$data_penduduk_db = $penduduk_post->ambildata_penduduk($koneksi);

if(isset($_POST['submit'])){
  if($_POST['nik'] !='' and $_POST['nama'] !='' and $_POST['gender'] !='' and $_POST['alamat'] !='' and $_POST['status'] !='' and $_POST['pekerjaan'] !='' and $_POST['warga'] !='' and $_POST['asal'] !='' and $_POST['tanggal'] !='' and $_POST['darah'] !='' ){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['kea$kewarganegaraan'];
    $tempatlahir = $_POST['tempa$tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $golongandarah = $_POST['golongandarah'];

    $penduduk_post = new penduduk();
    $klasifikasi = $penduduk_post;
    $penduduk_post->tambahpenduduk($koneksi,$nik,$nama,$kelamin,$alamat,$status,$pekerjaan,$kewarganegaraan,$tempatlahir,$tanggallahir,$golongandarah);

    $data_penduduk_db = $penduduk_post->ambildata_penduduk($koneksi);
  }
}

if (isset($_POST['Hapus'])){
  if ($_POST['id'] != ''){
    $penduduk_hapus = new penduduk();
    $hapus_data = $penduduk_hapus->hapus_data($koneksi,$_POST['id']);
 
    $data_penduduk_db = $penduduk_hapus->ambildata_penduduk($koneksi);    
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List Data Penduduk | Data Kependudukan</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="dist/img/DATA-KEPENDUDUKAN-LOGO.png" type="image/x-icon">
  <link rel="icon" href="dist/img/DATA-KEPENDUDUKAN-LOGO.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="data_penduduk.php" class="nav-link">Data Penduduk</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/DATA-KEPENDUDUKAN-LOGO.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Data Kependudukan</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data_penduduk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Penduduk</p>
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
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Data Penduduk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active">Data Penduduk</li>
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
              <!--TABEL DATA-->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Status Perkawinan</th>
                            <th>Pekerjaan</th>
                            <th>Kewarganegaraan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Golongan Darah</th>
                            <th>Tool</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($semua_data_ok = $data_penduduk_db->fetch_array()){ ?>
                          <tr>
                            <td> <?php echo $semua_data_ok['nik'];?></td>
                            <td><?=$semua_data_ok['nama'];?> </td>
                            <td> <?=$semua_data_ok['kelamin'];?></td>
                            <td><?=$semua_data_ok['alamat'];?></td>
                            <td><?=$semua_data_ok['status'];?></td>
                            <td><?=$semua_data_ok['pekerjaan'];?></td>
                            <td><?=$semua_data_ok['kewarganegaraan'];?></td>
                            <td><?=$semua_data_ok['tempatlahir'];?></td>
                            <td><?=$semua_data_ok['tanggallahir'];?></td>
                            <td><?=$semua_data_ok['golongandarah'];?></td>
                            <td>
                              <form action="" method="post">
                                <input type="hidden" class="form-control" id="id" name='id' value='<?=$semua_data_ok['id_penduduk'];?>'>
                                <input name='Hapus' value='Hapus' type="submit">
                              </form>
                              <form action='edit.php' method="post">
                                <input type="hidden" type="hidden" class="form-control" id="id" name='id' value='<?=$semua_data_ok['id_penduduk'];?>'>
                                <input name='Edit' value='Edit' type="submit">
                              </form>
                            </td> 
                          </tr>
                          <?php } ?> 
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              </div>
            <!--/.col (left) -->
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
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function (file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function (file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function (progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function () {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function () {
      myDropzone.removeAllFiles(true)
    }
  // DropzoneJS Demo Code End
</script>
</body>

</html>