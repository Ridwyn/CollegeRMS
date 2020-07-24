<?php
namespace Classes\Controllers;
class Lecture {
 private $moduleTable;
 private $courseTable;
 private $staffTable;
 private $roomTable;
 private $lectureTable;

 public function __construct($courseTable,$moduleTable,$staffTable,$roomTable,$lectureTable) {
    $this->courseTable = $courseTable;
    $this->moduleTable = $moduleTable;
    $this->staffTable = $staffTable;
    $this->roomTable = $roomTable;
    $this->lectureTable = $lectureTable;
 }


 public function plan(){
    $modules=$this->moduleTable->find('course_id',$_GET['id']);
    $course=$this->courseTable->find('course_id',$_GET['id'])[0];
    $lectures=$this->lectureTable->findAll();
    $data=array_merge($lectures[0],['module_name'=>$modules[0]['name']]);
    $lecturesPlan=[];

    foreach ($lectures as $key => $lecture) {
        for ($i=0; $i <count($modules) ; $i++) { 
            if($lecture['module_id']==$modules[$i]['module_id']){
                $module=$this->moduleTable->findByID($lecture['module_id'])[0];
                $staff=$this->staffTable->findByID($lecture['staff_id'])[0];
                $room=$this->roomTable->findByID($lecture['room_id'])[0];
                // $

                $d['module_name']=$module['name'];
                $d[6]=$module['name'];
                $d['staff_name']=$staff['Fname'].'-'.$staff['Sname'];
                $d[7]=$staff['Fname'].'-'.$staff['Sname'];
                $d['room_number']= $room['room_number'];
                $d[8]= $room['room_number'];
                $a=$lecture+=$d;
                $lecturesPlan[$key]=$a;
            }
        }
        
    }
    return[
        'template'=>'lecturePlan.html.php',
        'title' => 'Course list',
        'variables'=>['lecturesPlan'=>$lecturesPlan,'modules'=>$modules,'course'=>$course]
    ];
 }

 private function isreserved($lecture){
    $bol=false;
    
    $form_endtime=\strtotime($lecture['end_date']);
    $form_starttime=\strtotime($lecture['start_date']);
    $lectures = $this->lectureTable->findAll();
    foreach ($lectures as $l) {
     $db_endtime=\strtotime($l['end_date']);
     $db_starttime=\strtotime($l['start_date']);
 
        if (($l['room_id']==$lecture['room_id']) &&
            ($l['staff_id']==$lecture['staff_id'])&&
             ($form_endtime==$db_endtime)&&
             ($form_starttime==$db_starttime)
         ) {
             $bol=true;
       }
   }
   

   return $bol;
}


 public function editSubmit(){
    $lecture = $_POST['lecture'];
   
    $room_id=$lecture['room_id'];
 
    $rooms = $this->roomTable->findAll();
   $bol= $this->isreserved($lecture);
   var_dump($bol);
   $error='';
   $val=null;
//    IF BOOKED
   if($bol){
    $module_id = $_POST['lecture']['module_id']; 
    $module=$this->moduleTable->findByID($module_id)[0];
     $error="Room and lecturer is reserved for this time selected a different time to Plan this module";
     $staffs=$this->staffTable->find('stafftype','teacher');
     return [
         'template' => 'lecturePlanForm.html.php',
         'variables' => ['lecture' => $lecture,'rooms'=>$rooms,'module'=>$module,'staffs'=>$staffs,'error'=>$error],
         'title' => 'Book Classroom'
     ];
     }
    
     // IF NOT   BOOOKED
     if(!$bol){
         $this->lectureTable->save($lecture);
       $module_id = $_POST['lecture']['module_id']; 
       $module=$this->moduleTable->findByID($module_id)[0];
        return header('location: /lecture/plan?id='.$module['course_id'].'');        
     }
 }
 

 public function editForm(){
    $lecture=null;
    $rooms = $this->roomTable->findAll();
    $module= $this->moduleTable->findByID($_GET['module_id'])[0];
    $staffs=$this->staffTable->find('stafftype','teacher');
   
    if (isset($_GET['id'])) {
     $lecture = $this->lectureTable->findByID($_GET['id'])[0];
     
     
    } else {
       $lecture = false;
    }
    return [
       'template' => 'lecturePlanForm.html.php',
       'variables' => ['lecture' => $lecture,'rooms'=>$rooms,'module'=>$module,'staffs'=>$staffs],
       'title' => 'Edit course'
    ];
      
 }




}
