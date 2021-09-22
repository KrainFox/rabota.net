<?php

class Model_Cabinet extends Model
{
    public function LogUser($login,$pass,$type){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        if($mysqli_connect_errno) exit(' ');
        $mysql -> set_charset('utf8');
        if($type==1){
            $query = 'SELECT u.id 
            FROM tbuser u
            WHERE u.login ="'.$login.'"  
            and u.password ="'.$pass.'"' ;
            $id = $mysql->query($query);
            if($id!=false){
                while($row=$id->fetch_assoc()){
            setcookie('id',$row['id'],0,'/');
                }
            }
        }
        else{
            $query = 'SELECT u.id 
            FROM tbuser u
            WHERE u.login ="'.$login.'"';
            $id = $mysql->query($query);
            if($id->num_rows==0){
                $query =$mysql -> prepare('INSERT INTO `tbuser`(`id`,`login`, `password`, `date_reg`) VALUES (null,?,?,now())');   
                $query -> bind_param('ss',$login,$pass);
                $query -> execute();
                $query=NULL;
                $query = 'SELECT u.id 
                FROM tbuser u
                WHERE u.login ="'.$login.'"  
                and u.password ="'.$pass.'"' ;
                $id = $mysql->query($query);
                if($id->num_rows!=0){
                while($row=$id->fetch_assoc()){
                setcookie('id',$row['id'],0,'/');
                    }
                }
            }

        }
        header('Location: /cabinet');
        $mysql ->close();
    }
      
    function logOut(){
        setcookie('id',"",-3600,'/');
        unset($_COOKIE['id']);
    }

    function findMyVac()
    {
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        $query = 'SELECT v.id, v.id_education,e.title AS education, v.id_profession,p.title AS profession, v.id_section,s.title AS section, v.id_job_condition,j.title AS job_condition, v.id_city,c.title AS city, v.experience, v.requirements, v.age, v.pay, v.name, v.phone, v.email, v.web, v.add_date, v.remove_date 
        FROM tbvacations v 
        JOIN tbeducation e 
        ON v.id_education=e.id
        JOIN tbprofession p
        ON v.id_profession=p.id
        JOIN tbsections s
        ON v.id_section=s.id
        JOIN tbjobcondition j
        ON v.id_job_condition=j.id
        JOIN tbcity c
        On v.id_city= c.id
        Where v.id_user='.$_COOKIE['id'].';';
        $result = $mysql->query($query);
        return $result;
        $mysql->close();
    }

    function findMyRes(){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        $query = 'SELECT r.id, r.name, r.sex, r.id_education, e.title AS education, r.id_profession, p.title AS profession,r.id_section, s.title AS section,r.id_job_condition, j.title AS job_condition,r.id_city, c.title AS city, r.experience, r.requirements, r.age, r.pay, r.phone, r.email, r.web, r.add_date, r.remove_date
        FROM tbresume r
        JOIN tbeducation e 
        ON r.id_education = e.id
        JOIN tbprofession p 
        ON r.id_profession = p.id
        JOIN tbsections s 
        ON r.id_section = s.id
        JOIN tbjobcondition j 
        ON r.id_job_condition = j.id
        JOIN tbcity c 
        ON r.id_city = c.id
        Where r.id_user='.$_COOKIE['id'].';';
        $result = $mysql->query($query);
        return $result;
        $mysql->close();
    }
    
    function findName(){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        if($mysqli_connect_errno) exit(' ');
        $mysql -> set_charset('utf8');
        $query = 'SELECT u.login 
        FROM tbuser u
        WHERE u.id ='.$_COOKIE['id'];
        $name = $mysql->query($query);
        if($name->num_rows!=0){
            while($row=$name->fetch_assoc()){
                return $row['login'];
            }
        }
    }

    function deleteId($delId,$type){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        if($mysqli_connect_errno) exit(' ');
        $mysql -> set_charset('utf8');
        if($type== 1) $query =$mysql -> prepare('DELETE FROM `tbvacations` WHERE id=?');
        if($type== 2) $query =$mysql -> prepare('DELETE FROM `tbresume` WHERE id=?');
        $query -> bind_param('i',$delId);
        $query -> execute();
        $query ->close();
        $mysql ->close();
    }
}
