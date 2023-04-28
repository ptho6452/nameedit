<?php require_once ('../trangchu/db.php'); 

$err =[];
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $rpassword=$_POST['rpassword'];
    if(empty($name)){
        $err['name']="bạn chưa nhập tên";

    }
    if(empty($email)){
        $err['email']="bạn chưa nhập email";
        
    }
    if(empty($password)){
        $err['password']="bạn chưa nhập mật khẩu";
        
    }
    if($password != $rpassword){
        $err['rpassword']="mật khẩu nhập lại chưa đúng";
        
    }
if(empty($err)){
    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sqli="INSERT INTO users(username,email,password)values('$name','$email','$pass')";
    $query = mysqli_query($mysqli,$sqli);}
    if($query){
        header('location: login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng ký</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style>
    .has-error{
        color:red;
    }
</style>
      
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                    <form action="" method="POST" role="form">
                        <legend>Đăng ký tài khoản</legend>
                    
                        <div class="form-group">
                            <label for="">Tên người dùng</label>
                            <input type="text" class="form-control" id="" placeholder="input name" name="name">
                            <div class="has-error">
                                <span><?= (isset($err['name']))?$err['name']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="input email" name="email">
                            <div class="has-error">
                                <span><?= (isset($err['email']))?$err['email']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" id="" placeholder="input password" name="password">
                            <div class="has-error">
                                <span><?= (isset($err['password']))?$err['password']:'' ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="" placeholder="comfirm password" name="rpassword">
                            <div class="has-error">
                                <span><?= (isset($err['rpassword']))?$err['rpassword']:'' ?></span>
                            </div>
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>

            </div>
            
        </div>
        

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>

