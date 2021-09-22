<?php 
class Controller_FindResume extends Controller
{
    function __construct()
	{
		$this->model = new Model_FindResume();
        $this->view = new View();
        
    }

    function action_index()
    {
        $data = $this->model->getLists();
        if($this->checkPost()){
            $select=array('select'=>$this->findRes());
            $data=array_merge($data,$select);
        } else {
            $select=array('select'=>$this->findAll());
            $data=array_merge($data,$select);
        }
        
        $this->view->generate('findResume_view.php', 'template_view.php',$data);
    }
    function checkPost(){
        if(!empty($_POST))
        {
            return true;
        }else{
            return false;
        }
    }
    function findRes()
    {
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
                $data=' Where r.id_education='.$_POST['educ'];
            }else{
                $data.=' and r.id_education='.$_POST['educ'];
            }
        }
        if(strcmp($_POST['prof'],"")!=0){
            if($data==null){
                $data=' Where r.id_profession='.$_POST['prof'];
            }else{
                $data.=' and r.id_profession='.$_POST['prof'];
            }
        }
        if(strcmp($_POST['sect'],"")!=0){
            if($data==null){
                $data=' Where r.id_section='.$_POST['sect'];
            }else{
                $data.=' and r.id_section='.$_POST['sect'];
            }
        }
        if(strcmp($_POST['jbc'],"")!=0){
            if($data==null){
                $data=' Where r.id_job_condition='.$_POST['jbc'];
            }else{
                $data.=' and r.id_job_condition='.$_POST['jbc'];
            }
        }
        if(strcmp($_POST['city'],"")!=0){
            if($data==null){
                $data=' Where r.id_city='.$_POST['city'];
            }else{
                $data.=' and r.id_city='.$_POST['city'];
            }
        }
        if(!empty($_POST['age'])){
            if($data==null){
                $data=' Where r.age>='.$_POST['age'];
            }else{
                $data.=' and r.age>='.$_POST['age'];
            }
        }
        if(!empty($_POST['pay'])){
            if($data==null){
                $data=' Where r.pay<='.$_POST['pay'];
            }else{
                $data.=' and r.pay<='.$_POST['pay'];
            }
        }
            $result= $this->model->findRes($data);
            return $result;
    }

    function findAll()
    {
            $data= $this->model->findAll();
            return $data;
    }
}
?>