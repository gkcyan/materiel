@extends('welcome')
@section('content')
    
        <p class="login-box-msg"><h1>@lang('auth.registration.title')</h1></p>

        <form method="post" action="{{ url('/register') }}">
            @csrf

            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('auth.full_name')" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')" register>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="@lang('auth.password')" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <b class="text-danger">{{ $errors->first('password') }}</b>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('auth.confirm_password')" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <b class="text-danger">{{ $errors->first('password_confirmation') }}</b>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> @lang('auth.registration.i_agree') <a href="#">@lang('auth.registration.terms')</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('auth.register')</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <br><a href="{{ url('/login') }}" class="text-center badge badge-warning">@lang('auth.registration.have_membership')</a>
    
<!-- /.register-box -->
@endsection