<div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        @if( Auth::check() )
        <div class="profile-userpic">
          <img src="{{ 

                        route('identicon::main', [
                            getUserEmail( Auth::id() )
                        ])

           }}" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            {{ getUser( Auth::id() ) }}
          </div>

          <div class="profile-usertitle-job">
            {{ getUserEmail( Auth::id() ) }}
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        
        <div class="profile-userbuttons">
          {{--<button type="button" class="btn btn-danger btn-sm">Follow</button>--}}
          <a href="{{ route( 'user.my-page', Auth::id() ) }}" class="btn btn-success btn-sm"> صفحتي</a>
        </div>
        @else

         <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            زائر
          </div>

        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        
        <div class="profile-userbuttons">
          <a href="" class="btn btn-success btn-sm"> تسجيل</a>
        </div>


        @endif
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">

          @if( Auth::check() )

          <ul class="nav">

            <li class="{{ activeClass('buildings.add') }}"><a href="{{ route( 'buildings.add' ) }}"> إضافة عقار</a></li>

            <li class="{{ activeClass('user.my-buildings', Auth::id() ) }}"><a href="{{ route( 'user.my-buildings', Auth::id() ) }}"> عقاراتي المفعلة</a></li>

            <li class="{{ activeClass('user.my-buildings-in-wait', Auth::id() ) }}"><a href="{{ route( 'user.my-buildings-in-wait', Auth::id() ) }}"> عقاراتي في الإنتضار</a></li>

            <li class="{{ activeClass('user.my-settings', Auth::id() ) }}"><a href="{{ route( 'user.my-settings', Auth::id() ) }}"> تعديل المعلومات الشخصية الشخصية</a></li>


          </ul>

          @endif

          {!! Form::open(['route' => 'search']) !!}

          {{ csrf_field() }}

            <ul class="nav">
            
            
              <li class="active">
                {!! Form::number('priceFrom', old('priceFrom'), ['class' => 'form-control', 'placeholder' => 'ثمن: إبتداءا من']) !!}
                {!! Form::number('priceTo', old('priceTo'), ['class' => 'form-control', 'placeholder' => 'ثمن: أقل من']) !!}
              </li>

              <li class="active">

              
              {!! Form::select('rent', buildingRent(-1) , old('rent') , ['class' => 'form-control select2R', 'placeholder' =>  'نوع العقار' ] ) !!}
              </li>

              <li class="active">
                {!! Form::number('roomNumberFrom', old('price'), ['class' => 'form-control', 'placeholder' => 'رقم الغرف']) !!}
                {!! Form::number('roomNumberTo', old('price'), ['class' => 'form-control', 'placeholder' => 'رقم الغرف']) !!}
              </li>

              <li class="active">
              {!! Form::number('squareFrom', old('squareFrom'), ['class' => 'form-control', 'placeholder' => 'مساحة: إبتداءا من']) !!}
              {!! Form::number('squareTo', old('squareTo'), ['class' => 'form-control', 'placeholder' => 'مساحة: أقل مساحة']) !!}
              </li>

              <li class="active">
              {!! Form::select('type', buildingType( -1 ) , old('type') , ['class' => 'form-control select2R', 'placeholder' =>  'نوع بيع العقار'] ) !!}
              </li>

              <li class="active">
              {!! Form::select('codePostalMaroc', buildingPlace( -1 ) , old('codePostalMaroc') , ['class' => 'form-control select2R' , 'placeholder' =>  'مكان العقار'] ) !!}
              </li>

              <li class="active">
                {!! Form::number('langFrom', old('langFrom'), ['class' => 'form-control', 'placeholder' => 'خط الطول: إبتداءا من']) !!}
                {!! Form::number('langTo', old('langTo'), ['class' => 'form-control', 'placeholder' => 'خط الطول: أقل إحداثية']) !!}
              </li>
              <li class="active">
                {!! Form::number('latFrom', old('latFrom'), ['class' => 'form-control', 'placeholder' => 'خط العرض: إبتداءا من']) !!}
                {!! Form::number('latTo', old('latTo'), ['class' => 'form-control', 'placeholder' => 'خط العرض: أقل إحداثية']) !!}
              </li>
              <li>
              {!! Form::submit('إبحث' , ['class' => 'btn btn-primary btn-block', 'name' => 'ok']) !!}
              </li>


          </ul>

          {!! Form::close() !!}

          <ul class="nav">

            @foreach( buildingRent(-1) as $brKey => $br )

             <li class="{{ activeClass('forRent.show', $brKey) }}">
                  <a href="{{ route( 'forRent.show', $brKey ) }}">
                  
                  {{ $br }} </a>

                </li>


           @endforeach

          </ul>
        <hr />
         <ul class="nav">

         @foreach( buildingType(-1) as $btKey => $bt )

           <li class="{{ activeClass('forType.show', $btKey) }}">
                <a href="{{ route( 'forType.show', $btKey ) }}">
                
                {{ $bt }}  </a>

              </li>


         @endforeach

          </ul>
        </div>
        <!-- END MENU -->
      </div>