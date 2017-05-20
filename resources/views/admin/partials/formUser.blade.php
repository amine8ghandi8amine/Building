

                {{ csrf_field() }}

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

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'العنوان الإلكتروني', ['class' => 'col-md-4 control-label']) !!}

                    <div class="col-md-6">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => true]) !!}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>




                <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                    {!! Form::label('admin', 'الإدارة', ['class' => 'col-md-4 control-label']) !!}

                    <div class="col-md-6">



                        {!! Form::select('admin', ['0' => 'مستعمل', '1' => 'أدمين'],  old('admin')  , ['class' => 'form-control select2R', 'min' => 0, 'max' => 1, 'required' => true ]) !!}
                        @if ($errors->has('admin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('admin') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                @unless( isset($user) )
                
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', 'كلمة المرور', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    



                    <div class="form-group">
                        {!! Form::label('password', 'تأكيد كلمة المرور', ['class' => 'col-md-4 control-label']) !!}

                        <div class="col-md-6">
                            {!! Form::password('password_confirmation', ['id' => 'password_confirm', 'class' => 'form-control', 'required' => true]) !!}

                        </div>
                    </div>

                @endunless

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit( $button , ['class' => 'btn btn-primary btn-block']) !!}

                    </div>
                </div>


