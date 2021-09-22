<?php 
class Model_findVacation extends Model
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
    function findVac($data){
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
        On v.id_city= c.id'.$data;
        // print("\n \n \n \n".$query);
        $result = $mysql->query($query);
        return $result;
        $mysql->close();
    }
    function findAll()
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
        On v.id_city= c.id';
        $result = $mysql->query($query);
        return $result;
        $mysql->close();
    }
}
?>