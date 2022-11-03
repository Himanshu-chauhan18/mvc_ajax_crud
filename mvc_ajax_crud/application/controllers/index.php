<?php


class Index extends Controller
{
   
    function __construct() {
            parent::__construct();	
    }

    function index()
    {
        if(Session::get('username'))
		{
			$this->view->render('common/navbar');
			$this->view->render('common/sidebar');
			$this->view->render('interface/show_page');
			$this->view->render('common/footer');
		}else{
			$this->view->render('interface/login_page');
		}
    }
}
