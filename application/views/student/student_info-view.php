  <div class="container ">
    <div class="row">
      <div class = "col-lg-10 col-md-offset-1 ">
        </br>
        <div class="panel panel-default">
            <div class="panel-heading"><h1 style="text-align: center; text-decoration: underline;">Στοιχεία Φοιτητή</h1></div>
            <div class="panel-body" >
              <div class="table-responsive  scroller">
                <?php
                    echo '<table class="table" border="1">
                    <tbody>
                        <tr>
                            <td style="text-align:left;">Ονομα:</td><td>'. $st_inf=empty($student_info['first_name']) ? '' : $student_info['first_name'].'</td></tr>'.
                       '<tr><td style="text-align:left;">Επώνυμο:</td><td>'. $st_inf1=empty($student_info['last_name']) ? '' : $student_info['last_name'].'</td></tr>'.
                       '<tr><td style="text-align:left;">Username:</td><td>'. $st_inf2=empty($student_info['uid']) ? '' : $student_info['uid'].'</td></tr>'.
                       '<tr><td style="text-align:left;">Email:</td><td>'. $st_inf2=empty($student_info['email_address']) ? '' : $student_info['email_address'].'</td></tr>'.
                       '</tbody></table>';
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
