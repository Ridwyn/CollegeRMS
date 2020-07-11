
<div class="row my-4 px-5">
            <h1><?= $course['name'] ?? ''?></h1>

            <table class="table table-hover my-3">
              <thead>
                <tr>
                  <!-- <th scope="col">Title</th> -->
                  <!-- <th scope="col">Contents</th> -->
                  <th scope="col">Tutor</th>
                  <th scope="col">Total Modules</th>
                  <th scope="col">duration</th>
                  <th scope="col">Module List</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $teacher['Fname']?? ''?></td>
                  <td><?= $course['no_of_modules'] ?? ''?></td>
                  <td><?= $course['course_duration'] ?? ''?></td>
                  <td>
                    <?php
                      foreach($modules as $module){
                      echo '             
                            <li class="list-group-item">
                              '.$module['name'].'
                              <span></span>
                            </li>';
                        }
                    ?>
                </td>
                </tr>
              </tbody>
            </table>
 </div>

<?php require 'permission.html.php';	?>