@extends('layouts.app')

@section('content')
<style type="text/css">
   
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
</style>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <img src="assets/images/logo.png" class="image">
            <div class="content">Login Form</div>
        </h2>

        @if ( $errors->has('email') || $errors->has('password') )
            <div class="ui error message">
                <div class="header">Form Error!</div>
                    <ul class="list">
                    @if ( $errors->has('email') )
                        <li>{{ $errors->first('email') }}</li>
                    @endif
                    @if ( $errors->has('password') )
                        <li>{{ $errors->first('password') }}</li>
                    @endif
                    </ul>
            </div>
        @endif
        <form class="ui form" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="ui segment">
            @if ($errors->has('email'))
                <div class="field error">
                    <div class="ui left icon input">
                    <i class="user icon"></i>
                        <input type="text" name="email" placeholder="E-mail address" value="{{ old('email') }}">
                    </div>
                </div>
            @else
                <div class="field">
                    <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" placeholder="E-mail address" value="{{ old('email') }}">
                    </div>
                </div>
            @endif

            @if ($errors->has('password'))
                <div class="field error">
                    <div class="ui left icon input">
                    <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
            @else
                <div class="field">
                    <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
            @endif

            <div class="field">
                <div class="ui left checkbox">
                    <input type="checkbox" name="remember">
                    <label>Remember me</label>&nbsp;
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </div>
            </div>
            <button class="ui button" type="submit">Submit</button>
        </div>
        </form>

        <div class="ui message">
            New employee? <a href=" {{ url('/register') }} ">Register</a>
        </div>
    </div>
</div>
@endsection