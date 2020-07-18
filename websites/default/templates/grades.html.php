<div class="row text-center justify-content-center">
          <div class="col-4 p-3 tab">My Grades</div>
        </div>
        <table class="table table-hover my-3">
          <thead>
            <tr>
              <th scope="col">Module</th>
              <th scope="col">Grade</th>
            </tr>
          </thead>
          <tbody>   
          <tr>         
                <?php
                    foreach($modules as $module){
                        echo '<th scope="row">'.$module['name'].'</th>';
                    }
                ?>
            <td>
            <?php
                foreach($grades as $grade ){
                    echo '<td>'.$grade['grade'] .'</td>';
                }
                ?>
            </tr>
          </tbody>
        </table>
</div>