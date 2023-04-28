
<?php 
$id=$_GET['id'];
$sql="SELECT*FROM  categories";
$query=mysqli_query($mysqli,$sql);
$sql_edit="SELECT*FROM  clothes where id_clothes=$id";
$query_edit=mysqli_query($mysqli,$sql_edit);
$row_edit=mysqli_fetch_assoc($query_edit);


if(isset($_POST['sbm'])){
  $name=$_POST['name'];
  $image=$_POST['image'];
  $update_at=$_POST['updated_at'];
  $id_categories=$_POST['id_categories'];
  $sex=$_POST['sex'];

$sqli="UPDATE  clothes SET name_clothes='$name',image='$image',updated_at='$update_at',sex='$sex',id_categories=$id_categories where id_clothes=$id"; 
$queryi=mysqli_query($mysqli,$sqli);
header('location: index.php?page_layout=danhsach');
}
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h2>Sửa sản phẩm</h2>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Tên Sản phẩm</label>
          <input type="text" name="name" class="form-control" required  value="<?php echo $row_edit['name_clothes'] ?>">
        </div>
        <div class="form-group">
          <label for="">Ảnh sản phẩm</label> <br>
          <input type="text" name="image" class="form-control" required  value="<?php echo $row_edit['image'] ?>" >
        </div>
        <div class="form-group">
          <label for="">Thời gian cập nhật</label>
          <input type="date" name="updated_at" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Giới tính</label>
          <select class="form-control" name="sex"  value="<?php echo $row_edit['sex'] ?>">
              <option value="nam">nam</option>
              <option value="nu">nu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Loại áo</label>
          <select class="form-control" name="id_categories"  value="<?php echo $row_edit['id_categories'] ?>">
              <?php
                while($row_cate = mysqli_fetch_assoc($query)){?>
                    <option value="<?php echo $row_cate['id_categories'];?>"><?php echo $row_cate['name_categories'];?></option>


                <?php }?>
          </select>
        </div>
        <button name="sbm" class="btn btn-success" type="submit" onclick='Swal.fire(
  "thank you your order!",
  "You clicked the button!",
  "success")'>thêm</button>
      </form>
    </div>
    
  </div>
</div>