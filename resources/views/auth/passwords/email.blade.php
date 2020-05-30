@extends('welcome')
@section('content')
        <p class="login-box-msg"><h6>@lang('auth.forgot_password.title')</h6></p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ url('/password/email') }}">
            @csrf

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-btn fa-envelope"></i> @lang('auth.forgot_password.send_pwd_reset')
                    </button>
                </div>
            </div>

        </form>
        <br><a href="{{ url('/login') }}" class="text-center badge badge-warning">@lang('auth.registration.have_membership')</a>

    
@endsection
