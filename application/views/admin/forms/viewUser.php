<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Contact</th>
                      <th>Registred Date</th>
                      <th>Source</th>
                      <th>Details</th>
                      </tr>
                    <tbody>
                    <?php 
                        foreach($user as $users){
                            echo '
                        <tr>
                        <td>'.$users->user_id.'</td>
                        <td>'.$users->user_name.'</td>
                        <td>'.$users->user_email.'</td>
                        <td>'.$users->user_password.'</td>
                        <td>'.$users->user_contact.'</td>
                        <td>'.$users->user_registerdate.'</td>
                        <td>'.$users->user_source.'</td>
                        <td><a href="#" class="btn btn-success">View Details</a></td>
                      </tr>';
                        }
                    ?>
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
        </div>
    </div>
</section>
