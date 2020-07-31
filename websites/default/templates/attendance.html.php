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
           <?php
                foreach ($modules_with_Attendance as $key => $module) {
                  echo'<tr>
                  <td>'.$module['name'].'</td>
                  <td>'.$module['attendance'].'%</td>
                  </tr>
                  ';
                }
           ?>
          </tbody>
        </table>
</div>