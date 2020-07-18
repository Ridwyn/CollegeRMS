
<div class="row my-4 px-5">
            <h1><?= $course['name'] ?? ''?></h1>

            <table class="table table-hover my-3">
              <thead>
                <tr>
                  <th scope="col">Tutor</th>
                  <th scope="col">Number of Modules</th>
                  <th scope="col">duration</th>
                  <th scope="col">Module List</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $teacher['Fname']?? ''?></td>
                  <td><?= count($modules)?? ''?></td>
                  <td><?= $course['course_duration'] ?? ''?></td>
                  <td>
                    <?php
                      foreach($modules as $module){
                      echo '             
                            <li class="list-group-item">
                             <a href="/module?id='.$module['module_id'].'"> '.$module['name'].'</a>
                            </li>';
                        }
                    ?>
                    </br>
                    <?php echo'<a href="/module/edit?course_id='.$course['course_id'].'" class="btn btn-primary">Add Module</a>'?>
                </td>
                </tr>
              </tbody>
            </table>
 </div>

<?php require 'permission.html.php';	?>