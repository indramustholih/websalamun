<?php $baseUrl = base_url().'themes/hospital';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title_atas?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>assets/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>assets/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>assets/template/css/sb-admin.css" rel="stylesheet">
  <link rel="icon" href="<?php echo $baseUrl;?>/assets/favicon/favicon-16x16.png?>" type="image/png" sizes="16x16">
</head>

<body class="bg-dark">
  <div class="container">
  	<div><center><img src="http://rsausalamun.com/salamun/assets/foto_dokter/logo.png" alt="" width="150" height="150" /></center></div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Silahkan Login</div>
      <div class="card-body">
      	<?php
              echo validation_errors('<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="fa fa-warning"></i> ','</div>');

              if($this->session->flashdata('gagal')){
                echo '<div class="alert alert-danger">';
                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo $this->session->flashdata('gagal');
                echo "</div>";
              }elseif($this->session->flashdata('sukses')){
                echo '<div class="alert alert-success">';
                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }
        ?>
        <form action="<?php echo base_url('administrator/login')?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" type="text" placeholder="Username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control"  type="password" placeholder="Password" name="password">
          </div>
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-lock"></i> Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url()?>">Kembali Ke Website</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>assets/template/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
