@extends('layouts.app')
@section('title')
مرحبا بك
@stop


@section('content')


{{-- DISPLAY --}}


<div class="banner relative text-center">
    <div class="layer">
      <div class="container">
        <div class="banner-info">


        <h1 class="textShadow">موقع يتيح لك البيع السريع لعقاراتك و النشر أيضا</h1>



    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-usd" aria-hidden="true"></i></a>
                <p  class="textShadow">الثمن</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                <p  class="textShadow">النوع</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                <p  class="textShadow">رقم الغرف</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-arrows-h" aria-hidden="true"></i></a>
                <p  class="textShadow">المساحة</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-home" aria-hidden="true"></i></a>
                <p  class="textShadow">نوع البيع</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                <p  class="textShadow">المكان</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-globe" aria-hidden="true"></i></a>
                <p  class="textShadow">خط الطول</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-map" aria-hidden="true"></i></a>
                <p  class="textShadow">خط العرض</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-search" aria-hidden="true"></i></a>
                <p  class="textShadow">إبدأ البحث</p>
            </div>

        </div>
    </div>
                {!! Form::open(['route' => 'search', 'role' => 'form', 'class' => 'greenColorParent']) !!}

                              {{ csrf_field() }}
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> الثمن</h3>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">ثمن: إبتداءا من</label>
                                        {!! Form::number('priceFrom', old('priceFrom'), ['class' => 'form-control', 'placeholder' => 'ثمن: إبتداءا من']) !!}

                                        
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">ثمن: أقل من</label>
                                        {!! Form::number('priceTo', old('priceTo'), ['class' => 'form-control', 'placeholder' => 'ثمن: أقل من']) !!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> النوع</h3>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label">نوع العقار</label>
                                        {!! Form::select('rent', buildingRent(-1) , old('rent') , ['class' => 'form-control select2R', 'placeholder' =>  'نوع العقار' ] ) !!}

                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> رقم الغرف</h3>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">عدد الغرف: من</label>
                                        {!! Form::number('roomNumberFrom', old('price'), ['class' => 'form-control', 'placeholder' => 'رقم الغرف']) !!}
                                        

                                        
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">عدد الغرف: إلى</label>
                                        {!! Form::number('roomNumberTo', old('price'), ['class' => 'form-control', 'placeholder' => 'رقم الغرف']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-4">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> المساحة</h3>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">مساحة: إبتداءا من</label>
                                        
                                        {!! Form::number('squareFrom', old('squareFrom'), ['class' => 'form-control', 'placeholder' => 'مساحة: إبتداءا من']) !!}
                                      
                                        

                                        
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">مساحة: أقل مساحة</label>
                                        {!! Form::number('squareTo', old('squareTo'), ['class' => 'form-control', 'placeholder' => 'مساحة: أقل مساحة']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-5">
                        <div class="col-xs-12">

                            <div class="col-md-12">
                                <h3> نوع البيع</h3>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label">نوع بيع العقار</label>
                                        
                                        {!! Form::select('type', buildingType( -1 ) , old('type') , ['class' => 'form-control select2R', 'placeholder' =>  'نوع بيع العقار'] ) !!}
                                      
                                        

                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-6">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> المكان</h3>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label">مكان العقار</label>
                                        
                                        {!! Form::select('codePostalMaroc', buildingPlace( -1 ) , old('codePostalMaroc') , ['class' => 'form-control select2R' , 'placeholder' =>  'مكان العقار'] ) !!}
                                      
                                        

                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-7">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> خط الطول</h3>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">خط الطول: إبتداءا من</label>
                                        
                                        {!! Form::number('langFrom', old('langFrom'), ['class' => 'form-control', 'placeholder' => 'خط الطول: إبتداءا من']) !!}
                                        
                                      
                                        

                                        
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">خط الطول: أقل إحداثية</label>
                                        
                                        {!! Form::number('langTo', old('langTo'), ['class' => 'form-control', 'placeholder' => 'خط الطول: أقل إحداثية']) !!}
                                      
                                        

                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-8">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> خط العرض</h3>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">خط الطول: إبتداءا من</label>
                                        
                                        {!! Form::number('langFrom', old('langFrom'), ['class' => 'form-control', 'placeholder' => 'خط الطول: إبتداءا من']) !!}
                                        
                                      
                                        

                                        
                                    </div>
                                </div>

                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label class="control-label">خط الطول: أقل إحداثية</label>
                                        
                                        {!! Form::number('langTo', old('langTo'), ['class' => 'form-control', 'placeholder' => 'خط الطول: أقل إحداثية']) !!}
                                      
                                        

                                        
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button class="btn btn-primary orange-circle-button nextBtn" type="button">تعمق<br />في البحث<br /><span class="orange-circle-greater-than">></span></button> 

                                </div>
                            </div>

                        </div>
                    </div>
                    

                    
                                    
                    
                    <div class="row setup-content" id="step-9">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> إبدأ البحث</h3>
                                {!! Form::submit('بحث' , ['class' => 'btn btn-primary orange-circle-button', 'name' => 'ok']) !!}

                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}


           </div>
      </div>

      أو <br/>
      <a href="{{ route('buildings.add') }}" class="btn btn-primary btn-lg">إضافة عقار</a>
  </div>
</div>

<div class="col-xs-12">

@if( count($b4) > 0 )

    <ul class="cd-items cd-container">

    @foreach($b4 as $builItem)



   <!-- from the originale template -->

    
        <li class="cd-item nonDeco">
            <img src="{{ ifImg( $builItem->img ) }}" class="effectS" alt="Item Preview">
            <a href="#0" class="cd-trigger" data-id="{{ $builItem->id }}">نظرة سريعة</a>
        </li> <!-- cd-item -->

    


    @endforeach

    </ul> <!-- cd-items -->

@endif






    <div class="cd-quick-view">
        <div class="cd-slider-wrapper">
            <ul class="cd-slider">
                <li class="selected nonDeco"><img src="" class="imgBOX" alt="Product 1"></li>
                
            </ul> <!-- cd-slider -->

            <ul class="cd-slider-navigation">
                <li><a class="cd-next" href="#0">السابق</a></li>
                <li><a class="cd-prev" href="#0">التالي</a></li>
            </ul> <!-- cd-slider-navigation -->
        </div> <!-- cd-slider-wrapper -->

        <div class="cd-item-info overflow-yScroll">
            <h2 class="nameBOX"></h2>
            <h3 class="price priceBOX"></h3>
            <p class="largeDiscBOX"></p>
            <h5 class="price">مكان العقار: <span class="codePostalMarocBOX"></span></h5>
            <h5 class="price">نوع العقار: <span class="rentBOX"></span></h5>
            <h5 class="price">مساحة العقار: <span class="squareBOX"></span></h5>
            <h5 class="price">عدد الغرف: <span class="roomNumberBOX"></span></h5>
            <h5 class="price">انوع الخدمة: <span class="typeBOX"></span></h5>
            <h5 class="price">تاريخ النشر: <span class="created_atBOX"></span></h5>
            <h5 class="price">إسم الناشر: <span class="user_idBOX"></span></h5>


            <ul class="cd-item-action">
                <li><a href="" class="idBOX"><button class="add-to-cart">نظرة شاملة</button></a></li>

            </ul> <!-- cd-item-action -->
        </div> <!-- cd-item-info -->
        <a href="#0" class="cd-close">إغلاق</a>
    </div> <!-- cd-quick-view -->




</div>


@stop



@section('scripting')

<script>
    $(".banner").css("background-image", "url( {{ ifImg( getSetting('slider-img') ) }} )");
</script>





@stop
