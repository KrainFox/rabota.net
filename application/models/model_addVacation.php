<?php 
class Model_addVacation extends Model
{
    function getLists(){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        $query = "SELECT * FROM `tbeducation`";
        $educationList = $mysql->query($query);
        $query = "SELECT * FROM `tbprofession`";
        $profList = $mysql->query($query);
        $query = "SELECT * FROM `tbsections`";
        $sectionList = $mysql->query($query);
        $query = "SELECT * FROM `tbjobcondition`";
        $jbcList = $mysql->query($query);
        $query = "SELECT * FROM `tbcity`";
        $cityList = $mysql->query($query);
        $dataList = array(
            "educ" => $educationList,
            "prof" => $profList,
            "sect" => $sectionList,
            "jbc" => $jbcList,
            "city" => $cityList,
        );
        return $dataList;
        $mysql->close();
    }
    function addVac($vacation){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        if($mysqli_connect_errno) exit(' ');
        $mysql -> set_charset('utf8');
        $query =$mysql -> prepare('INSERT INTO `tbvacations`
        (`id`
        , `id_education`
        , `id_profession`
        , `id_section`
        , `id_job_condition`
        , `id_city`
        , `experience`
        , `requirements`
        , `age`
        , `pay`
        , `name`
        , `phone`
        , `email`
        , `web`
        , `id_user`
        , `add_date`
        , `remove_date`) 
        VALUES 
        (NULL
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,now()
        ,now()+INTERVAL 1 MONTH)');
        $query -> bind_param('iiiiissiissssi'
        ,$vacation['educ']
        ,$vacation['prof']
        ,$vacation['sect']
        ,$vacation['jbc']
        ,$vacation['city']
        ,$vacation['exp']
        ,$vacation['req']
        ,$vacation['age']
        ,$vacation['pay']
        ,$vacation['name']
        ,$vacation['phone']
        ,$vacation['email']
        ,$vacation['web']
        ,$_COOKIE['id']);
        $query -> execute();
        $query ->close();
        $mysql ->close();
    }
}
?>