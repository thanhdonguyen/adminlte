  @extends('admin.layout')
  @section('content')
  @include('admin.ajax.addmail')
  @include('admin.ajax.updatemail')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
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
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Email list</h3>
              <button type="button" style="width: 25%" class="btn btn-block btn-primary" id="btn_addmail">Add new email</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="checkAll"></th>
                  <th>Email</th>
                  <th>Company</th>
                </tr>
                </thead>
                <tbody id="customers">
                  @foreach( $customers as $cus )
                <tr>
                  <td><input type="checkbox" class='chkbx' value="{{ $cus->email }}"></td>
                  <td><a id="update-mail" href="#update-mail">{{ $cus->email }}</a>
                  </td>
                  <td><a id="update-mail" href="#update-mail">{{ $cus->company }}</a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th>Email</th>
                  <th>Company</th>
                </tr>
                </tfoot>
              </table>
              <div id="log"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
          <form action="{{ route('admin.mail.postmail') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Compose Send Message</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- @if($errors->has('select_to'))
                  <i>{{ $errors->first('select_to') }}</i>
                @endif
                <div class="form-group {{ $errors->has('select_to')?'has-error':'' }}">
                  <select class="form-control select2" multiple="multiple" data-placeholder="To:" style="width: 100%;" id="select_to[]" name="select_to[]">
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control select2" multiple="multiple" data-placeholder="Ccc:" style="width: 100%;" id="select_ccc[]" name="select_ccc[]">
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control select2" multiple="multiple" data-placeholder="Bcc:" style="width: 100%;" id="select_bcc[]" name="select_bcc[]">
                  </select>
                </div> -->
                @if($errors->has('email_to'))
                  <i>{{ $errors->first('email_to') }}</i>
                @endif
                <div class="form-group {{ $errors->has('email_to')?'has-error':'' }}">
                  <input id="email_to" class="form-control" placeholder="To :" name="email_to" value="" />
                </div>
                <!-- <div class="form-group {{ $errors->has('mail_to')?'has-error':'' }}">
                  <input id="mail_to" class="form-control" placeholder="To :" name="mail_to[]" value="" />
                </div> -->
                <!-- <div class="form-group">
                  <div id="email_tos"></div>
                  <input type="hidden" name="customer_ids" id="customer_ids">
                </div> -->
                 <!-- <div class="form-group">
                  <input id="mail_bcc" class="form-control" placeholder="Bcc :" name="mail_bcc[]"/>
                </div> -->
                <div class="form-group">
                  <input id="title" name="title" class="form-control" placeholder="Title:">
                </div>
                <div class="form-group">
                  <input id="subject" name="subject" class="form-control" placeholder="Subject:">
                </div>
                @if($errors->has('message'))
                  <i>{{ $errors->first('message') }}</i>
                @endif
                <div class="form-group {{ $errors->has('message')?'has-error':'' }}">
                      <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                        
                      </textarea>
                </div>
                @if($errors->has('attachment'))
                  <i>{{ $errors->first('attachment') }}</i>
                @endif
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment[]" id="attachment">
                  </div>
                  <p class="help-block">Max. 2MB</p>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
              </div>
              <!-- /.box-footer -->
            </div>
          </form>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection