@extends('layouts.app')
<style>

</style>
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">login &amp; register</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->



    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <div id="loginerror"></div>
                                        <form action="{{ route('login') }}" id="login" method="post">
                                            {{ csrf_field() }}
                                            <div class="login-input-box">
                                                <span class="help-block" id="error_user_email"></span>
                                                <input id="user-email" type="email" name="email"
                                                       value="{{ old('email') }}" placeholder="Email">
                                                <span class="help-block" id="error_user_password"></span>
                                                <input type="password" id="user-password" name="password"
                                                       placeholder="Password">

                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                </div>
                                                <div class="button-box">
                                                    <button id="login_btn" class="login-btn btn" type="submit"><span>

                                                            Login</span>
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <div id="results"></div>
                                        <form action="{{ route('register') }}" id="register" method="post">
                                            {{ csrf_field() }}

                                            <div class="login-input-box">
                                                <span class="help-block" id="error_name"></span>
                                                <input type="text" name="name" id="name" placeholder="Full Name"
                                                       value="{{ old('name') }}">
                                                <span class="help-block" id="error_email"></span>
                                                <input name="email" id="email" placeholder="Email" type="email">
                                                <span class="help-block" id="error_password"></span>
                                                <input type="password" id="password" name="password"
                                                       placeholder="Password">
                                                <span class="help-block" id="error_confirm_password"></span>
                                                <input type="password" name="password_confirmation"
                                                       id="password_confirmation"
                                                       placeholder="Confirm Password">

                                            </div>
                                            <div class="button-box">
                                                <button  id="register_btn" class="register-btn btn" type="submit"><span>Register</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
    @push('scripts')
        <script>
            $("#register").on("submit", function (e) {
                e.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var password_confirmation = $("#password_confirmation").val();

                $("#error_name").html("");
                $("#error_email").html("");
                $("#error_password").html("");
                $("#error_confirm_password").html("");
                if(name == "" || email == "" || password == "" || password_confirmation ==""){
                    if(name=="") $("#error_name").html("<i class=\"fas fa-exclamation-circle\"></i> Name is required<br/>");
                    if(email=="") $("#error_email").html("<i class=\"fas fa-exclamation-circle\"></i> Email is required<br/>");
                    if(password=="") $("#error_password").html("<i class=\"fas fa-exclamation-circle\"></i> Password is required<br/>");
                    if(password_confirmation=="") $("#error_confirm_password").html("<i class=\"fas fa-exclamation-circle\"></i> Confirm Password is required<br/>");
                    return false;

                }else{
                    var results = '';
                    var _token = $("input[name='_token']").val();
                    var data = {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    };
                    $.ajax({
                        type: "POST",
                        url: "register",
                        data: data,
                        beforeSend: function(){
                            $("#register_btn").html("<span class=\"spinner-grow spinner-grow-sm\" role=\"status\" aria-hidden=\"true\"></span>Wait ...").prop('disabled', true);
                        },
                        success: function (data) {
                            $.each(data, function () {
                                results += "<i class=\"fas fa-exclamation-circle\"></i> " + this + '<br>';
                                if (data.response == '') {
                                    window.location = '/';
                                }
                            });
                            $("#results").html(results);
                        },
                        complete: function () {
                            $("#register_btn").html("Register").prop("disabled",false);
                        }

                    });

                    $.post('register', data, function (data) {
                        $.each(data, function () {
                            results += "<i class=\"fas fa-exclamation-circle\"></i> " + this + '<br>';
                            if (data.response == '') {
                                window.location = '/';
                            }
                        });
                        $("#results").html(results);
                    });
                }

            });

            $("#login").on("submit", function (e) {
                e.preventDefault();
                var email = $("#user-email").val();
                var password = $("#user-password").val();
                $("#error_user_email").html("");
                $("#error_user_password").html("");
                if (email == "" || password == "") {
                    if (email == "") $("#error_user_email").html("<i class=\"fas fa-exclamation-circle\"></i> Email is required<br/>");
                    if (password == "") $("#error_user_password").html("<i class=\"fas fa-exclamation-circle\"></i> Password is required<br/>");
                    return false;
                } else {
                    var results = '';
                    var _token = $("input[name='_token']").val();
                    var data = {
                        _token: _token,
                        email: $("#user-email").val(),
                        password: $("#user-password").val(),
                    };
                    $.ajax({
                        type: "POST",
                        url: "login",
                        data: data,
                        beforeSend: function(){

                            $("#login_btn").html("<span class=\"spinner-grow spinner-grow-sm\" role=\"status\" aria-hidden=\"true\"></span>Wait ...").prop('disabled', true);
                        },
                        success: function (data) {
                            if (data.auth) {
                                window.location = '/';
                            }
                        },
                        error: function (response) {
                            var error = response.responseJSON.errors;
                            var results = "";
                            $.each(error, function () {
                                results += "<i class=\"fas fa-exclamation-circle\"></i> " + this + '<br>';
                            });
                            $("#loginerror").html(results);
                        },
                        complete: function () {
                            $("#login_btn").html("Login").prop("disabled",false);
                        }

                    });

                }

            });
        </script>


    @endpush
@endsection
