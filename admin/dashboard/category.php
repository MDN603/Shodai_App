<?php
include 'nav.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Add</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Product Form</h3>
          </div>
        </br>
        <?php
          include 'config.php';

          if(isset($_POST['insert'])){
            $path = '../../uploads/';
            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $final_image = rand(1000,1000000).$img;
            $path = $path.strtolower($final_image);
          $category=$_POST['category'];
           $sql = "INSERT into category(cat_name,image) VALUES ('$category','$final_image')";
           $result = $db->query($sql);
          if($result){
            if (move_uploaded_file($tmp,$path)) {
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Category Added!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>';
            }
          }
        }
        ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Category</label>
                <input type="text" class="form-control" name="category">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="image">
              </div>


            <div class="card-footer">
              <button type="submit" name="insert" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

        </div>

        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
