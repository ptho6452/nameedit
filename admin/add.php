
<?php 
$sql="SELECT*FROM  categories";
$query=mysqli_query($mysqli,$sql);

if(isset($_POST['sbm'])){
  $name=$_POST['name'];
  $image=$_POST['image'];
  $created_at=$_POST['created_at'];
  $id_categories=$_POST['id_categories'];
  $sex=$_POST['sex'];
$sqli="INSERT into clothes(name_clothes,image,created_at,sex,id_categories) values('$name','$image','$created_at','$sex',$id_categories)"; 
$queryi=mysqli_query($mysqli,$sqli);
$_SESSION["flag"] = true;
}
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h2>Thêm sản phẩm</h2>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Tên Sản phẩm</label>
          <input type="text" name="name" class="form-control" required >
        </div>
        <div class="form-group">
          <label for="">Ảnh sản phẩm</label> <br>
          <input type="text" name="image" class="form-control" required >
        </div>
        <div class="form-group">
          <label for="">Thời gian tạo</label>
          <input type="date" name="created_at" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Giới tính</label>
          <select class="form-control" name="sex">
              <option value="nam">nam</option>
              <option value="nu">nu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Loại áo</label>
          <select class="form-control" name="id_categories">
              <?php
                while($row_cate = mysqli_fetch_assoc($query)){?>
                    <option value="<?php echo $row_cate['id_categories'];?>"><?php echo $row_cate['name_categories'];?></option>


                <?php }?>
          </select>
        </div>
        <button name="sbm" class="btn btn-success" type="submit">thêm</button>
      </form>
    </div>
    <form id="redirect-form" action="index.php">
    </form>
  </div>
</div>
<?php if (isset($_SESSION["flag"])) { ?>
<script>
    Swal.fire(
  "thank you your order!",
  "You clicked the button!",
  "success");
  document.getElementsByClassName("swal2-confirm")[0].onclick = function() {
    document.getElementById("redirect-form").submit();
  }
</script>
<?php 
}
unset($_SESSION["flag"]);
?>
<script>

</script>