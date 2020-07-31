<?php
namespace Classes\Controllers;
class Register {
 private $lectureTable;
 private $studentTable;
 private $staffTable;
 private $moduleTable;
 private $roomTable;
 private $registerTable;

 public function __construct($lectureTable,$studentTable,$staffTable,$moduleTable,$roomTable,$registerTable) {
 $this->lectureTable = $lectureTable;
 $this->studentTable = $studentTable;
 $this->staffTable = $staffTable;
 $this->moduleTable = $moduleTable;
 $this->roomTable = $roomTable;
 $this->registerTable = $registerTable;
 }

 public function register(){

    $lecturesTimetable=[];
    $size;
  

    if ($_SESSION['usertype']=='teacher') {
        $staff=$this->staffTable->findByID($_SESSION['id'])[0];
        $modules=$this->moduleTable->find('staff_id',$staff['staff_id']);
        
        foreach ($modules as $key => $module) {
            $lectures=$this->lectureTable->find('module_id',$module['module_id']);
            foreach ($lectures as $index => $lecture) {
                $size=count($lecture);
                $room=$this->roomTable->findByID($lecture['room_id'])[0];
               $register= $this->registerTable->findByID($lecture['lecture_id']);
                $d['module_name']=$module['name'];
                $d[$size++]=$module['name'];
                $d['room_number']=$room['room_number'];
                $d[$size++]=$room['room_number'];
                if (isset($register[0]['lecture_id'])==$lecture['lecture_id']) {
                    $d['is_marked']=true;
                    $d[$size++]=true;
                }else{
                    $d['is_marked']=false;
                    $d[$size++]=false;
                }
               
                $a=$lecture+=$d;
                $lecturesTimetable[$index]=$a;
            }
        }
    }
    return[
        'template'=>'register.html.php',
        'title' => '',
        'variables'=>['lecturesTimetable'=>$lecturesTimetable],
        ];


 }

    public function view(){
        $register_Details=[];
        $size;
        $registers=$this->registerTable->find('lecture_id',$_GET['id']);
        foreach ($registers as $key => $register) {
            $student=$this->studentTable->findByID($register['student_id'])[0];
            $lecture=$this->lectureTable->findByID($register['lecture_id'])[0];
            $module=$this->moduleTable->findByID($lecture['module_id'])[0];

            $size=count($student);
            $d['module_name']=$module['name'];
            $d[$size++]=$module['name'];
            $d['student_name']=$student['Fname'] .' '.$student['Sname'];
            $d[$size++]=$student['Fname'] .' '.$student['Sname'];

            $a=$student+=$d;
            $register_Details[$key]=$a;

            // $students=$this->studentTable->find('course_id',$module['course_id']);
            // foreach ($students as $index => $student) {
              
            //     if ($student['student_id']==$register['student_id']) {
            //         $d['is_present']=true;
            //         $d[$size++]=true;
            //     }else{
            //         $d['is_present']=false;
            //         $d[$size++]=false; 
            //     }

               
            // }
                                 
        }


        return[
            'template'=>'registerView.html.php',
            'title' => 'Register View',
            'variables'=>['register_Details'=>$register_Details],
            ];
    }

    public function editSubmit (){
        foreach ($_POST as $key => $register) {
           if($register['confirm']=='yes'){
            unset($register['confirm']);
            $this->registerTable->insert($register);
           }
        }
        return($this->register());
    }


 public function editForm(){
    $students_on_lecture=[];
    $size;

    $lecture=$this->lectureTable->findByID($_GET['id'])[0];
    $module=$this->moduleTable->find('module_id',$lecture['module_id'])[0];
    $students=$this->studentTable->find('course_id',$module['course_id']);

            foreach ($students as $index => $student) {
                $size=count($student);
            
                $d['module_name']=$module['name'];
                $d[$size++]=$module['name'];
                $d['module_id']=$module['module_id'];
                $d[$size++]=$module['module_id'];
                $d['lecture_id']=$lecture['lecture_id'];
                $d[$size++]=$lecture['lecture_id'];
                $d['lecture_start_date']=$lecture['start_date'];
                $d[$size++]=$lecture['start_date'];
                $d['lecture_end_date']=$lecture['end_date'];
                $d[$size++]=$lecture['end_date'];
                $a=$student+=$d;
                $students_on_lecture[$index]=$a;
            }

    return[
        'template'=>'registerLectureForm.html.php',
        'title' => '',
        'variables'=>['students_on_lecture'=>$students_on_lecture],
        ];
 }



}