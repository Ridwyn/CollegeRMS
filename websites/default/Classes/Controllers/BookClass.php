<?php
namespace Classes\Controllers;
class BookClass {
 private $roomTable;
 private $reservationTable;

 
 public function __construct($roomTable,$reservationTable) {
 $this->roomTable = $roomTable;
 $this->reservationTable = $reservationTable;
 }
 
//  public function list() {
//     $courses = $this->courseTable->findAll();
//      return[
//         'template'=>'courseList.html.php',
//         'title' => 'Course list',
//         'variables'=>['courses'=>$courses],
//         ];
//  }

public function myReservations(){
    $reservations=[];
    $rooms = $this->roomTable->findAll();
    $reservations_withoutName=  $this->reservationTable->find('username',$_SESSION['username']);

    //    NOTE MATCH THE RESERVATION TO GET ROOM NAME AND LOCATION
    foreach ($reservations_withoutName as $reservation) {
        foreach ($rooms as $room) {
            if ($reservation['room_id'] == $room['room_id']) {
                $result=array_merge($reservation,$room);
              array_push($reservations,$result);
            }
        }       
    }

    return[
        'template'=>'checkreservation.html.php',
        'title' => 'Reservation',
        'variables'=>['reservations'=>$reservations],
        ];
}

 public function checkreservation(){
   $rooms = $this->roomTable->findAll();
   $reservations_withoutName = $this->reservationTable->findAll();
    $reservations=[];
//    NOTE MATCH THE RESERVATION TO GET ROOM NAME AND LOCATION
    foreach ($reservations_withoutName as $reservation) {
        foreach ($rooms as $room) {
            if ($reservation['room_id'] == $room['room_id']) {
                $result=array_merge($reservation,$room);
              array_push($reservations,$result);
            }
        }       
    }
//
   return[
      'template'=>'checkreservation.html.php',
      'title' => 'Reservation',
      'variables'=>['reservations'=>$reservations],
      ];
 }


 private function isreserved($reservation){
     $bol=false;
     
     $form_endtime=\strtotime($reservation['end_date']);
     $form_starttime=\strtotime($reservation['start_date']);
     $reservations = $this->reservationTable->findAll();
     foreach ($reservations as $r) {
      $db_endtime=\strtotime($r['end_date']);
      $db_starttime=\strtotime($r['start_date']);
  
         if (($r['room_id']==$reservation['room_id']) &&
              ($form_endtime==$db_endtime)&&
              ($form_starttime==$db_starttime)
          ) {
              $bol=true;
        }
    }
    

    return $bol;
 }


////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $reservation = $_POST['reservation'];
  
   $room_id=$reservation['room_id'];


   $rooms = $this->roomTable->findAll();
  $bol= $this->isreserved($reservation);
  $error='';
  $val=null;
//   IF BOOKED
  if($bol){
    $error="Room is reserved for this time selected a different time";
    return [
        'template' => 'bookClassForm.html.php',
        'variables' => ['reservation' => $reservation,'rooms'=>$rooms,'error'=>$error],
        'title' => 'Book Classroom'
    ];
    }
   
    // IF NOT   BOOOKED
    if(!$bol){
        $this->reservationTable->save($reservation); 
       return $this->checkreservation();        
    }
}

public function editForm(){
   $reservation=null;
   $rooms = $this->roomTable->findAll();
  
   if (isset($_GET['id'])) {
    $reservation = $this->reservationTable->findByID($_GET['id'])[0];
    
   } else {
      $reservation = false;
   }
   return [
      'template' => 'bookClassForm.html.php',
      'variables' => ['reservation' => $reservation,'rooms'=>$rooms],
      'title' => 'Edit course'
   ];
     
}

//  public function delete() {
//  $this->courseTable->delete($_GET['id']);
//  header('location: /course/list');
//  }
}