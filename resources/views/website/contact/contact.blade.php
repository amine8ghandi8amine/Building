@extends('layouts.app')
@section('title')
راسلنا
@stop


@section('content')
<div id="map" style="width:100%;height:500px"></div>

<section id="contact">


			<div class="section-content">
				<h1 class="section-header">راسلنا <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> يا صديقي</span></h1>
				<h3>رسالتك تتبت وجودك .</h3>
			</div>
			<div class="contact-section">

			<div class="container bottomBorder">
				<div class="row">
					<div class="col-md-6 leftBorder">
			  				<div class="col-xs-6">العنوان</div>
					    	<p class="col-xs-6">
					    	{{ getSetting('adress') }}
				  			</p>
					</div>

					<div class="col-md-6">
			  				<div class="col-xs-6">رقم الهاتف</div>
					    	<p class="col-xs-6">
					    	{{ getSetting('mobile-number') }}
				  			</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 leftBorder">
			  				<div class="col-xs-6">البريد الإلكتروني</div>
					    	<p class="col-xs-6">
					    	{{ getSetting('email') }}
				  			</p>
					</div>

					<div class="col-md-6">
			  				<div class="col-xs-6">إسم المدير</div>
					    	<p class="col-xs-6">
					    	{{ getSetting('director-name') }}
				  			</p>
					</div>
				</div>

				<div class="row">

					<div class="col-xs-12 social text-center">
					    	
					    		<ul>
					                <li><a href="{{ 'https://facebook.com/'. getSetting('facebook') }}" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
					                <li><a href="{{ 'https://twitter.com/'. getSetting('twitter') }}" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
					                <li><a href="{{ 'https://plus.google.com/'. getSetting('google-plus') }}" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
					                <li><a href="{{ 'https://youtube.com/'. getSetting('youtube') }}" target="_blank"><i class="fa fa-lg fa-youtube"></i></a></li>
					                <li><a href="{{ 'https://github.com/'. getSetting('github') }}" target="_blank"><i class="fa fa-lg fa-github"></i></a></li>
					                <li><a href="{{ 'mailto:'. getSetting('email') }}" target="_blank"><i class="fa fa-lg fa-envelope"></i></a></li>
					                <li><a href="{{ 'https://paypal.com/'. getSetting('paypal') }}" target="_blank"><i class="fa fa-lg fa-paypal"></i></a></li>
					                <!--
					                <li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
					                
					                <li><a href="#"><i class="fa fa-lg fa-pinterest"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-linkedin"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-flickr"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-instagram"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-vimeo-square"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-stack-overflow"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-dropbox"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-tumblr"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-dribbble"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-skype"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-stack-exchange"></i></a></li>
					                
					                <li><a href="#"><i class="fa fa-lg fa-xing"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-rss"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-foursquare"></i></a></li>
					                <li><a href="#"><i class="fa fa-lg fa-youtube-play"></i></a></li>
					                -->
					            </ul>
					</div>
				</div>
			</div>
			

			<div class="container">
					<div class="col-md-6 form-line">

					{!! Form::open([
		                'route' => 'contact.store',
		                'class'=> 'form-horizontal',
		                'role' => 'form',
		                'method' => 'post',
		            ]) !!}


		            	{{ csrf_field() }}


		            	{!! Form::hidden('from', 'website' ) !!}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						    

						    
						    {!! Form::label('name', 'الإسم', ['id' => 'name','class' => 'col-xs-12 control-label' ]) !!}
						    <div class="col-xs-12">


						        {!! Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => 'الإسم', 'required' => true] ) !!}

						        @if ($errors->has('name'))
						            <span class="help-block">
						                <strong>{{ $errors->first('name') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>


				  		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						    

						    
						    {!! Form::label('email', 'البريد الإلكتروني', ['id' => 'email','class' => 'col-xs-12 control-label' ]) !!}
						    <div class="col-xs-12">


						        {!! Form::email('email', old('email') , ['class' => 'form-control' , 'placeholder' => ' البريد الإلكتروني', 'required' => true] ) !!}

						        @if ($errors->has('email'))
						            <span class="help-block">
						                <strong>{{ $errors->first('email') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>


						<div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
						    

						    
						    {!! Form::label('phoneNumber', ' رقم الهاتف', ['id' => 'phoneNumber','class' => 'col-xs-12 control-label' ]) !!}
						    <div class="col-xs-12">


						        {!! Form::tel('phoneNumber', old('phoneNumber') , ['class' => 'form-control', 'placeholder' => ' رقم الهاتف', 'required' => true] ) !!}

						        @if ($errors->has('phoneNumber'))
						            <span class="help-block">
						                <strong>{{ $errors->first('phoneNumber') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>

			  		</div>


			  		<div class="col-md-6">


					<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
					    

					    
					    {!! Form::label('rent', 'طريقة بيع العقار', ['id' => 'type','class' => 'col-xs-12 control-label']) !!}
					    <div class="col-xs-12">


					        {!! Form::select('type', contactType( -1 ) , old('type') , ['class' => 'form-control select2R', 'required' => true] ) !!}

					        @if ($errors->has('type'))
					            <span class="help-block">
					                <strong>{{ $errors->first('type') }}</strong>
					            </span>
					        @endif
					    </div>
					</div>

					<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
						    

						    
						    {!! Form::label('subject', ' الموضوع', ['id' => 'subject','class' => 'col-xs-12 control-label' ]) !!}
						    <div class="col-xs-12">


						        {!! Form::text('subject', old('subject') , ['class' => 'form-control', 'placeholder' => ' الموضوع', 'required' => true] ) !!}

						        @if ($errors->has('subject'))
						            <span class="help-block">
						                <strong>{{ $errors->first('subject') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>

					<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
						    

						    
						    {!! Form::label('message', ' رقم الهاتف', ['id' => 'message','class' => 'col-xs-12 control-label' ]) !!}
						    <div class="col-xs-12">


						        {!! Form::textarea('message', old('message') , ['class' => 'form-control', 'placeholder' => ' رقم الهاتف', 'required' => true] ) !!}

						        @if ($errors->has('message'))
						            <span class="help-block">
						                <strong>{{ $errors->first('message') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>

			  			<div>



			  				<button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  أرسل <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			  			</div>


			  		{!! Form::close() !!}
			  			
					</div>
			</div>
			

			<div class="clearfix"></div>
</section>


@stop
@section('scripting')



    <script>
  function myMap() {
    var myCenter = new google.maps.LatLng({{ getSetting( 'lat' ) }},{{ getSetting( 'lng' ) }});
    var mapCanvas = document.getElementById("map");
    var mapOptions = {center: myCenter, zoom: 5};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({position:myCenter});
    marker.setMap(map);
  }
  </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfe6lnGvpoO0itVk2Doz_9xPweZ5JnUaI&callback=myMap"></script>


<script>
  
  $('.select2R').select2({
    dir: 'rtl'
  });
</script>


@stop
