<?php
class Routes {
 public function getPage($route) {
    $page;

    $routes=$this->getRoutes();
    $method = $_SERVER['REQUEST_METHOD'];
    $controller = $routes[$route][$method]['controller'];
    $functionName = $routes[$route][$method]['function'];
    $page = $controller->$functionName();

    
 return $page;
 }

 public function getRoutes(){
    require '../functions/pdo.php';
    require '../database/DatabaseTable.php';
    require '../controllers/StaffController.php';
    require '../controllers/CourseController.php';
    require '../controllers/StudentController.php';
    require '../controllers/BookClassController.php';
    require '../controllers/RoomController.php';
    require '../controllers/DashboardController.php';
    require '../controllers/SearchController.php';
   
    $teacherTable = new \Database\DatabaseTable($pdo, 'teacher', 'teacher_id');
    $adminTable = new \Database\DatabaseTable($pdo, 'admin', 'admin_id');
    $staffController = new \Controller\StaffController($teacherTable,$adminTable);
   
    $studentsTable = new \Database\DatabaseTable($pdo, 'student', 'student_id');
    $studentController = new \Controller\StudentController($studentsTable);

    $courseTable = new \Database\DatabaseTable($pdo, 'courses', 'course_id');
    $moduleTable = new \Database\DatabaseTable($pdo, 'module', 'module_id');
    $courseController = new \Controller\CourseController($courseTable,$teacherTable,$moduleTable);

    $roomTable = new \Database\DatabaseTable($pdo, 'room', 'room_id');
    $reservationTable = new \Database\DatabaseTable($pdo, 'reservation', 'reservation_id');
    $bookClassController = new \Controller\BookClassController($roomTable,$reservationTable);
    
    $roomController = new \Controller\RoomController($roomTable);

    $dashboardController = new \Controller\DashboardController($courseTable,$studentsTable,$roomTable);
    $searchController = new \Controller\SearchController($courseTable,$studentsTable,$teacherTable,$adminTable);
     $routes= [
        '' => [
            'GET' => [
                'controller' => $dashboardController,
                'function' => 'home'
            ]
        ],
        'search' => [
            'POST' => [
                'controller' => $searchController,
                'function' => 'editSubmit'
            ]
        ],
        'dashboard' => [
            'GET' => [
                'controller' => $dashboardController,
                'function' => 'home'
            ]
        ],
        'checkreservation' => [
            'GET' => [
                'controller' => $bookClassController,
                'function' => 'checkreservation'
            ]
        ],
        'bookclass/edit' => [
            'GET' => [
                'controller' => $bookClassController,
                'function' => 'editForm'
                ],
            'POST' => [
                'controller' => $bookClassController,
                'function' => 'editSubmit'
            ]
        ],
        'room/edit' => [
            'GET' => [
                'controller' => $roomController,
                'function' => 'editForm'
                ],
            'POST' => [
                'controller' => $roomController,
                'function' => 'editSubmit'
            ]
        ],
        'staff/list' => [
            'GET' => [
                'controller' => $staffController,
                'function' => 'list'
            ]
        ],
        'staff' => [
            'GET' => [
                'controller' => $staffController,
                'function' => 'view'
            ]
        ],        
        'staff/edit' => [
            'GET' => [
            'controller' => $staffController,
            'function' => 'editForm'
            ],
            'POST' => [
            'controller' => $staffController,
            'function' => 'editSubmit'
            ]
        ],
        'staff/archive' => [
            'GET' => [
                'controller' => $staffController,
                'function' => 'archive'
            ]
        ],  
        'staff/delete' => [
            'GET' => [
                'controller' => $staffController,
                'function' => 'delete'
            ]
        ],  
        'student/list' => [
            'GET' => [
                'controller' => $studentController,
                'function' => 'list'
            ]
        ],
        'student' => [
            'GET' => [
                'controller' => $studentController,
                'function' => 'view'
            ]
        ],        
        'student/delete' => [
            'GET' => [
                'controller' => $studentController,
                'function' => 'delete'
            ]
        ],        
        'student/edit' => [
            'GET' => [
            'controller' => $studentController,
            'function' => 'editForm'
            ],
            'POST' => [
            'controller' => $studentController,
            'function' => 'editSubmit'
            ]
            ],
        'student/archive' => [
                'GET' => [
                    'controller' => $studentController,
                    'function' => 'archive'
                ]
        ],   
        'course/list' => [
            'GET' => [
                'controller' => $courseController,
                'function' => 'list'
            ]
        ],
        'course' => [
            'GET' => [
                'controller' => $courseController,
                'function' => 'view'
            ]
        ],        
        'course/delete' => [
            'GET' => [
                'controller' => $courseController,
                'function' => 'delete'
            ]
        ],        
        'course/edit' => [
            'GET' => [
            'controller' => $courseController,
            'function' => 'editForm'
            ],
            'POST' => [
            'controller' => $courseController,
            'function' => 'editSubmit'
            ]
        ],
        'course/archive' => [
            'GET' => [
                'controller' => $courseController,
                'function' => 'archive'
            ]
        ], 
       ];  
       
    return $routes;
 }
}
