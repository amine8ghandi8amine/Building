

{{ csrf_field() }}


{!! Form::hidden('from', $from) !!}


@if( isset( $b ) )

    <div class="text-center">

            <img src="{{ ifImg( $b->img ) }}" class="img-responsive heightXL imgCenter" />


    </div>

@endif



<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
    

    
    {!! Form::label('img', 'صورة العقار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('img', null, ['class' => 'form-control']) !!}

        @if ($errors->has('img'))
            <span class="help-block">
                <strong>{{ $errors->first('img') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    

    
    {!! Form::label('name', 'الإسم', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true, 'autofocus' => true ]) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    

    
    {!! Form::label('price', 'ثمن العقار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('price', old('price'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
    

    
    {!! Form::label('rent', 'طريقة بيع العقار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">


        {!! Form::select('rent', buildingRent( -1 ) , old('rent') , ['class' => 'form-control select2R', 'required' => true] ) !!}

        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>









<div class="form-group{{ $errors->has('square') ? ' has-error' : '' }}">
    

    
    {!! Form::label('square', 'مساحة العقار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('square', old('square'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('square'))
            <span class="help-block">
                <strong>{{ $errors->first('square') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    

    
    {!! Form::label('type', 'نوع العقار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">


        {!! Form::select('type', buildingType( -1 ) , old('type') , ['class' => 'form-control select2R', 'required' => true] ) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>
    
</div>

<div class="form-group{{ $errors->has('roomNumber') ? ' has-error' : '' }}">
    

    
    {!! Form::label('roomNumber', 'رقم الغرق', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('roomNumber', old('roomNumber'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('roomNumber'))
            <span class="help-block">
                <strong>{{ $errors->first('roomNumber') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('smallDisc') ? ' has-error' : '' }}">
    

    
    {!! Form::label('smallDisc', 'عن العقار بإختصار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('smallDisc', old('smallDisc'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('smallDisc'))
            <span class="help-block">
                <strong>{{ $errors->first('smallDisc') }}</strong>
            </span>
        @endif
    </div>
    <div class="alert alert-warning col-md-2">
        <p>
            لا يمكن إدخال أكثرمن 160 حرف
        </p>
        
    </div>
</div>



<div class="form-group{{ $errors->has('largDisc') ? ' has-error' : '' }}">
    

    
    {!! Form::label('largDisc', 'عن العقار', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('largDisc', old('largDisc'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('largDisc'))
            <span class="help-block">
                <strong>{{ $errors->first('largDisc') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
    

    
    {!! Form::label('tags', 'كلمات دلالية', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('tags', old('tags'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('tags'))
            <span class="help-block">
                <strong>{{ $errors->first('tags') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
    

    
    {!! Form::label('lang', 'خط الطول', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('lang', old('lang'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('lang'))
            <span class="help-block">
                <strong>{{ $errors->first('lang') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
    

    
    {!! Form::label('lat', 'خط العرض', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('lat', old('lat'), ['class' => 'form-control', 'required' => true]) !!}

        @if ($errors->has('lat'))
            <span class="help-block">
                <strong>{{ $errors->first('lat') }}</strong>
            </span>
        @endif
    </div>
</div>
@unless( $from == 'website' )
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    

    
    {!! Form::label('status', 'تفعيل', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::select('status', buildingStatu( -1 ) , old('status') , ['class' => 'form-control select2R', 'required' => true] ) !!}

        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>

@endunless

<div class="form-group{{ $errors->has('codePostalMaroc') ? ' has-error' : '' }}">
    

    
    {!! Form::label('codePostalMaroc', 'منطقة', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::select('codePostalMaroc', buildingPlace( -1 ) , old('codePostalMaroc') , ['class' => 'form-control select2R', 'required' => true] ) !!}

        @if ($errors->has('codePostalMaroc'))
            <span class="help-block">
                <strong>{{ $errors->first('codePostalMaroc') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit( $button , ['class' => 'btn btn-primary btn-block']) !!}

    </div>
</div>