<?php
class Welcome extends Controller
{
	
    function __construct()
    {
		parent::__construct();
		
    }

    function index()
    { 
		$username=$_POST['username'];
		$password=$_POST['password'];
		$login_model = $this->loadModel('Login');
        $login_model->loginCred($username,$password); 
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


	public function editshow(){
	     	$this->view->render('common/navbar');
			$this->view->render('common/sidebar');
			$this->view->render('interface/show_page');
			$this->view->render('common/footer');
	}
	public function sess(){
		Session::destroy();
		header('location: http://localhost/mvc_ajax_crud/index');
	}

    public function insert(){
		$hob = implode(',',$_POST['hobbies']);
		$user['email'] = $_POST['email'];
		$user['password'] = $_POST['password'];
		$user['fname'] = $_POST['fname'];
		$user['hobbies'] = $hob;
		$user['gender'] = $_POST['gender'];
		$user['role'] = $_POST['role'];
	    $login_model = $this->loadModel('Login');
        $login_model->insert($user); 
	}



    function read()
    {
        $login_model = $this->loadModel('Login');
        $data=$login_model->read(); 
        foreach($data as $row){
			?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->password; ?></td>
				<td><?php echo $row->fname; ?></td>
				<td><?php echo $row->hobbies; ?></td>
				<td><?php echo $row->gender; ?></td>
				<td><?php echo $row->role; ?></td>
				<td>
					<a class="btn btn-warning edit " href="http://localhost/mvc_ajax_crud/application/views/interface/edit_page.php?id=<?php echo $row->id; ?>"><span class="glyphicon glyphicon-edit"></span>Edit</a> 
					<a class="btn btn-danger delete" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-trash"></span>Delete</a>
				</td>
			</tr>
			<?php
		}
    }
	public function getuser(){
		$id = $_POST['id'];
        $login_model = $this->loadModel('Login');
        $data=$login_model->getuser($id); 
		echo json_encode($data);
	}

    public function update1(){
		$id = $_POST['id'];
		$hob = implode(',',$_POST['hobbies']);
		$user['email'] = $_POST['email'];
		$user['password'] = $_POST['password'];
		$user['fname'] = $_POST['fname'];
		$user['hobbies'] = $hob;
		$user['gender'] = $_POST['gender'];
		$user['role'] = $_POST['role'];
       
        $login_model = $this->loadModel('Login');
        $data=$login_model->updateuser($user,$id); 
	
	}

    public function delete(){
        $id= $_POST['id'];
        $login_model = $this->loadModel('Login');
        $login_model->deleteuser($id); 
    }

}
