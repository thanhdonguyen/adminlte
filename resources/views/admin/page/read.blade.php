@extends('admin.layout')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Read Mail
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
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{ $read->subject }}</h3>
                <h5>To: {{ $read->email }}
                  <span class="mailbox-read-time pull-right">{!! \Carbon\Carbon::createFromTimeStamp(strtotime($read->created_at))->diffForHumans() !!}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {{ $read->message }}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            @if(!empty($read->attachment))
            <div class="box-footer">
              <h4>Attachment</h4>
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="{{ url($read->attachment) }}" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="{{ url($read->attachment) }}" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            @endif
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <a href="{{ route('admin.mail.archive') }}" class="btn btn-default"><i class="fa fa-reply"></i> Back</a>
              </div>
              <a href="{{ route('admin.mail.getDelete',$read->id) }}" class="btn btn-default" onclick="confirmDelete()"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection