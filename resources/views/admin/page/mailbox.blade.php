  @extends('admin.layout')
  @section('content')
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
        <div class="col-md-12">
          <form action="{{ route('admin.mail.postmail') }}" method="POST">
            {{ csrf_field() }}
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Compose Send Message</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @if($errors->has('select_to'))
                  <i>{{ $errors->first('select_to') }}</i>
                @endif
                <div class="form-group {{ $errors->has('select_to')?'has-error':'' }}">
                  <select class="form-control select2" multiple="multiple" data-placeholder="To:" style="width: 100%;" id="select_to[]" name="select_to[]">
                  @foreach($user as $us)
                    <option value="{{ $us['email'] }}">{{ $us['email'] }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control select2" multiple="multiple" data-placeholder="Ccc:" style="width: 100%;" id="select_ccc[]" name="select_ccc[]">
                  @foreach($user as $us)
                    <option value="{{ $us['email'] }}">{{ $us['email'] }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control select2" multiple="multiple" data-placeholder="Bcc:" style="width: 100%;" id="select_bcc[]" name="select_bcc[]">
                  @foreach($user as $us)
                    <option value="{{ $us['email'] }}">{{ $us['email'] }}</option>
                  @endforeach
                  </select>
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
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment" id="attachment">
                  </div>
                  <p class="help-block">Max. 32MB</p>
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