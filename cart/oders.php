

<?php include_once '../admin/db.php';
include '../trangchu/header.php';

$cart=(isset($_SESSION['cart']))? $_SESSION['cart'] : [];

?>
<?php if(isset($_SESSION['user'])){
    $users=(isset($_SESSION['user']))?$_SESSION['user']: [];
    if(isset($_POST['name'])){
      $id_users=$users['id_users'];
      $note=$_POST['note'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];

      $query=mysqli_query($mysqli,"INSERT into bills(id_users,note,phone,address) values($id_users,'$note',
      
      '$phone','$address')");
    if($query){ 
      $id_bils=mysqli_insert_id($mysqli);
          foreach($cart as $value ){
            mysqli_query($mysqli,"INSERT into bill_detail(id_clothes,quatity,id_bills,rent_prices,tiencoc) 
            values('$value[id]','$value[quantity]',$id_bils,'$value[rent_prices]','$value[tiencoc]')" );
          }
          header('location: ../trangchu/bangiaphucvu.php');
    }

    }
    
  ?>
  <form method="POST">

<div class="container">

    <div class="row">
        <div class="col-md-7">
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Full name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $users['username']?>">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1"value="<?= $users['email']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Note</label>
    <textarea name="" id="input" class="form-control" rows="5" required="required" name="note"></textarea>
    
  </div>
</form>

        </div>
        <div class="col-md-5">
            <div class="panel panel-info">
                <div class="panel-body">
                    <h4>Thông Tin đơn hàng</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>

                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>đơn giá </th>
                                <th>tiền cọc </th>
                                <th>Thành Tiền </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_price =0; ?>
                            <?php foreach ($cart as $key => $value):
                            $total_price += (($value['rent_prices']+ $value['tiencoc']) * $value['quantity'] )
                             ?>
                            <tr>
                               
                                <td><?php echo $value['name'] ?></td>                                 
                                <td><?php echo $value['quantity'] ?></td>
                                        <td><?php echo number_format($value['rent_prices']* $value['quantity'])?></td>
                                        <td><?php echo number_format($value['tiencoc'] *$value['quantity'])?></td>
                                        <?php  
                                      if($value['quantity'] >= 1 ){ ?>
                                        <td><?php echo number_format(($value['rent_prices']+ $value['tiencoc']) * $value['quantity'] ) ?></td>
                               <?php } ?>

                                   
                                 </td>
                               
        
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td> Tổng Tiền </td>
                                <td colspan="6" class="text-center bg-primary">
                                    <?php 
                              
                                        echo number_format($total_price);
                               ?>
                                VNĐ</td>

                        
                        </tr>
                  

                             
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <div class="panel panel-white">
                <div class="panel-heading">
                    <button href="" class="btn btn-info">Đặt hàng</button> </h3><br>

                <div>
                </div>
                    </div>

                            </div>

                            <div class="panel-body deess">

            </div>

            </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php }else {?>
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Vui lòng đăng nhập để mua hàng!</strong><a href="../login_register/login.php">Login </a>
</div>

<?php }?>

<?php include '../trangchu/footer.php' ?>;

<script>
     function del(name){
        return confirm("Bạn có chắc chắn muốn xoa sản phẩm:"+ name + " ?")
    }
</script>