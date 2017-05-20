@extends('layouts.app')
@section('title')
إضافة عقار
@stop
@section('content')


{{-- DISPLAY --}}


<div class="container-fluid">
    <div class="row">

    
      <div class="col-md-3">
          @include('partials.asideWebsite')
      
      </div>

      <div class="profile-content">
      <div class="col-md-9">
          
          

              <?php  $button = 'تسجيل';  ?>

              <?php  $from = 'website'; ?>


            {!! Form::open([
                'files' => true,
                'route' => 'buildings.store',
                'class'=> 'form-horizontal',
                'role' => 'form',
                'method' => 'post',
            ]) !!}




            @include('admin.partials.formBuilding', compact('button', 'from'))



            {!! Form::close() !!}

      </div>
      </div>

    </div>


</div>


@stop

@section('scripting')

  <script>
    
    $('.select2R').select2({
      dir: 'rtl'
    });
  </script>

@stop
