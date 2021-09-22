<?php

class Controller_Cabinet extends Controller
{
    function __construct()
	{
		$this->model = new Model_Cabinet();
		$this->view = new View();
	}
	function action_index()
    {	
        !$this->login();
        !$this->delete();
        !$this->logout();
        $data=array(
            'vacation'=>$this->findMyVac(),
            'resume'=>$this->findMyRes(),
            'name'=>$this->findName()
        );

        $this->view->generate('cabinet_view.php', 'template_view.php',$data);
    }

    public function login(){
        if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
            $regType = $_POST['typeLog'];
            $regLogin = $_POST['login'];
            $regPass = md5($_POST['password']);
            $this->model->LogUser($regLogin,$regPass,$regType);
            return true;
        }else{
            return false;
         }
    }

    public function logout(){
        if(!empty($_POST) && !empty($_POST['LogOut'])){
            $this->model->logOut();
            return true;
        }else{
            return false;
        }
    }

    public function findMyVac(){
        $data= $this->model->findMyVac();
        return $data;
    }
    public function findMyRes(){
        $data= $this->model->findMyRes();
        return $data;
    }
    public function findName(){
        $data= $this->model->findName();
        return $data;
    }

    function delete(){
        if(!empty($_POST) && !empty($_POST['vacCardId'])){
            $this->model->deleteId($_POST['vacCardId'],1);
            return true;
        }elseif(!empty($_POST) && !empty($_POST['resCardId'])){
            $this->model->deleteId($_POST['resCardId'],2);
            return true;
        }else{
            return false;
        }
    }
}