@extends('admin.layouts.layout')

@section('title')

  تحديث العضو {{ $user->name }}
@stop


@section('styling')


@stop

@section('content')





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تحديث العضو {{ $user->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <?php

                $button = 'تحديث';

              ?>
              
            {!! Form::model($user, [
                    'route' => ['admin-users-panel.update', $user->id ],
                    'class'=> 'form-horizontal',
                    'role' => 'form',
                    'method' => 'PATCH',
                    
                ]) !!}
            

            @include( 'admin.partials.formUser', compact('button'))



            {!! Form::close() !!}

            @unless( $user->id == 1 )

              {!! link_to_route('admin-users-panel.destroy', 'حذف العضو', [ $user->id ], ['class' => 'btn btn-danger btn-circle'])  !!}
              
            @endunless

            

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->




        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop

@section('usefullJS')



@stop

@section('scripting')


<script>
$('div.alert').delay(2000).fadeOut(3500);
</script>



<script>
  
  $('.select2R').select2({
    dir: 'rtl'
  });
</script>



@stop