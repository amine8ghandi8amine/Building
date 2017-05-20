            {{ csrf_field() }}

<?php $count = 0  ?>

            @foreach($siteSettings as $siteSetting)



                <div class="form-group{{ $errors->has('$siteSetting->slug') ? ' has-error' : '' }}">
                    

                    
                    {!! Form::label($siteSetting->slug, $siteSetting->nameSetting, ['class' => 'col-md-3 control-label']) !!}

                    <div class="col-md-9">

                    @if( $siteSetting->type == 'number' )


                        {!! Form::number($siteSetting->slug, $siteSetting->value, ['class' => 'form-control', 'placeholder' => $siteSetting->nameSetting ]) !!}

                    @elseif( $siteSetting->type == 'text' )


                        {!! Form::text($siteSetting->slug, $siteSetting->value, ['class' => 'form-control', 'placeholder' => $siteSetting->nameSetting ]) !!}

                    @elseif( $siteSetting->type == 'tel' )

                        {!! Form::tel($siteSetting->slug, $siteSetting->value, ['class' => 'form-control', 'placeholder' => $siteSetting->nameSetting ]) !!}


                    @elseif( $siteSetting->type == 'email' )

                        {!! Form::email($siteSetting->slug, $siteSetting->value, ['class' => 'form-control', 'placeholder' => $siteSetting->nameSetting ]) !!}

                    @elseif( $siteSetting->type == 'textarea' )

                        {!! Form::textarea($siteSetting->slug, $siteSetting->value, ['class' => 'form-control', 'placeholder' => $siteSetting->nameSetting ]) !!}

                    @elseif( $siteSetting->type == 'file' )

                        <div class="text-center">

                                <img src="{{ ifImg( $siteSetting->value ) }}" class="img-responsive heightXL imgCenter" />


                        </div>

                        {!! Form::file($siteSetting->slug, null , ['class' => 'form-control']) !!}

                    @endif

                        

                        @if ($errors->has($siteSetting->slug))
                            <span class="help-block">
                                <strong>{{ $errors->first( $siteSetting->slug ) }}</strong>
                            </span>
                        @endif
                    </div>

             </div>


                        <?php $count++  ?>

            @endforeach

<?php $count = 0  ?>


                <div class="form-group">
                        <div class="col-md-10">
                            {!! Form::submit( $button , ['class' => 'btn btn-primary btn-block']) !!}

                        </div>
                        <div class="col-md-2">
                            {!! Form::reset( 'مسح الكل' , ['class' => 'btn btn-danger btn-block']) !!}

                        </div>
                </div>



