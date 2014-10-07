<?php
require_once('lib/Model.php');
require_once('lib/View.php');

class UsersController
{
    private $model = null;
    
    public function __construct()
    {
        $mysql = MySQL::getInstance(array('localhost', 'root', '', 'mvc'));
    	$this->model = new Model($mysql,'users');
    	
    	$out = new View('header', array('title' => 'Testtitle', 'heading' => 'Userseite'));
    	$out->display();
    }

    public function index()
    {
        $view = new View('user_list');
       	$view->users = $this->model->fetchAll();
       	$view->display();
    }

    public function create($id)
    {
    	$view = new View('user_form');
		$view->display();
    }
    
    public function save($id)
    {
    	if ($_POST['send'])
    	{
    		$fname = $_POST['fname'];
    		$lname = $_POST['lname'];
    		$email = $_POST['email'];

    		if($id !== null)
    		{
    			$this->model->update(array('fname' => $fname, 'lname' => $lname, 'email' => $email), (int)$id);
    		}
    		else
    		{
    			$this->model->insert(array('fname' => $fname, 'lname' => $lname, 'email' => $email));
    		}
    	}
    }

    public function delete($id)
    {
       $this->model->delete((int)$id);
    }
    
    public function __destruct(){
    	$out = new View('footer');
    	$out->display();
    }
}