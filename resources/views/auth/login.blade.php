@extends('layouts.app')
@push('styles')
    <style>
        #externa{
            position: relative;
            width:100%;
            height:100vh;
            background:#55b9f3;
        }
        #interna {
            left:37%;
            top:30%;
            margin-left:-100px; /* Metade do valor da Largura */
            margin-top:-50px; /* Metade da valor da Altura */
            position:absolute;
            width:500px; /* Valor da Largura */
            height:auto; /* Valor da Altura */
            background:#252525;
            color:#fff;
        }
    </style>
@endpush
@section('content')
<div id="externa">
    <div class="ui container fluid" id="interna">
        <div class="ui card" style="width: 500px !important;">
            <div style="text-align:center !important;">
                <img class="image" src="https://pbs.twimg.com/profile_images/1248592527705305088/R-_o1_GO.jpg" style="width: 30%;">
            </div>
           
               
           
            <div class="content">
                <div class="ui form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <div class="ui checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                               
        
                              
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <button type="submit" class="ui button green mini">
                                    {{ __('Login') }}
                                </button>
            
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none !important;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                               
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
