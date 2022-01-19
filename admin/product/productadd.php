<?php
include('../dashboard/nav.php');
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Form</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Product Form</h3>
  </div>
</br>
  <form action="insertproduct.php" method="POST" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputPassword1">Product Id</label>
        <input type="text" class="form-control" name="id">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Product Name</label>
        <input type="text" class="form-control" name="product_name">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input type="text" class="form-control" name="max_price">
      </div>



      <div class="form-group">
        <label for="exampleInputFile">Product Image</label>
        <div class="input-group col-3">
          <div class="custom-file">
            <input type="file" id="image" class="custom-file-input" value="" name="image" onchange="readURL3(this);">
            <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
          </div>
        </div>
            <br>
        <span class="custom-file-control"></span>
           <img src="#" id="three">
      </div>






    <div class="card-footer">
      <button type="submit" name="insert" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

</div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script type="text/javascript">
 function readURL3(input){
   if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {
       $('#three')
       .attr('src', e.target.result)
       .width(100)
       .height(100);
     };
     reader.readAsDataURL(input.files[0]);
   }
 }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../plugins/codemirror/codemirror.js"></script>
<script src="../plugins/codemirror/mode/css/css.js"></script>
<script src="../plugins/codemirror/mode/xml/xml.js"></script>
<script src="../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

</body>
</html>
