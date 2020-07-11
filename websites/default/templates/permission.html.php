<?php



$route=trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
$entity=explode('/',$route)[0];
$id=$_GET['id'];

// <li class="col"> <a href="/'.$entity.'/edit">Create </a> </li>
$permission=
'<ul class="row permissions w-100 justify-content-center my-2">
<li class="col"> <a href="/'.$entity.'/edit?id='.$id.'">Amend</a></li>
<li class="col"> <a href="/'.$entity.'/archive?id='.$id.'">Archive</a></li>
<li class="col"><a href="/'.$entity.'/delete?id='.$id.'">Delete</a></li>
<li class="col">Assign</li>
</ul>';






echo  $permission;
?>