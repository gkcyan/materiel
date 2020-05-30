@extends('welcome')
@section('content')
    

               
                 <p class="login-box-msg"><h1>@lang('auth.login.title')</h1></p>
         
                 <form method="post" action="{{ url('/login') }}" class="form-signin">
                     @csrf
         
                     <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                         <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')" required>
                         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                         @if ($errors->has('email'))
                             <span class="help-block"><div class="alert alert-danger" role="alert">
                             <strong><b>{{ $errors->first('email') }}</strong></b></div>
                         </span>
                         @endif
                     </div>
         
                     <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                         <input type="password" class="form-control" placeholder="@lang('auth.password')" name="password" required>
                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                         @if ($errors->has('password'))
                             <span class="help-block"><div class="alert alert-danger" role="alert">
                             <strong><b>{{ $errors->first('password') }}</b></strong></div>
                         </span>
                         @endif
         
                     </div>
                     <div class="row">
                         <div class="col-md-8">
                             <div class="checkbox icheck">
                                 <label>
                                     <input type="checkbox" name="remember"> @lang('auth.remember_me')
                                 </label>
                             </div>
                         </div>
                         <!-- /.col -->
                         <div class="col-md-4">
                             <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('auth.sign_in')</button>
                         </div>
                         <!-- /.col -->
                     </div>
                 </form>
                 <br><a href="{{ url('/password/reset') }}" class="badge badge-warning">@lang('auth.login.forgot_password')</a>
                 <br><br><a href="{{ url('/register') }}" class="btn btn-success btn-lg btn-block active" role="button" aria-pressed="true">@lang('auth.login.register_membership')</a>
                 
                 </div>
    @endsection