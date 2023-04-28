<?php 

class clothes {
    public $name;
    public $img;
    public $rent_prices;
    public $tiencoc;
    public $created_at;
    public $id_clothes;

    function __construct(){
        $this -> name= $_POST['id_clothes'];
        $this-> img= $_POST['img'];
        $this-> rent_prices= $_POST['rent_prices'];
        $this-> tiencoc= $_POST['tiencoc'];
        $this-> created_at= $_POST['created_at'];
        $this-> id_clothes= $_POST['id_clothes'];

    }
    function __destruct(){
        $this->name;
        $this-> img;

    }
}


?>