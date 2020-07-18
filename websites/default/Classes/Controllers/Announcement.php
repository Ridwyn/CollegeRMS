<?php
namespace Classes\Controllers;
class Announcement {
 private $announcementTable;
 
 public function __construct($announcementTable, $staffTable) {
 $this->announcementTable = $announcementTable;
 $this->staffTable = $staffTable;
 }
 public function list() {
    $announcements = $this->announcementTable->findAll();
     return[
        'template'=>'announcementList.html.php',
        'title' => 'announcements',
        'variables'=>['announcements'=>$announcements],
        ];
 }

public function view(){
  
    $announcement = $this->announcementTable->findByID($_GET['id'])[0];
    return[
       'template'=>'announcementView.html.php',
       'title' => 'announcement',
       'variables'=>['announcement'=>$announcement],
       ];
  }

  public function editSubmit(){
    $announcement = $_POST['announcement'];

    $this->announcementTable->save($announcement); 
    header('location: /announcement/list');
 }

 public function editForm(){
    $announcement=null;
    $teacher = $this->staffTable->findByID($_SESSION['id'])[0];


    if (isset($_GET['id'])) {
       $announcement = $this->announcementTable->findByID($_GET['id'])[0];
    } else {
       $announcement = false;
    }
    return [
       'template' => 'announcementForm.html.php',
       'variables' => ['announcement' => $announcement,'teacher' => $teacher],
       'title' => 'Edit announcement'
    ];
    var_dump($teacher);
 }

 public function delete() {
    $this->announcementTable->delete($_GET['id']);
    header('location: /announcement/list');
  }
 
  public function home() {
     $announcements ='';
   
     return[
         'template'=>'announcementsList.html.php',
         'title' => 'Announcements',
         'variables'=>['anno$announcements'=>$announcements],
         ];
  }






}