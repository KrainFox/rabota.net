<?php

class Controller_Register extends Controller
{
    function __construct()
	{
		$this->model = new Model_Register();
		$this->view = new View();
	}
	function action_index()
	{	
        !$this->register();
		$this->view->generate('register_view.php', 'template_view.php');
    }

    public function register(){
        if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
            $refLogin = $_POST['login'];
            $regPass = md5($_POST['password']);
            $this->model->addUsr($refLogin,$regPass);
            return true;
        }else{
            return false;
        }
    }
}