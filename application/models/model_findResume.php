<?php 
class Model_FindResume extends Model
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
    function findRes($data){
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
        ON r.id_city = c.id'.$data;
        // WHERE r.id_education='.$data['educ'].'
        // and r.id_profession='.$data['prof'].'
        // and r.id_section='.$data['sect'].'
        // and r.id_job_condition='.$data['jbc'].'
        // and r.id_city='.$data['city'].'
        // and r.age>='.$data['age'].'
        // and r.pay<='.$data['pay'].';';
        $result = $mysql->query($query);
        return $result;
        $mysql->close();
    }

    function findAll(){
        define('DB_HOST','localhost');
        define('BD_USER','root');
        define('DB_Password','');
        define('DB_NAME','lab2_mcv');
        $mysql = new mysqli(DB_HOST,BD_USER,DB_Password,DB_NAME);
        $query = 'SELECT r.id, r.name, r.sex, r.id_education, e.title AS education, r.id_profession, p.title AS profession,r.id_section, s.title AS section,r.id_job_condition, j.title AS job_condition,r.id_city, c.title AS city, r.experience, r.requirements, r.age, r.pay, r.phone, r.email, r.web, r.add_date, r.remove_date
        FROM tbresume r
        JOIN tbeducation e ON r.id_education = e.id
        JOIN tbprofession p ON r.id_profession = p.id
        JOIN tbsections s ON r.id_section = s.id
        JOIN tbjobcondition j ON r.id_job_condition = j.id
        JOIN tbcity c ON r.id_city = c.id';
        $result = $mysql->query($query);
        return $result;
        $mysql->close();
    }
}
?>