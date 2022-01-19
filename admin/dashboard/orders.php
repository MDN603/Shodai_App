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
        <!-- Small boxes (Stat box) -->
        <div class="card">


          <!-- /.card-header -->
          <div class="card-body">
            <?php
            include 'config.php';
            if (isset($_POST['delete_btn'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM orders WHERE id='$id'";
                $result = $db->query($query);
                if($result){
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> You deleted a Order
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                }
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Products</th>
                <th>Total Amount</th>
                <th>Payment Method</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Delete</th>
              </tr>
              </thead>
              <tbody>


                <?php
               $stmt = "SELECT * FROM orders";
               $result2 = $db->query($stmt);
               if($result2->num_rows > 0){
                 while ($row = $result2->fetch_assoc()) {
             ?>
             <tr>
               <td><?php echo $row['id']?></td>
               <td><?php echo $row['products']?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['pmethod']?></td>
                <td><?php echo $row['name']?></td>
                 <td><?php echo $row['phone']?></td>
               <td>
                 <form method="POST" action="">
                 <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                 <button id="delete_btn" name="delete_btn" class="btn btn-danger">Delete</button>
               </form>
             </td>
             </tr>
             <?php
            }
            }
            ?>

              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
