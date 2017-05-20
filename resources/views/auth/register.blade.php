@extends('layouts.app')
@section('title')
تسجيل عضوية جديدة
@stop
@section('content')
<div class="about">
  <div class="container">
    <section class="title-section">
      <h1 class="title-header text-center">تسجيل العضوية</h1>
    </section>
  </div>
</div>
<div class="contact">
  <div class="container">
    <div class="row contact_top">
    <!--
      <div class="col-md-4 contact_details">
        <h5>Mailing address:</h5>
        <div class="contact_address">321 Awesome Street, New York, NY 17022</div>
      </div>
      <div class="col-md-4 contact_details">
        <h5>Call us:</h5>
        <div class="contact_address"> +1 800 123 1234<br>
        </div>
      </div>
      <div class="col-md-4 contact_details">
        <h5>Email us:</h5>
        <div class="contact_mail"> info@companyname.com</div>
      </div>
    </div>
    -->
    <div class="contact_bottom">
      <h3>مميزات تسجيلك معا</h3>
      <p>بلا بلا بلا</p>

          <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">الإسم</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">العوا الإلكتروني</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{--
            @if( Auth::user()->admin == 1)
            <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                <label for="admin" class="col-md-4 control-label">الإدارة</label>

                <div class="col-md-6">
                    <input id="admin" type="number" class="form-control" name="admin" min="0" max="1" required>

                    @if ($errors->has('admin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('admin') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @endif
            --}}


            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">تأكيد كلمة المرور</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        التسجيل
                    </button>
                </div>
            </div>
        </form>

    </div>
  </div>
</div>

@endsection
