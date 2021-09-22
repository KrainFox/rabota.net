<?php 
class Controller_findVacation extends Controller
{
    function __construct()
	{
		$this->model = new Model_findVacation();
        $this->view = new View();
        
    }

    function action_index()
    {
        $data = $this->model->getLists();
        if($this->checkVac())
        {
            $select=array('select'=>$this->findVac());
            $data=array_merge($data,$select);
        }else{
            $select=array('select'=>$this->findAll());
            $data=array_merge($data,$select);
        }
        $this->view->generate('findVacation_view.php', 'template_view.php',$data);
    }

    function checkVac(){
        if(!empty($_POST))
        {
            return true;
        }else{
            return false;
        }
    }

    function findVac(){
        // $select = array(
        //     "educ" => $_POST['educ'],
        //     "prof" => $_POST['prof'],
        //     "sect" => $_POST['sect'],
        //     "jbc" => $_POST['jbc'],
        //     "city" => $_POST['city'],
        //     "age" => $_POST['age'],
        //     "pay" => $_POST['pay'],
        // );
        $data=null;
        if(strcmp($_POST['educ'],"")!=0){
            if($data==null){
                $data=' Where v.id_education='.$_POST['educ'];
            }else{
                $data.=' and v.id_education='.$_POST['educ'];
            }
        }
        if(strcmp($_POST['prof'],"")!=0){
            if($data==null){
                $data=' Where v.id_profession='.$_POST['prof'];
            }else{
                $data.=' and v.id_profession='.$_POST['prof'];
            }
        }
        if(strcmp($_POST['sect'],"")!=0){
            if($data==null){
                $data=' Where v.id_section='.$_POST['sect'];
            }else{
                $data.=' and v.id_section='.$_POST['sect'];
            }
        }
        if(strcmp($_POST['jbc'],"")!=0){
            if($data==null){
                $data=' Where v.id_job_condition='.$_POST['jbc'];
            }else{
                $data.=' and v.id_job_condition='.$_POST['jbc'];
            }
        }
        if(strcmp($_POST['city'],"")!=0){
            if($data==null){
                $data=' Where v.id_city='.$_POST['city'];
            }else{
                $data.=' and v.id_city='.$_POST['city'];
            }
        }
        if(!empty($_POST['age'])){
            if($data==null){
                $data=' Where v.age >='.$_POST['age'];
            }else{
                $data.=' and v.age >='.$_POST['age'];
            }
        }
        if(!empty($_POST['pay'])){
            if($data==null){
                $data=' Where v.pay <='.$_POST['pay'];
            }else{
                $data.=' and v.pay <='.$_POST['pay'];
            }
        }
        // print($data);
        $result= $this->model->findVac($data);
        return $result;
    }
    function findAll()
    {
        $data= $this->model->findAll();
        return $data;
    }
}
?>