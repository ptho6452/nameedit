<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
     <title>Document</title>
     <style>
      .logo {
    padding: 0px;
      }
    body{
      background-color: #333;

        position: relative;

  
    }
      
      .logo img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
      }
    #menu ul {
        list-style-type: none;
        overflow: hidden;
        font-size: 0px;
        text-align: center;
        display: inline-block;
        width: 100%;
      }
      
      #menu li {
        display: inline-block;
        margin: 50px;
        right: 0px;
      }
      
      #menu li a {
        display: block;
        color: white;
        text-align: center;
        padding: 10px 10px;
        text-decoration: none;
        font-size: 18px;
      }
      
      #menu li a:hover {
        background-color: #efe9e9;
      }
      
    
      #menu ul ul {
        position: absolute;
        top: 100%;
        left: 0;
        padding: 0;
      }
      
      #menu ul ul li {
        float: none;
        width: 200px;
      }
      
      #menu ul ul a {
        color: #333;

        display: block;
        text-decoration: none;
      }
      .admin-menu{
        color: #ddd;
      }
      .admin-menu ul ul {
        display: none;
      }
      .admin-menu ul li a{
        text-decoration: none;
        color: #ddd;
        font-family: Arial, sans-serif;
        font-size: 17px;
      }
      .admin-menu ul li:hover > ul {
        display: block;
      }
      .admin-menu {
        font-family: Arial, sans-serif;
        
        
      }
      
      .admin-menu ul {
        list-style: none;
        padding: 0px;
        margin: 0px;
        position: relative;
      }
    table{
      width:-1000% auto;
    }
      .admin-menu li {
        position: relative;
      }

      .admin-menu > ul > li {
        display: block;

      }
    .admin-menu ul li a:hover{
      background-color: #f9d223;

    } 
    .admin-menu > ul > li:hover > ul {
        display: block;
      }

    .admin-menu > ul > li > ul > li > a {
        display: block;
        text-decoration: none;
        color:  #f9f9f9;
        padding: 0px;
      }
    h2{
        color:  #f9f9f9;
    }
     </style>
</head>
<body>

      <div class="row">
        <div class="logo">
          <img src="https://s120-ava-talk.zadn.vn/2/2/f/0/13/120/d6032707f2e221caa1043bae8f155dd5.jpg" alt="">
          <h2> Admin page</h2>
        </div>
        
        <div id="menu"> 
          <ul>
            <li><a href="#">Admin home</a></li>
            <li><a href="#">Go web page</a></li>
            <li><a href="#">Order</a></li>
          </ul>
        </div> 
  </div>     
          <div class=" admin-menu">
            <h2>Menu</h2>
            <div class="row">
              <div class="col-sm-3"  id="admin-menu">
                <ul>
                  <li><a href="#">Product management</a>
                    <ul>
                      <li><a href="/clothes.html">Clothes</a></li>
                      <li><a href="/categories.html">Categories</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Post management </a>
                    <ul>
                      <li><a href="/blog.html">Blog</a></li>
                      <li><a href="/contact.html">Contact</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Information manage</a>
                      <ul>
                        <li><a href="/content.html">Content</a></li>
                        <li><a href="/cccd.html">CCCD</a></li>
                      </ul>
                      </li>
                </ul>
            </div>
            <div class="col-sm-9" id= "admin-menu">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>Image</th>
                    <th>name_clothes</th>
                    <th>sex</th>
                    <th>decription</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once 'connect.php';
                  // ket noi
                  // cau lenh
                  $hienthi_sql = "SELECT image, name_clothes, sex, description FROM clothes";
                  // thuc thi cau lenh
                  $result = mysqli_query($conn, $hienthi_sql);
                  // duyet qua result và in ra
                  while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $r['image']; ?>
                      </td>
                      <td>
                        <?php echo $r['name_clothes']; ?>
                      </td>
                      <td>
                        <?php echo $r['sex']; ?>
                      </td>
                      <td>
                        <?php echo $r['decription']; ?>
                      </td>
                      <td><a href="edit.php?sid=<?php echo $r['id']; ?>" class="btn btn-success"> sửa</a>
                        <a onclick="return confirm ('bạn có muốn xóa sinh viên này không');"
                          href="xoa.php?sid=<?php echo $r['id']; ?>" class="btn btn-danger">xóa
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
  </div>
  </div>


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

</body>
</html>