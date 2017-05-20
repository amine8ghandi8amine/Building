@extends('admin.layouts.layout')

@section('title')

  كافة الرسائل
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

        @if($wichF == 'mailBox')

          @include('admin.partials.mailBox')

        @elseif($wichF == 'replyBox')

          @include('admin.partials.replyBox')

        @elseif($wichF == 'draftBox')

          @include('admin.partials.draftBox')

        @elseif($wichF == 'trashBox')

          @include('admin.partials.trashBox')

        @endif

        

          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop

@section('usefullJSTwo')

  {!! Html::script('dashboard/plugins/iCheck/icheck.min.js') !!}

@stop

@section('scripting')

<!-- Page Script -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>

@stop


@section('scripting')



@stop

