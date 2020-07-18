<?php
namespace Classes\Controllers;
class Staff {
 private $staffTable;
 private $userTable;

 public function __construct($staffTable, $userTable) {
   $this->staffTable = $staffTable;
   $this->userTable = $userTable;
 }
 public function list() {
   
    $staffs = $this->staffTable->findAll();
    
     return[
        'template'=>'staffList.html.php',
        'title' => 'Staff list',
        'variables'=>['staffs'=>$staffs],
        ];
 }
 public function view(){
      $staff=null;
      $staff=$this->staffTable->findByID($_GET['id']);
   
   return[
      'template'=>'staffView.html.php',
      'title' => 'Staff list',
      'variables'=>['staff'=>$staff[0]],
      ];
 }


////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
public function editSubmit(){
   $staff = $_POST['staff'];
   $staff_id= $this->staffTable->save($staff) ?? $_POST['staff']['staff_id'];
   $username=''.$staff_id. '-' . $_POST['staff']['stafftype'];
   $userFound=$this->userTable->find('username',$username);
   $data=['username'=>$username,'password'=>$this->randomPassword(),'user_type'=>$_POST['staff']['stafftype']];
 
   if(!$userFound){
      $this->userTable->insert($data);
   }
   header('location: /staff/list');
}

 public function randomPassword() {
   $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $pass = array(); 
   $alphaLength = strlen($alphabet) - 1;
   for ($i = 0; $i < 5; $i++) {
       $n = rand(0, $alphaLength);
       $pass[] = $alphabet[$n];
   }
   return implode($pass); 
}

public function editForm(){
   $staff=null;
   if (isset($_GET['id'])) {
      
         $staff = $this->staffTable->findByID($_GET['id']);
         return [
            'template' => 'staffForm.html.php',
            'variables' => ['staff' => $staff[0]],
            'title' => 'Edit Staff'
         ];
      }

    else {
      return [
         'template' => 'staffForm.html.php',
         'variables' => [],
         'title' => 'Edit Staff'
      ];
   } 
}

 public function home() {
    $staffs ='';
  
    return[
        'template'=>'dashboard.html.php',
        'title' => 'DashBoard',
        'variables'=>['staffs'=>$staffs],
        ];
 }

 public function archive() {
  
   $this->staffTable->archive($_GET['id']);

   header('location: /staff/list');
  
}

public function delete() {
   $this->staffTable->delete($_GET['id']);
   header('location: /staff/list');
 }


}