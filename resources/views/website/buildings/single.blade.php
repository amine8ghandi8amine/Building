@extends('layouts.app')
@section('title')
{{ $b4->name }}
@stop
@section('content')


{{-- DISPLAY ONE --}}


<div class="container">
  <div class="row">

  

  <div class="col-md-3">

    @include('partials.asideWebsite')

  </div>

    <div class="card col-md-9">
      <div class="container-fliud">
        <div class="wrapper row">
          
          <div class="details col-md-6">
            <h3 class="product-title">{{ $b4->name }}</h3>
            <div class="rating">
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="review-no">41 reviews</span>
            </div>

            <h4 class="price">الثمن: <span>{{ $b4->price }} درهم</span></h4>
            <h4 class="price">مكان العقار: <span>{{ buildingPlace( $b4->codePostalMaroc ) }}</span></h4>
            <h4 class="price">نوع العقار: <span>{{ buildingRent( $b4->rent ) }}</span></h4>
            <h4 class="price">مساحة العقار: <span>{{ $b4->square }} متر مربع</span></h4>
            <h4 class="price">عدد الغرف: <span>{{ $b4->roomNumber }} غرفة</span></h4>
            <h4 class="price">انوع الخدمة: <span>{{ buildingType( $b4->type ) }}</span></h4>
            <h4 class="price">كلمات دلالية: <span>{{ $b4->tags }}</span></h4>
            <h4 class="price">تاريخ النشر: <span>{{ $b4->created_at }}</span></h4>
            <h4 class="price">تاريخ التحديث: <span>{{ $b4->updated_at }}</span></h4>
            <h4 class="price">إسم الناشر: <span>{{ getUser( $b4->user_id )  }}</span></h4>
            <p class="product-description">
              <h4> عن العقار </h4>
              {{ $b4->largDisc }}
            </p>

            <div id="map" style="width:100%;height:500px"></div>
            
            
            
            <div class="action">
              <button class="add-to-cart btn btn-default" type="button">add to cart</button>
              <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
            </div>
          </div>
          <div class="preview col-md-6">
            
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img src="{{ ifImg( $b4->img ) }}" /></div>
              <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
              <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
              <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
              <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
              <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ ifImg( $b4->img ) }}" /></a></li>
              <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
              <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
              <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
              <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
            </ul>
            
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12">
      
      @if( count($same) > 0 )

        @foreach($same as $builItem)

        <div class="col-sm-4">

          <div class="productbox relative">
            <div class="producttitle text-center">{{ $builItem->name }}</div>
            <img src="{{ ifImg( $builItem->img ) }}" class="img-responsive">
            <div class="overflow-yScroll">
              <p class="text-center overflow-yScroll maxXL">{{ $builItem->smallDisc }}</p>
              <p class="text-center">الثمن : {{ $builItem->price }}</p>
            </div>


            <div class="absolute bottom0 right0 left0">
                          <hr />
              <a href="{{ route('buildings.show', $builItem->id ) }}" class="btn btn-sm btn-block">التفاصيل</a>
            </div>
          </div>
        </div>


      @endforeach

        {{ $same->links() }}

      @endif
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


    <script>
  function myMap() {
    var myCenter = new google.maps.LatLng({{ $b4->lat }},{{ $b4->lang }});
    var mapCanvas = document.getElementById("map");
    var mapOptions = {center: myCenter, zoom: 5};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({position:myCenter});
    marker.setMap(map);
  }
  </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfe6lnGvpoO0itVk2Doz_9xPweZ5JnUaI&callback=myMap"></script>

@stop
