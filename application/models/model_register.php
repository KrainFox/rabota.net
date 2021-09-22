<?php

class Model_Register extends Model
{
    public function addUsr($login,$pass){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        if($mysqli_connect_errno) exit(' ');
        $mysql -> set_charset('utf8');
        $query =$mysql -> prepare('INSERT INTO `tbuser`(`id`,`login`, `password`, `date_reg`) VALUES (null,?,?,now())');   
        $query -> bind_param('ss',$login,$pass);
        $query -> execute();
        $query ->close();
        $mysql ->close();
    }
}