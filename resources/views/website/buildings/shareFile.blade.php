

@if( count($b4) > 0 )

	@foreach($b4 as $builItem)






    

	<div class="col-sm-4 col-md-3">

          <div class="productbox relative effectS">
            <div class="producttitle text-center">{{ $builItem->name }}</div>
            <img src="{{ ifImg( $builItem->img ) }}" class="img-responsive">
            <div class="overflow-yScroll">
            <p class="text-center overflow-yScroll maxXL">{{ $builItem->smallDisc }}</p>
            <p class="text-center">المساحة : {{ $builItem->square }}  </p>
            <p class="text-center">الخدمة : {{ buildingRent( $builItem->rent ) }}</p>
            <p class="text-center">النوع : {{ buildingType( $builItem->type ) }}</p>
            <p class="text-center">الثمن : {{ $builItem->price }}</p>
          </div>


            <div class="absolute bottom0 right0 left0">
            	            <hr />
            	<a href="{{ route('buildings.show', $builItem->id ) }}" class="btn btn-sm btn-block">التفاصيل</a>
            	@if( Route::currentRouteNamed( 'user.my-buildings-in-wait' ) )

					<a href="{{ route('user.update-buildings-in-wait', $builItem->id ) }}" class="btn btn-sm btn-block"> تحديث</a>

            	@endif
            </div>
          </div>
    </div>


	@endforeach

	{{ $b4->links() }}

@else

	<p class="alert alert-danger">
		لا يوجد عقار
	</p>

@endif