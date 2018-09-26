@extends('template')

@section('content')


<!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url("{{ asset('images/waffle-heart.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center; 
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

           /* .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }*/

            .m-b-md {
                margin-bottom: 30px;
            }

            .cover {
            background-color: #31c695b3;

            }

            #landfont {
                font-family: 'Homemade Apple', cursive;
            }

            .quote {
                font-family: 'Give You Glory', cursive;
                color: #52260b;
                padding: 20px;
                font-size: 20px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 20px;    
            }

            .sub{
                font-family: 'Give You Glory', cursive;
                color: #52260b;
                padding: 20px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .fas {
                color: #fff;
                font-size: 50px;
                padding: 10px;
            }

            .btn {
                margin-bottom: 20px;
            }

            .panel-heading{
                padding: 20px;
            }
         </style>

<div class="container">

 <div class="flex-center position-ref full-height">
    {{-- <div class="row"> --}}
        <div class="col-md-8 col-md-offset-2 cover">
            <div class="panel panel-default">
                <div class="panel-heading ">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
