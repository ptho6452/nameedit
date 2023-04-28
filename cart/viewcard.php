


<?php include '..\Trangchu\header.php';
     
   

 
$cart=(isset($_SESSION['cart']))? $_SESSION['cart'] : [];

?>

<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="panel panel-info">
                <div class="panel-body">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th> Tiền thuê</th>
                                <th>Tiền cọc</th>
                                <th>Thành Tiền </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_price =0; ?>
                            <?php foreach ($cart as $key => $value):
                            $total_price += (($value['rent_prices']+ $value['tiencoc']) * $value['quantity'] )
                             ?>
                            <tr id='cart-<?=$value['id']?>'>
                                <td><?php echo $key ++ ; ?></td>
                                <td><img src=" <?php echo $value['image']?>" width="100px"></td>
                                <td><?php echo $value['name'] ?></td>
                                <td width="300px"> 
                                    <form id='form-cart-<?=$value['id']?>' action="cart.php">
                                        <input type="hidden" name="action" value="update" >
                                        <input type="hidden" name="rent-price" value="<?= $value['rent_prices'] ?>" >
                                        <input type="hidden" name="tiencoc" value="<?= $value['tiencoc'] ?>" >
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <input type="number" min='1' name="quantity" id="quantity" value="<?php echo $value['quantity'] ?>">
                                        <button type="submit">Cập nhật</button></input> 
                                   
                                 </td>
                                <td id='display-rent-price'><?php echo number_format($value['rent_prices']* $value['quantity'])?></td>
                               
                                
                                <td id='display-tiencoc'><?php echo number_format($value['tiencoc'] *$value['quantity'])?></td>
                                <?php  
                                      if($value['quantity'] >= 1 ){ ?>
                                        <td id='display-total'><?php echo number_format(($value['rent_prices']+ $value['tiencoc']) * $value['quantity'] ) ?></td>
                               <?php } ?>
                                <td>  <a name="" onclick="return del('<?=  $value['name']; ?>')"  class=" btn btn-danger" href="../cart/cart.php?id=<?php echo $value['id']?>&action=delete" >Xóa</a> </td>
                                </form>
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
                    <h3 class="panel-title "><a href="oders.php" class="btn btn-success">Đặt hàng</a> </h3><br>
                    <div class="panel-title bg-info"> <h3>Thông tin chi tiết </h3>

                <div>
              nhiều người iu ơi
                </div>
                    </div>

                            </div>

                            <div class="panel-body deess">

            </div>

            </div>
            </div>
        </div>
    </div>



<?php include '..\Trangchu\footer.php' ?>;

<script>
     function del(name){
        return confirm("Bạn có chắc chắn muốn xoa sản phẩm:"+ name + " ?")
    }

    function format(number) {
        return new Intl.NumberFormat('en-EN', { style: 'decimal' }).format(number)
    }

    $('#form-cart-*').ready(function() {
        $('#quantity').change(function() {
            var form = $(this).parent();
            var id =  $(form).find('input[name=id]').val();
            var quantity = $(this).val();
            var tienCoc = $(form).find('input[name=tiencoc]').val() * $(this).val();
            var rentPrice = $(form).find('input[name=rent-price]').val() * $(this).val();
            var tr = $(form).parent().parent();
            $(tr).find('td#display-rent-price').text(format(rentPrice));
            $(tr).find('td#display-tiencoc').text(format(tienCoc));
            $(tr).find('td#display-total').text(format(tienCoc + rentPrice));
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Typical action to be performed when the document is ready:
                    console.log('successs', xhttp.resposneText);
                }
            };
            xhttp.open("GET", "cart.php", true);
            xhttp.send('action=update&id=\(id)&quantity=\(quatity)');
            
        });
    })
</script>