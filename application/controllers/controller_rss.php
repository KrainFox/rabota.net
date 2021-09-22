<?php
class Controller_rss extends Controller
{

	function action_index()
	{	
		$this->view->generate('rss_view.php', 'template_view.php');
	}
}
?>