<div class="modal fade" id="EditMailModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
                  <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add email</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frm-editmailmodal" method="POST" action="{{ route('admin.mail.postEditMail') }}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" id="id">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sex</label>
                  <div class="col-sm-10">
                    <label>
                      <input type="radio" name="sex" id="sex" value="0" class="minimal"> <span>Male</span>
                    </label>
                    <label>
                      <input type="radio" name="sex" id="sex" value="1" class="minimal"> <span>Famale</span>
                    </label>
                  </div>
                </div>
                <div class="form-group" id="email-error1">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    <i id="email-error" style="color: red"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Company</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="button" id="btn_delete_email" class="btn btn-info" style="background-color: #dd4b39">Delete</button>
                <button type="submit" id="btn_editemail" class="btn btn-info pull-right" style="background-color: #3c8dbc">Save</button>
                <button style="margin-right: 20px" type="button" class="btn btn-default pull-right" id="close-editEmail" data-dismiss="modal">Close</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
  </div>
</div>