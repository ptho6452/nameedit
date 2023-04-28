<?php require_once ('../trangchu/db.php'); 
session_start();
$action=(isset($_GET['action'])) ? $_GET['action'] : 'orders'; 
    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql= "SELECT *FROM users where email='$email'";
        $query=mysqli_query($mysqli,$sql);
        $data=mysqli_fetch_assoc($query);
        $checkemail= mysqli_num_rows($query);
        if($checkemail ==1){
            $checkPass=password_verify($password,$data['password']);
            if($checkPass=true){
                $_SESSION['user']=$data;
           
                if(isset($_GET['action'])){
                     
                header('location: ../cart/'.$action.'.php');}
                else{
                    header('location: ../trangchu/bangiaphucvu.php');
                }
            }else{
                echo "sai mật khẩu";
            }
        }else{
            echo "Email không tồn tại";
        }

    }
    
// $err =[];
// if(isset($_POST['name'])){
//     $name=$_POST['name'];
//     $email=$_POST['email'];
//     $password=$_POST['password'];
//     $rpassword=$_POST['rpassword'];
//     if(empty($name)){
//         $err['name']="bạn chưa nhập tên";

//     }
//     if(empty($email)){
//         $err['email']="bạn chưa nhập email";
        
//     }
//     if(empty($password)){
//         $err['password']="bạn chưa nhập mật khẩu";
        
//     }
//     if($password != $rpassword){
//         $err['rpassword']="mật khẩu nhập lại chưa đúng";
        
//     }
// if(empty($err)){
//     $pass=password_hash($password,PASSWORD_DEFAULT);
//     $sqli="INSERT INTO users(username,email,password)values('$name','$email','$password')";
//     $query = mysqli_query($mysqli,$sqli);}
//     if($query){
//         header('location: login.php');
//     }
// }

?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập</title>

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
                        <legend>Đăng nhập</legend>
                    
                        
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="input email" name="email">
                          
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" id="" placeholder="input password" name="password">
                          
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

