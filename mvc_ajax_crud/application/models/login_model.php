<?php


class LoginModel
{
   
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    
	public function loginCred($username, $password)
    { 
      $select = "Select * from users where email = '$username' and password = '$password'";
      $query=$this->db->prepare($select);
      $query->execute();
      if($row=$query->fetch()){
        Session::set('username', $username); 
      }
	  }

	public function read()
    { 
      $select = 'Select * from users';
      $query=$this->db->prepare($select);
      $query->execute();
      $result= $query->fetchAll();
      if ($result)
       {
        return $result;
      }
	  }

    public function insert($user){

      $email=$user['email'];
      $password=$user['password'];
      $fname=$user['fname'];
      $hobbies=$user['hobbies'];    
      $gender=$user['gender'];
      $role=$user['role'];

      $query="insert into users (email, password, fname,Hobbies, gender, role) values(:email, :password, :fname, :hobbies, :gender, :role)";
      $query_run= $this->db->prepare($query);
       $data =[
              ':email' => $email,
              ':password' => $password,
              ':fname' => $fname,
              ':hobbies' => $hobbies,
              ':gender' => $gender,
              ':role' => $role 
       ]; 

     $query_run->execute($data);
    }

    public function getuser($id){
    
      $select = 'Select * from users where id = ?';
      $query=$this->db->prepare($select);
      $query->execute([$id]);
      $result= $query->fetchAll();
      if ($result)
       {
        return $result;
      }
		}

    public function updateuser($user, $id){;
      $email=$user['email'];
      $password=$user['password'];
      $fname=$user['fname'];
      $hobbies=$user['hobbies'];
      $gender=$user['gender'];
      $role=$user['role'];
      $update = "update users set email='$email' ,password ='$password',fname='$fname',hobbies='$hobbies',gender='$gender',role='$role' where id = $id";
      $query=$this->db->prepare($update);
     if($query->execute())
     {
      return true;
     }else{
      return false;
     }
  }

  public function deleteuser($id)
  {
    $delete = "delete  from users where id = ?";
    $query=$this->db->prepare($delete);
    $query->execute([$id]);
  }
}
