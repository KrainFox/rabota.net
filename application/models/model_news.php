<?php

class Model_News extends Model
{
    function getNews(){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        $query = "SELECT topic, article, DATE_FORMAT( date_crt, '%d.%m.%Y' ) AS date FROM tbnews";
        $dataNews = $mysql->query($query);
        return $dataNews;
        $mysql->close();
    }
}