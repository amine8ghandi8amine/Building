@extends('admin.layouts.layout')

@section('title')

  كتابة الرسالة
@stop
@section('usefullStyleSheetBeforeSkin')

  <!-- fullCalendar 2.2.5-->
  {!! Html::style('dashboard/plugins/fullcalendar/fullcalendar.min.css') !!}

  {{ HTML::style('dashboard/plugins/fullcalendar/fullcalendar.print.css', ['media' => 'print']) }}


@stop

@section('usefullStyleSheet')

  {!! Html::style('dashboard/dist/css/skins/_all-skins.min.css') !!}
  <!-- iCheck -->
  {!! Html::style('dashboard/plugins/iCheck/flat/blue.css') !!}

@stop



@section('styling')



@stop

@section('content')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          @include('admin.partials.asideBox')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
          	{!! Form::open([
                'files' => true,
                'route' => 'reply.store',
                'class'=> 'form-horizontal',
                'role' => 'form',
                'method' => 'post',
            ]) !!}

            {{ csrf_field() }}

            {!! Form::hidden('from', 'dashboard' ) !!}
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>

              

              <h4 class="box-title">
              	
				@if( $mailWork )

					{!! Form::email('email') !!}

				@else

					{{ $contact->email }}

					{!! Form::hidden('contact_id', $contact->id ) !!}

				@endif

              </h4>
            </div>

	              <!-- tools box -->
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	                  <i class="fa fa-minus"></i></button>
	                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
	                  <i class="fa fa-times"></i></button>
	              </div>
	              <!-- /. tools -->

	              {!! Form::textarea('subject', null ) !!}

	            <!-- /.box-header -->
	            <div class="box-body pad">

	            		{!! Form::textarea('message', null, ['id' => 'editor1' , 'rows' => '10', 'cols' => '80'] ) !!}

	                    
	            </div>
	          <!-- /.box -->
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  {!! Form::file('attachement') !!}
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>

          {!! Form::close() !!}
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
<!-- ./wrapper -->
@stop

@section('usefullJSTwo')

  {!! Html::script('dashboard/plugins/iCheck/icheck.min.js') !!}

  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

@stop

@section('scripting')

<!-- Page Script -->
<script>
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>
@stop
</body>
</html>
