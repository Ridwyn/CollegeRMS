<div class="row text-center justify-content-center">
          <div class="col-4 p-3 tab">My attendance</div>
        </div>
        <table class="table table-hover my-3">
          <thead>
            <tr>
              <th scope="col">Module</th>
              <th scope="col">Percentage</th>
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
                foreach($attendance as $attendance ){
                    echo '<td>'.$attendance['percentage'] .'</td>';
                }
                ?>
            </tr>
          </tbody>
        </table>
</div>