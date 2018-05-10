  @extends('admin.layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search mail
        <!-- <small>13 new messages</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">search</h3>

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">iCheck - Checkbox &amp; Radio Inputs</h3>
              </div>
              <div class="box-body">
                <!-- checkbox -->
                <form action="{{ route('admin.hospital.postCreate') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      @if($errors->has('name'))
                        <i>{{ $errors->first('name') }}</i>
                      @endif
                      <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}" name="name" placeholder="Enter email">
                  </div>

                  <div class="form-group">

                   <div class="checkbox">
                      <label>
                        <input type="checkbox" value="1" name="is_deleted"> Is active
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                  @if(Session::has('success'))
                    <strong>{{ Session::get('success') }}</strong>
                  @endif
                </form>

            </div>
          </div>
            <!-- /.box-body -->
              {{-- <div class="box-tools">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div> --}}
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection