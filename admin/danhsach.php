<script>
      var menuItems = document.querySelectorAll('.admin-menu li');

for (var i = 0; i < menuItems.length; i++) {
  if (menuItems[i].querySelector('ul')) {
    menuItems[i].addEventListener('click', function() {
      this.querySelector('ul').classList.toggle('show');
    });
  }
}
</script>
<style>
#menu ul {
  background: #7FFFD4;
  width: 120%;
  padding-left: 0;
  list-style-type: none;
  text-align: left;

}
#menu li {
  width: auto;
  height: 40px;
  line-height: 40px;
  border-bottom: 1px solid #282828;
  padding: 0 1em;
}
#menu li a {
  text-decoration: none;
  color: #0C0A0A;
  font-weight: bold;
  display: block;
}
#menu li:hover {
  background: #f1f1f1;
}
#menu ul li > .sub-menu {
  display: none;
  position: absolute;
  
}
.sub-menu {
 display: none;
 position: absolute;
}
#menu ul li:hover .sub-menu {
  display: block;
}
.logo img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin-left:15%;
 
      }
h2{
    text-align: center;
}
#menu{
    margin-top: 15%;

}

</style>
<?php 
$sql="SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories";
$query=mysqli_query($mysqli,$sql);

?>
<header>
    

</header>
<div class="row">
  
        
    <div class="col-sm-2"  class="admin-menu li">
    <div class="logo">
          <img src="https://s120-ava-talk.zadn.vn/2/2/f/0/13/120/d6032707f2e221caa1043bae8f155dd5.jpg" alt="">
          <h2> Admin page</h2>
        </div>
        <div id="menu">
        <h2>Menu</h2>
            <ul>
                <li> <a href='#'>Product management </a>
                <ul class="sub-menu">
                <li><a href="/clothes.html">Clothes</a></li>
                <li><a href="/categories.html">Categories</a></li>
      
      </ul>
            </li>
                <li> <a href='#'>Post management </a>
                <ul class="sub-menu">
                <li><a href="/blog.html">Blog</a></li>
                <li><a href="/contact.html">Contact</a></li>
        
      </ul>
            
            </li>
                <li> <a href='#'>Information manage </a>
                <ul class="sub-menu">
                <li><a href="/content.html">Content</a></li>
                <li><a href="/cccd.html">CCCD</a></li>
        
      </ul>
            
            </li>
               
            </ul>
        </div>
    </div>
  <div class="col-sm-10">

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
         <h2>Danh  sách sản phẩm</h2>
         <a class="btn btn-primary" href="index.php?page_layout=add">Thêm mới</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>tiền cọc</th>
                        <th>Loại sản phẩm </h>
                        <th>Thời gian tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Sửa</th> 
                        <th>Xóa</th> 
                    </tr>
                </thead>
                <tbody>
                    
                   <?php
                   $i=1;
                   while($row= mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?= $row['name_clothes']; ?></td>
                        <td><img style="width:100px;" src=<?php echo $row['image']; ?>></td>
                        <td><?php echo $row['rent_prices']; ?></td>
                        <td><?php echo $row['tiencoc']; ?></td>
                        <td> <?= $row['name_categories'];?></td>
                        <td><?php echo $row['created_at']; ?></td>
                      
                        <td><?php echo $row['updated_at']; ?></td>  
                        <td><a class="btn btn-primary" onclick="return edit()" href="index.php?page_layout=edit&id=<?php echo $row['id_clothes']; ?>">sửa</a></td>
                   
                        <td><a class="btn btn-danger" onclick="return del('<?=  $row['name_clothes']; ?>')" href="index.php?page_layout=delete&id=<?=  $row['id_clothes']; ?>">xóa</a></td>  

                    </tr> 
                
                
                   
                   <?php }?>
                </tbody>

            </table>
        
        </div>
        
    </div>
                   </div>

</div>
</div>
<script>
    function edit(){
        return confirm("Bạn có chắc chắn muốn sửa sản phẩm không? ")
    }
    function del(name){
        return confirm("Bạn có chắc chắn muốn xoa sản phẩm:"+ name + " ?")
    }
</script>