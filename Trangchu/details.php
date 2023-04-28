<!DOCTYPE html>
<html lang="en">
<head>
  <title>Detail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="details.css">
  <link rel="stylesheet" href="/bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <script src="/bootstrap-5.2.2-dist/js/jquery.min.js"></script>
  <script src="/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .noiquyp1{
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 22px;
    line-height: 27px;
    color: #FF0000;
}
.noiquy2 ul{
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
    color: #000000;
}
.background{
    background: #EFEFEF;
    padding-bottom: 30px;
    }
    .backgroundp1{
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 24px;
    line-height: 29px;

    color: #000000;
    }
    .listproductssp1{
      font-family: 'Inter';
      font-style: normal;
      font-weight: 400;
      font-size: 22px;
      line-height: 27px;

      color: #000000;

    }

    .title{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 24px;
        line-height: 29px;
        color: #000000;
        }

    .list_schools{
            display: grid ;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap:30px;
            list-style-type:none;
    }
    .item{
        background: #fff;
        border-radius: 10px 10px 10px 10px;
    }
    .img4{
        Width:262px;
        Height:290px;
        border-radius: 10px 10px 0 0 ;
    }
    .informationproductp1{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
        color: #000000;
        margin-left: 13px;
    }
    .informationproductp2{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
        color: #ED2353;
        margin-left: 13px;
    }
    .button111{
        margin-bottom:20px;
        margin-left: 13px;
    }
    .bt2{
        background: #F2DFE3;
        border-radius: 20px;
        border: 1px solid  #F2DFE3 ;
        height:30px;
        width: 100px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 17px;
       
    }
    .a1{
        color: #000000;
    }
</style>
<body>
  

    <?php require_once ('db.php');
    session_start();
     include('header.php'); ?>
    <div class="body">
      <div class="container">
        <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];}

            $sql = "SELECT * FROM categories inner join clothes on clothes.id_categories=categories.id_categories";
            $result = $mysqli->query($sql);
        ?>
        <!-- ***** Call to Action Start ***** -->
        <div class="detail">
          <div class="container">
            <?php if ($result->num_rows > 0) {
              // dữ liệu đầu ra của mỗi hàng //fetch_assoc là một hàm trong PHP dùng để trả về dòng kết quả từ một truy vấn SQL dưới dạng một mảng kết hợp.
            ?>
              <div class="detail1">             
                <?php while ($row = $result->fetch_assoc()) {
                  if ($id == $row["id_clothes"]) {
                ?>
               
                  <div class="img">
                    <img class="img1" src="<?php echo $row["image"]; ?>" alt="Card image">
                  </div>
                  <div class="detail2">
                  <form method="GET" action="../cart/cart.php">
                      <div class="category">
                          <ul>
                            <li>Trang chủ</a></li>
                            <li>Sản phẩm</a></li>
                            <li><a class="categorya" href="#"><?php echo $row["name_clothes"]; ?></a></li>
                          </ul>
                          
                      </div>
                      <br>
                      <p class="categoryp1"><?php echo $row["name_clothes"]; ?></p>
                      <p class="categoryp2"><?php echo $row["rent_prices"]; ?></p>
                      <input type="number" name="quantity" value="1">
                      <input type="hidden" name="id" value="<?php echo $row['id_clothes'] ?>">
                      <?php 
                        
                      ?>
                      <div class="function">
                          <button type="submit" class="btn btn-primary">Đặt mua</button>
                          <button class="functionbutton">Giỏ hàng <i class="fa-sharp fa-solid fa-cart-shopping"></i> </a></button>
                      </div>
                  </from>
                      <div class="list">
                          <ul>
                            <li>Có Hàng Tại : Quận Sơn Trà</li>
                            <li>Giá Thuê lẻ 1 Bộ giá 200.000/ Bộ</li>
                            <li>Giá Thuê 2-3 Bộ Giá 170,000/ Bộ</li>
                            <li>Giá Thuê Trên 4 Bộ Giá 150,000</li>
                            <li>Hỗ Trợ Chỉnh Sửa Vừa Vặn Áo Cho Tất Cả Mọi Người</li>
                          </ul>
                      </div>
                      <br> 
                      <div class="address">
                        <p class="addressp1">Áo Cổ Phục TTDVL Chi Nhánh Sơn Trà:</p>
                        <ul>
                          <li>101B, Lê Hữu Trác, Phường Phước Mỹ, Quận Sơn Trà, Tp.Đà Nẵng</li>
                          <li>Phone: 0702 307 6771 ( Mr Trung)</li>
                          <li>Thời gian làm việc:Từ 9h sáng đến 21 giờ tối mỗi ngày .</li>
                        </ul>
                      </div>
                      
                    </div>
                  </div>
                <?php
                 break;
                  }
                } ?>
              </div>
            <?php }  ?>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <div class="mota">
        <div class="container">
        <p>Mô tả</p>
        <br>
        <br>
        <br>
        <br>
          <center>
            <img class="img1" src="<?php echo $row["image"]; ?>" alt="Card image">
            <br><br><br>
            <img class="img1" src="<?php echo $row["image"]; ?>" alt="Card image">
            <br><br><br>
            <img class="img1" src="<?php echo $row["image"]; ?>" alt="Card image">
          </center>
        </div>
    </div>
    <br><br> <br>
    <div class="noiquy">
      <div class="container">
        <p class="noiquyp1">Khi đến với ÁO CỔ PHỤC TTDVL  khách hàng không phải lo lắng khi đi thuê áo dài</p>
        <div class="noiquyp2">
            <ul>
              <li>Sửa đồ theo size cho khách hàng ( chỉ cần chiều cao và cân nặng- có số đo càng càng tốt )</li>
              <li>Đổi mẫu tùy ý mà không phát sinh bất kỳ chi phí nào ( nếu mẫu đó chưa có khách đặt mẩu đó)</li>
              <li>Miễn phí lấy và trả đồ trong 3-5 ngày ( Có thể hỗ trợ thêm nếu khách cần)</li>
              <li>Giặt ủi ngay ngắn , dán tên ghi chú vào áo trước khi giao cho khách hàng.</li>
              <li>Tư vấn tận tình về màu sắc, cách phối đồ ton-sur-ton, chất liệu nào hợp với dáng người</li>
            </ul>
        </div>
        <p class="noiquyp1">Quy định thuê và trả đồ tại ÁO CỔ PHỤC TTDVL</p>
        <p class="noidungp3">1.QUY ĐỊNH THUÊ:</p>
        <div class="noiquyp2">
            <ul>
              <li>Quý khách có thể liên hệ xem mẫu trước sau đó sẽ đặt cọc cho chúng tôi 50% tổng giá trị hợp đồng.</li>
              <li>Trước ngày lấy hàng quý khách cung cấp cho chúng tôi size của chúng tôi để chúng tôi chuẩn bị cho quý khách.</li>
              <li>Chúng tôi sẽ ủi đồ, bỏ bịch và ghi tên của rõ ràng cho khách.</li>
              <li>Khi quý khách lấy hàng, quý khách sẽ thanh toán đủ tiền thuê đồng thời cọc thêm tiền hoặc giấy tờ tuỳ thân (CMND, GPLX, …) Để lấy đồ mang về</li>
              <li>Thời gian giữ áo thuê từ 4 -5 ngày kể từ ngày lấy áo(Trong trường hợp cần nhiều thời gian hơn quý khách vui lòng liên hệ trưc cho chúng tôi để được tư vấn)</li>
            </ul>
        </div>
        <p class="noidungp3">1.QUY ĐỊNH TRẢ VÀ LƯU Ý</p>
        <div class="noiquyp2">
            <ul>
              <li>Quý khách trả hàng chúng tôi sẽ kiểm tra và trả lại cọc cho quý khách.</li>
              <li>Trước ngày lấy hàng quý khách cung cấp cho chúng tôi size của chúng tôi để chúng tôi chuẩn bị cho quý khách.</li>
              <li>Nên dùng kim chỉ may tay thưa để lên lai quần hoặc tà áo dài.</li>
              <li>Sản phẩm không dính những chất khó giặt tẩy như: rượu, bia, băng keo, chewing gum, cà ri, v.v Sản phẩm không bị rách và hư hại.</li>
              <li>Thời gian nhận áo và trả áo đúng theo ngày ghi trên biên nhận.</li>
            </ul>
        </div>
        <p class="noidung4">Chú ý: Khách hàng làm rách hoặc hư hại phải bồi thường dựa trên giá trị sản phẩm.</p>
      </div>
    </div>
    <div class="background">
      <br>
      <div class="container">
          <p class="listproductssp1">SẢN PHẨM GỢI Ý</p>
          <div class=".list_schools">
            <div class="container">
            <br>
            <?php
        

        $sql = "SELECT * FROM categories inner join clothes on clothes.id_categories=categories.id_categories WHERE categories.id_categories =5;";
        $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
            ?>
                <div class="list_schools">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                            <div class="item">
                                <div class="image11">
                                    <img class="img4" src="<?php echo $row["image"]; ?>" alt="">
                                </div>
                                <br>
                                <div class="informationproduct">
                                    <p class="informationproductp1"><?php echo $row["name_clothes"]; ?></p>
                                    <p class="informationproductp2"><?php echo $row["rent_prices"]; ?></p>
                                <div class="button111">
                                    <button class="bt2"><a class="a1" href="details.php?id=<?php echo $row['id_clothes']; ?>">Details</a></button>  
                                    <button class="bt2">Đặt thuê</button>
                                </div>
                            </div>
                    </div>
                <?php  }
                } else {
                    echo "Không có kết quả để hiển thị ra";
                }
                $mysqli->close();
                ?>
            </div>
        </div>
        <br>
      </div>
    </div>
    </div>
    <?php include('footer.php') ?>
  </body>
</html>
