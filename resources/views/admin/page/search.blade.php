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
                <form action="{{ route('admin.search.post') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">

                      <input type="checkbox" value="acv" name="check[]" class="company">
                      <label>acv</label>

                      <input type="checkbox" value="agl" name="check[]" class="company">
                      <label>agl</label>

                      <input type="checkbox" value="test" name="check[]" class="company">
                      <label>test</label>

                  </div>
                   <!-- checkbox -->
                  <div class="form-group">

                      <input type="checkbox" value="1" name="r1[]" class="sex">
                      <label>male</label>

                      <input type="checkbox" value="0" name="r1[]" class="sex">
                      <label>famale</label>

                  </div>
                  <!-- radio -->
                  <div class="form-group">

                   <div class="box-tools">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail" name="search_mail">
                      <button type="submit">Search</button>
                    </div>
                  </div>

                  </div>

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