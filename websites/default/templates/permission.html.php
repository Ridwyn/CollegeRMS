<?php



$route=trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
$entity=explode('/',$route)[0];
$id=$_GET['id'];

if($_SESSION['usertype']=='admin'){
    $enrolLink='';
    if($entity=='student'){
        $enrolLink='<li class="col"><a href="/'.$entity.'/enrol?id='.$id.'">Enrol</li>';
    }
$permission=
'<ul class="row permissions w-100 justify-content-center my-2">
<li class="col"> <a href="/'.$entity.'/edit?id='.$id.'">Amend</a></li>
<li class="col"> <a href="/'.$entity.'/archive?id='.$id.'">Archive</a></li>
<li class="col"><a href="/'.$entity.'/delete?id='.$id.'">Delete</a></li>
'.$enrolLink.'
</ul>';
}
elseif($_SESSION['usertype']=='teacher' && $route=='announcement'){
$permission=
'<ul class="row permissions w-100 justify-content-center my-2">
<li class="col"> <a href="/'.$entity.'/edit?id='.$id.'">Amend</a></li>
<li class="col"><a href="/'.$entity.'/delete?id='.$id.'">Delete</a></li>
</ul>';
}
elseif($_SESSION['usertype']=='student' && $route=='student'){
    $permission='<ul class="row permissions w-100 justify-content-center my-2">
    <li class="col"> <a href="/'.$entity.'/edit?id='.$id.'">Amend</a></li>
    </ul>';
}
else{
$permission='';
}


echo  $permission;

//
?>