<?php
namespace Classes\Routes;

// Access levle explained
// 0 gives full access as admin
// 1 gives half access as teacher
// 2 gives limited access as student

class Routes implements \CSY2028\Routes {
    public $authentication;
	public function getRoutes(): array  {
		include __DIR__ . '/../../Connection/pdo.php';

        
        $staffTable = new \CSY2028\DatabaseTable($pdo, 'staff', 'staff_id');
        $studentsTable = new \CSY2028\DatabaseTable($pdo, 'student', 'student_id');
        $courseTable = new \CSY2028\DatabaseTable($pdo, 'courses', 'course_id');
        $moduleTable = new \CSY2028\DatabaseTable($pdo, 'module', 'module_id');
        $roomTable = new \CSY2028\DatabaseTable($pdo, 'room', 'room_id');
        $reservationTable = new \CSY2028\DatabaseTable($pdo, 'reservation', 'reservation_id');
        $userTable = new \CSY2028\DatabaseTable($pdo, 'users', 'user_id');
        $authentication = new \Classes\Controllers\Authentication($userTable);
        $this->authentication=$authentication;
        

        $moduleController=new \Classes\Controllers\Module($moduleTable,$courseTable,$staffTable);
        $bookClassController = new \Classes\Controllers\BookClass($roomTable,$reservationTable);
        $courseController = new \Classes\Controllers\Course($courseTable,$staffTable,$moduleTable);
        $roomController = new \Classes\Controllers\Room($roomTable);
        $staffController = new \Classes\Controllers\Staff($staffTable, $userTable);
        $studentController = new \Classes\Controllers\Student($studentsTable, $userTable, $courseTable);
        $dashboardController = new \Classes\Controllers\Dashboard($courseTable,$studentsTable,$roomTable);
        $searchController = new \Classes\Controllers\Search($courseTable,$studentsTable,$staffTable);
        $loginController = new \Classes\Controllers\Login($authentication);

        $announcementTable = new \CSY2028\DatabaseTable($pdo, 'announcements', 'announcement_id');     
        $announcementController = new \Classes\Controllers\Announcement($announcementTable, $staffTable);

         $routes= [
            '' => [
                'GET' => [
                    'controller' => $dashboardController,
                    'function' => 'home'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'search' => [
                'POST' => [
                    'controller' => $searchController,
                    'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
            ],
            'dashboard' => [
                'GET' => [
                    'controller' => $dashboardController,
                    'function' => 'home'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
            ],
            'checkreservation' => [
                'GET' => [
                    'controller' => $bookClassController,
                    'function' => 'checkreservation'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
               
            ],
            'bookclass/edit' => [
                'GET' => [
                    'controller' => $bookClassController,
                    'function' => 'editForm'
                    ],
               'loggedin' => true,
                'POST' => [
                    'controller' => $bookClassController,
                    'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
            ],
            'room/edit' => [
                'GET' => [
                    'controller' => $roomController,
                    'function' => 'editForm'
                    ],
                    'loggedin' => true,
                'POST' => [
                    'controller' => $roomController,
                    'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'staff/list' => [
                'GET' => [
                    'controller' => $staffController,
                    'function' => 'list'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'staff' => [
                'GET' => [
                    'controller' => $staffController,
                    'function' => 'view'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],        
            'staff/edit' => [
                'GET' => [
                'controller' => $staffController,
                'function' => 'editForm'
                ],
                'loggedin' => true,
                'POST' => [
                'controller' => $staffController,
                'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'staff/archive' => [
                'GET' => [
                    'controller' => $staffController,
                    'function' => 'archive'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],  
            'staff/delete' => [
                'GET' => [
                    'controller' => $staffController,
                    'function' => 'delete'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],    
            'student/list' => [
                'GET' => [
                    'controller' => $studentController,
                    'function' => 'list'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
            ],
            'student' => [
                'GET' => [
                    'controller' => $studentController,
                    'function' => 'view'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>true]
            ],        
            'student/delete' => [
                'GET' => [
                    'controller' => $studentController,
                    'function' => 'delete'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],        
            'student/edit' => [
                'GET' => [
                'controller' => $studentController,
                'function' => 'editForm'
                ],
               'loggedin' => true,
                'POST' => [
                'controller' => $studentController,
                'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>true]
            ],
            'student/archive' => [
                    'GET' => [
                        'controller' => $studentController,
                        'function' => 'archive'
                    ],
                   'loggedin' => true,
                   'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],   
            'student/enrol' => [
                'GET' => [
                'controller' => $studentController,
                'function' => 'enrollmentForm'
                ],
               'loggedin' => true,
                'POST' => [
                'controller' => $studentController,
                'function' => 'enrollmentSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'course/list' => [
                'GET' => [
                    'controller' => $courseController,
                    'function' => 'list'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>true]
            ],
            'course' => [
                'GET' => [
                    'controller' => $courseController,
                    'function' => 'view'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>true]
            ],        
            'course/delete' => [
                'GET' => [
                    'controller' => $courseController,
                    'function' => 'delete'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],        
            'course/edit' => [
                'GET' => [
                'controller' => $courseController,
                'function' => 'editForm'
                ],
                'loggedin' => true,
                'POST' => [
                'controller' => $courseController,
                'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'course/archive' => [
                'GET' => [
                    'controller' => $courseController,
                    'function' => 'archive'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],
            'module' => [
                'GET' => [
                    'controller' => $moduleController,
                    'function' => 'view'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>true]
            ],      
            'module/edit' => [
                'GET' => [
                'controller' => $moduleController,
                'function' => 'editForm'
                ],
                'POST' => [
                'controller' => $moduleController,
                'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],  
            'module/delete' => [
                'GET' => [
                    'controller' => $moduleController,
                    'function' => 'delete'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>false,'student'=>false]
            ],        
           'login' => [
                'GET' => [
                    'controller' => $loginController,
                    'function' => 'login'
                ],
                'POST' => [
                    'controller' => $loginController,
                    'function' => 'loginSubmit'
                ]
            ],
            'logout' => [
                'GET' => [
                    'controller' => $loginController,
                    'function' => 'logout'
                ]
            ],
            'announcement/list' => [
                'GET' => [
                    'controller' => $announcementController,
                    'function' => 'list'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>true]
            ],
            'announcement' => [
                'GET' => [
                    'controller' => $announcementController,
                    'function' => 'view'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>true]
            ],        
            'announcement/delete' => [
                'GET' => [
                    'controller' => $announcementController,
                    'function' => 'delete'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
            ],        
            'announcement/edit' => [
                'GET' => [
                'controller' => $announcementController,
                'function' => 'editForm'
                ],
                'POST' => [
                'controller' => $announcementController,
                'function' => 'editSubmit'
                ],
               'loggedin' => true,
               'access'=>['admin'=>true,'teacher'=>true,'student'=>false]
            ],
           ];  

       
           
        return $routes;
     }

     public function getAuth() {
        return $this->authentication;
    }


     public function getVarsForLayout($title, $output): array {
        
       $loggedIn = $this->getAuth()->isLoggedIn();
        return [
            'title' => $title,
            'output' => $output,
           'loggedIn' => $loggedIn
        ];
    }
}











    
