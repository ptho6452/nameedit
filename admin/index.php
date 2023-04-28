<?php
    require_once ('db.php')
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title> thi php  </title>
</head>
<body>
    <?php
    if (isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
            case 'danhsach':
                require_once ('danhsach.php');
                break;
            case 'add':
                require_once ('add.php');
                break;
            case 'edit':
                require_once ('edit.php');
                break;
            case 'delete':
                require_once ('delete.php');
                break;               
            default:
                require_once ('danhsach.php');

                break;
        }
    }else{
        require_once ('danhsach.php');

    }
    
    ?>
</body>
</html>