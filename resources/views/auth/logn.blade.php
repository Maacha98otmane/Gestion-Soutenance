<div class="container">
    <div class="login-box">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <span class="logo-font">Go</span>Snippets
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <br>
                <h3 class="header-title">LOGIN</h3>
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email or UserName">
                    </div>
                    <div class="form-group">
                        <input type="Password" class="form-control" placeholder="Password">
                        <a href="#!" class="forgot-password">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6 hide-on-mobile">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                    </ul>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
