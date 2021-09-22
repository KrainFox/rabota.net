<?php 
class Controller_AddVacation extends Controller
{
    function __construct()
	{
		$this->model = new Model_addVacation();
		$this->view = new View();
    }
    
    function action_index()
	{
        $dateLists = $this->model->getLists();
        !$this->addVac();
        $this->view->generate('addVacation_view.php', 'template_view.php',$dateLists);
    }
    function addVac()
    {
        if(!empty($_POST) 
        && !empty($_POST['name']) 
        && !empty($_POST['educ']) 
        && !empty($_POST['prof']) 
        && !empty($_POST['sect']) 
        && !empty($_POST['jbc']) 
        && !empty($_POST['city']) 
        && !empty($_POST['exp']) 
        && !empty($_POST['req']) 
        && !empty($_POST['age']) 
        && !empty($_POST['pay'])
        && !empty($_POST['phone'])
        && !empty($_POST['email'])
        && !empty($_POST['web']))
        {
            $data = array(
                "name" => $_POST['name'],
                "educ" => $_POST['educ'],
                "prof" => $_POST['prof'],
                "sect" => $_POST['sect'],
                "jbc" => $_POST['jbc'],
                "city" => $_POST['city'],
                "exp" => $_POST['exp'],
                "req" => $_POST['req'],
                "age" => $_POST['age'],
                "pay" => $_POST['pay'],
                "phone" => $_POST['phone'],
                "email" => $_POST['email'],
                "web" => $_POST['web']
            );
            $this->model->addVac($data);
            return true;
        }else{
            return false;
        }
    }
}
?>