@extends('layouts.app')
@section('title')
مرحبا بك
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
          
          @include('website.buildings.breadCrumb')
          @include('website.buildings.shareFile')



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
