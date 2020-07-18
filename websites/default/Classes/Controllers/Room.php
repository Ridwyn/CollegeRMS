<?php
namespace Classes\Controllers;
class Room {
 private $roomTable;
 public function __construct($roomTable) {
 $this->roomTable = $roomTable;
 }

////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $room = $_POST['room'];
   $this->roomTable->save($room);   
   header('location: /bookclass/edit');
}

public function editForm(){
   $room=null;
   if (isset($_GET['id'])) {
      $room = $this->roomTable->findByID($_GET['id'])[0];
     
   } else {
      $room = false;
   }
   return [
      'template' => 'roomForm.html.php',
      'variables' => ['room' => $room],
      'title' => 'Edit Room'
   ];
     
}


}