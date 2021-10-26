@extends('layouts.app')
<style>
.panel-heading {
    text-align: center;
    margin-bottom: 10px
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 25px
}

.panel {
    min-height: 380px;
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
    border-radius: 12px
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    color: #4343ff
}


img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative
}


.bordert {
    border-top: 1px solid #aaa;
    position: relative
}

.bordert:after {
    content: "or connect with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px
}

@media(max-width: 360px) {

    body {
        height: 100%
    }

    .container {
        margin: 30px 0
    }

    .bordert:after {
        left: 25%
    }
}
</style>
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">{{ __('Login') }}</h3>
                </div>
                @error('email')
                <div class="alert alert-danger m-2 text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <div class="panel-body p-3">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group py-2">
                            <div class="input-field"> 
                                <span class="far fa-user p-2"></span> 
                                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                                
                            </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> 
                                <span class="fas fa-lock px-2"></span> 
                                <input id="password" type="password" placeholder="Enter your Password" class="form-control" name="password" required autocomplete="current-password"> 
                            </div>
                        </div>
                        <div class="form-inline"> 
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                            <label for="remember" class="text-muted">{{ __('Remember Me') }}</label> 
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">{{ __('Login') }}</button>
                    </form>
                </div>
                <div class="mx-3 my-2 py-2 bordert">
                    <div class="text-center py-3"> 
                        <a href="https://wwww.facebook.com" target="_blank" class="px-2"> 
                            <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt=""> 
                        </a> 
                        <a href="https://www.google.com" target="_blank" class="px-2"> 
                            <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt=""> 
                        </a> 
                        <a href="https://www.github.com" target="_blank" class="px-2"> 
                            <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt=""> 
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection