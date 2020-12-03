<?php

class Controller_BrandAdd extends Controller
{
	
	function action_index()
	{
		$this->view->generate('brandAdd_view.php', 'template_view.php');
	}
}
