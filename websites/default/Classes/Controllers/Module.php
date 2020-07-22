<?php
namespace Classes\Controllers;
class Module {
 private $staffTable;
 private $moduleTable;
 private $courseTable;
 
 public function __construct($moduleTable,$courseTable,$staffTable) {
 $this->staffTable = $staffTable;
 $this->moduleTable = $moduleTable;
 $this->courseTable = $courseTable;
 }

    public function list() {
        $modules = $this->moduleTable->find('staff_id',$_SESSION['id']);
        return[
            'template'=>'moduleList.html.php',
            'title' => 'Modules',
            'variables'=>['modules'=>$modules],
            ];
    }
    public function view(){
        $module = $this->moduleTable->findByID($_GET['id'])[0];
        $course = $this->courseTable->findByID($module['course_id'])[0];
        $staff=null;
        if(!empty($this->staffTable->findByID($module['staff_id'])[0])){
        $staff=$this->staffTable->findByID($module['staff_id'])[0];
        }
        return[
        'template'=>'moduleView.html.php',
        'title' => 'course list',
        'variables'=>['course'=>$course,'module'=>$module,'staff'=>$staff],
        ];
    }

    public function editSubmit(){
        $module = $_POST['module'];
        $course_id=$_GET['course_id'];
        if($_GET['course_id']){
            $module['course_id']=$_GET['course_id'];
        }
        $module_id= $this->moduleTable->save($module) ?? $_POST['module']['module_id']; 
      
        header('location: /course?id='.$module['course_id'].'');
    }
 
    public function editForm(){
        $courses=null;
        $staffs=$this->staffTable->find('stafftype','teacher');
    
        $module=null;
        if (isset($_GET['id'])) {
        $module= $this->moduleTable->findByID($_GET['id'])[0];

        } else {
        $module = false;
        }
        return [
        'template' => 'moduleForm.html.php',
        'variables' => ['courses' => $courses,'staffs'=>$staffs,'module'=>$module],
        'title' => 'Edit course'
        ];
      
    }

 
    public function delete() {
        $this->moduleTable->delete($_GET['id']);
        header('location: /course/list');
    }


}